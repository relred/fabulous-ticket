<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Configuration;
use App\Models\Withdraw;
use App\Models\Ticket;


class CashiersController extends Controller
{
    public function birthdayView()
    {
        return view('birthday');
    }

    public function birthdayStore(Request $request)
    {
        $cluster_id = uniqid();

        Sale::create([
            'description' => 'Boleto Cumpleañero',
            'user_id' => auth()->user()->id,
            'cluster_id' => $cluster_id,
            'amount' => 0,
            'amount_cash' => 0,
            'birthday' => 1,
            'session' => auth()->user()->session,
            'user_fullname' => auth()->user()->name,
            'stall' => auth()->user()->stall,
            'card_voucher' => $request->curp,
        ]);

        Ticket::create([
            'type' => 'adult',
            'cluster_id' => $cluster_id,
            'user_id' => auth()->user()->id,
            'state' => 'none',
        ]);

        return redirect()->route('print', $cluster_id);
    }

    public function history()
    {
        $salesraw = Sale::where('user_id', auth()->user()->id)->where('session', auth()->user()->session);

        $withdrawHistory = Withdraw::where('user_id', auth()->user()->username)->where('session', auth()->user()->session)->orderByDesc('id')->get();

        $sales = $salesraw->take(100)->orderByDesc('id')->get();

        return view('history', ['sales' => $sales, 'withdrawHistory' => $withdrawHistory]);
    }

    public function validateCashier()
    {
        if (auth()->user()->session != Configuration::first()->current_session) {
            return view('validate');
        }
        return redirect()->route('dashboard');
    }

    public function generateSession(Request $request)
    {
        $request->validate([
            'cash' => 'required|numeric',
        ]);

        if ($userInStall = User::where('stall', $request->stall)->first()){
            return back()->with('stallError', 'Esta caja ya está en uso por '. $userInStall->name)->withInput();
        }

        if (!$supervisor = User::where('username', strtolower($request->username))->first()){
            return back()->with('usernameError', 'Nombre de usuario no encontrado')->withInput();
        }

        if ($supervisor->role != 'supervisor'){
            return back()->with('roleError', 'Este usuario no es supervisor')->withInput();
        }

        if (!Hash::check($request->password, $supervisor->password)) {
            return back()->with('passwordError', 'Contraseña incorrecta')->withInput();
        }

        $user = User::where('username', auth()->user()->username)->first();
        $configuration = Configuration::first();
        $user->stall = $request->stall;
        $user->session = $configuration->current_session;
        $user->save();

        Sale::create([
            'description' => 'Ingreso de fondo de caja',
            'user_id' => auth()->user()->id,
            'cluster_id' => uniqid(),
            'amount' => $request->cash,
            'amount_cash' => $request->cash,
            'session' => $configuration->current_session,
        ]);

        return redirect()->route('dashboard');
    }

    public function supervisorValidateView()
    {
        return view('supervisor.cashier.validate');
    }

    public function supervisorValidate(Request $request)
    {
        if (!$supervisor = User::where('username', strtolower($request->username))->first()){
            return back()->with('usernameError', 'Nombre de usuario no encontrado')->withInput();
        }

        if ($supervisor->role != 'supervisor'){
            return back()->with('roleError', 'Este usuario no es supervisor')->withInput();
        }

        if (!Hash::check($request->password, $supervisor->password)) {
            return back()->with('passwordError', 'Contraseña incorrecta')->withInput();
        }

        return redirect()->route('supervisor.cashier');
    }

    public function supervisorView()
    {
        $salesraw = Sale::where('user_id', auth()->user()->id)->where('session', auth()->user()->session);
        $withdrawHistory = Withdraw::where('user_id', auth()->user()->username)->where('session', auth()->user()->session)->orderByDesc('id')->get();

        $withdrawnDollars = Withdraw::where('user_id', auth()->user()->username)->where('session', auth()->user()->session)->where('type', 'dollar')->get()->pluck('amount')->sum();
        $withdrawnCash = Withdraw::where('user_id', auth()->user()->username)->where('session', auth()->user()->session)->where('type', 'cash')->get()->pluck('amount')->sum();

        $salesTotal = $salesraw->pluck('amount')->sum();

        $cardTotal = $salesraw->pluck('amount_card')->sum();
        $dollarTotal = $salesraw->pluck('amount_dollar')->sum();
        $dollarConvertedTotal = $dollarTotal * 16;
        
        $cashInRegister = $salesTotal - $cardTotal - $dollarConvertedTotal - $withdrawnCash;
        $dollarTotal = $salesraw->pluck('amount_dollar')->sum();
        $dollarInRegister = $dollarTotal - $withdrawnDollars;

        return view('supervisor.cashier.index', ['withdrawHistory'=> $withdrawHistory, 'cashInRegister' => $cashInRegister, 'salesTotal' => $salesTotal, 'dollarTotal' => $dollarInRegister]);
    }

    public function withdrawCashView()
    {
        return view('supervisor.cashier.cash-withdraw');
    }

    public function withdrawDollarView()
    {
        return view('supervisor.cashier.dollar-withdraw');
    }

    public function auditView()
    {
        return view('supervisor.cashier.audit');
    }

    public function finalView()
    {
        return view('supervisor.cashier.final-cut');
    }

    public static function getCashInRegister() {
        $salesraw = Sale::where('user_id', auth()->user()->id)->where('session', auth()->user()->session);
        $salesTotal = $salesraw->pluck('amount')->sum();

        $cardTotal = $salesraw->pluck('amount_card')->sum();
        $dollarTotal = $salesraw->pluck('amount_dollar')->sum();
        $dollarConvertedTotal = $dollarTotal * 16;
        $withdrawnCash = Withdraw::where('user_id', auth()->user()->username)->where('session', auth()->user()->session)->where('type', 'cash')->get()->pluck('amount')->sum();



        $cashInRegister = $salesTotal - $cardTotal - $dollarConvertedTotal - $withdrawnCash;
    }

}
