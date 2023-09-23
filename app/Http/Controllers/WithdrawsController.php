<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Withdraw;
use App\Models\Configuration;
use App\Models\Sale;
use Illuminate\Support\Facades\Redis;

class WithdrawsController extends Controller
{
    public function store(Request $request)
    {
        $salesraw = Sale::where('user_id', auth()->user()->id)->where('session', auth()->user()->session);
        $salesTotal = $salesraw->pluck('amount')->sum();
        

        $withdrawnCash = Withdraw::where('user_id', auth()->user()->username)->where('session', auth()->user()->session)->where('type', 'cash')->get()->pluck('amount')->sum();

        $dollarTotal = Sale::where('user_id', auth()->user()->id)->where('session', auth()->user()->session)->pluck('amount_dollar')->sum();
        $withdrawnDollar = Withdraw::where('user_id', auth()->user()->username)->where('session', auth()->user()->session)->where('type', 'dollar')->get()->pluck('amount')->sum();

        $dollarConvertedTotal = $dollarTotal * 17.5;
        $cardTotal = $salesraw->pluck('amount_card')->sum();
        $cashInRegister = $salesTotal - $cardTotal - $dollarConvertedTotal - $withdrawnCash;
        $dollarInRegister = $dollarTotal - $withdrawnDollar;

        if ($request->type == 'cash'){
            if ($cashInRegister < $request->amount) {
                return back()->with('amountError', 'El retiro no puede ser mayor a la cantidad actual en caja ($ '. $cashInRegister .')')->withInput();
            }
        }

        if ($request->type == 'dollar') {
            if ($dollarInRegister < $request->amount) {
                return back()->with('amountError', 'El retiro no puede ser mayor a la cantidad actual en caja (US$ '. $dollarInRegister .')')->withInput();
            }
        }

        if (!$supervisor = User::where('username', strtolower($request->username))->first()){
            return back()->with('usernameError', 'Nombre de usuario incorrecto')->withInput();
        }

        if ($supervisor->role != 'supervisor'){
            return back()->with('roleError', 'Este usuario no es supervisor')->withInput();
        }

        if (!Hash::check($request->password, $supervisor->password)) {
            return back()->with('passwordError', 'Contraseña incorrecta')->withInput();
        }

        if ($request->type == 'audit') {
            $amount = $request->one_thousand * 1000 + $request->five_hundred * 500 + $request->two_hundred * 200 + $request->one_hundred *100 + $request->fifty * 50 + $request->twenty * 20 + $request->ten * 10 + $request->five * 5 + $request->two * 2 + $request->one + $request->cents/2;

            $withdraw = Withdraw::create([
                'session' => Configuration::first()->current_session,
                'amount' => $amount,
                'type' => $request->type,
                'user_id' => auth()->user()->username,
                'supervisor_id' => $request->username,
                'user_fullname' => auth()->user()->name,
                'supervisor_fullname' => $supervisor->name,
                'dollars' => $request->dollar,
                'cash_in_register' => $cashInRegister,
                'dollars_in_register' => $dollarInRegister,
            ]);

        }else{
            $withdraw = Withdraw::create([
                'session' => Configuration::first()->current_session,
                'amount' => $request->amount,
                'type' => $request->type,
                'user_id' => auth()->user()->username,
                'supervisor_id' => $request->username,
                'user_fullname' => auth()->user()->name,
                'supervisor_fullname' => $supervisor->name,
            ]);
        }


        if ($request->type == 'audit') {
            return redirect()->route('print.audit', $withdraw->id);
        }

        return redirect()->route('print.withdraw', $withdraw->id);
    }

    public function final(Request $request)
    {
        
        if (!$supervisor = User::where('username', strtolower($request->username))->first()){
            return back()->with('usernameError', 'Nombre de usuario incorrecto')->withInput();
        }

        if ($supervisor->role != 'supervisor'){
            return back()->with('roleError', 'Este usuario no es supervisor')->withInput();
        }

        if (!Hash::check($request->password, $supervisor->password)) {
            return back()->with('passwordError', 'Este usuario no es supervisor')->withInput();
        }

        $salesraw = Sale::where('user_id', auth()->user()->id)->where('session', auth()->user()->session);
        $salesTotal = $salesraw->pluck('amount')->sum();
        
        $withdrawnCash = Withdraw::where('user_id', auth()->user()->username)->where('session', auth()->user()->session)->where('type', 'cash')->get()->pluck('amount')->sum();

        $dollarTotal = Sale::where('user_id', auth()->user()->id)->where('session', auth()->user()->session)->pluck('amount_dollar')->sum();
        $withdrawnDollar = Withdraw::where('user_id', auth()->user()->username)->where('session', auth()->user()->session)->where('type', 'dollar')->get()->pluck('amount')->sum();

        $dollarConvertedTotal = $dollarTotal * 17.5;
        $cardTotal = $salesraw->pluck('amount_card')->sum();
        $cashTotal = $salesTotal - $cardTotal - $dollarConvertedTotal;

        $cashInRegister = $salesTotal - $cardTotal - $dollarConvertedTotal - $withdrawnCash;
        $dollarInRegister = $dollarTotal - $withdrawnDollar;

        $cashInRegister = $salesTotal - $cardTotal - $dollarConvertedTotal - $withdrawnCash;

        $amount = $request->one_thousand * 1000 + $request->five_hundred * 500 + $request->two_hundred * 200 + $request->one_hundred *100 + $request->fifty * 50 + $request->twenty * 20 + $request->ten * 10 + $request->five * 5 + $request->two * 2 + $request->one + $request->cents/2;

        $withdraw = Withdraw::create([
            'session' => Configuration::first()->current_session,
            'amount' => $amount,
            'type' => 'final',
            'user_id' => auth()->user()->username,
            'supervisor_id' => $request->username,
            'user_fullname' => auth()->user()->name,
            'supervisor_fullname' => $supervisor->name,
            'dollars' => $request->dollar,
            'cash_in_register' => $cashInRegister,
            'dollars_in_register' => $dollarInRegister,
        ]);

        $cashier = User::where('username', auth()->user()->username)->first();
        $cashier->session = 'unset';
        $cashier->stall = 'unset';
        $cashier->save();

        return redirect()->route('print.final', $withdraw->id);
    }

    public function print($id)
    {
        $withdraw = Withdraw::find($id);
        return view('supervisor.cashier.print', ['withdraw' => $withdraw]);
    }

    public function printAudit($id)
    {
        $withdraw = Withdraw::find($id);
        return view('supervisor.cashier.print-audit', ['withdraw' => $withdraw]);
    }

    public function printFinal($id)
    {
        $withdraw = Withdraw::find($id);

        $salesraw = Sale::where('user_id', auth()->user()->id)->where('session', $withdraw->session);
        $totalSale = $salesraw->pluck('amount')->sum();
        $totalCard = $salesraw->pluck('amount_card')->sum();
        $totalDollar = Sale::where('user_id', auth()->user()->id)->where('session', $withdraw->session)->pluck('amount_dollar')->sum();

        $dollarConvertedTotal = $totalDollar * 17.5;

        $totalCash = $totalSale - $totalCard - $dollarConvertedTotal;

        return view('supervisor.cashier.print-final', ['withdraw' => $withdraw ,'totalSale' => $totalSale, 'totalCash' => $totalCash, 'totalCard' => $totalCard, 'totalDollar' => $totalDollar]);
    }

}
