<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SupervisorsController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'cashier')->get();

        return view('supervisor.index', ['users' => $users]);
    }

    public function addUserView()
    {
        return view('supervisor.add-user');
    }

    public function addUserStore(Request $request)
    {

        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|min:6',
        ]);

        if (User::where('username', $request->username)->first()) {
            return back()->with('usernameError', 'Nombre de usuario en uso')->withInput();
        }

        if ($request->password != $request->passwordconfirm)
        {
            return back()->with('passwordError', 'Las contraseñas no coinciden')->withInput();
            
        }else{

             User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 'cashier',
            ]);

            return redirect()->route('supervisor.users')->with('success', 'Usuario creado con éxito.');
        }
    }
    
    public function findTicket()
    {
        return view('supervisor.find-ticket');
    }

    public function findTicketPost(Request $request)
    {
        return redirect()->route('supervisor.find.view', $request->id);
    }

    public function viewTicket($id)
    {
        if($sale = Sale::find($id))
        {
            return view('supervisor.ticket-view', ['sale' => $sale]);
        }else{
            return view('supervisor.find-ticket-error');
        }
    }

    public function cancelSale($id)
    {
        $sale = Sale::find($id);
        $sale->cancelled_by = auth()->user()->username;
        $sale->save();

        return redirect()->route('supervisor.find.cancel.print', $id);
    }

    public function cancelSalePrint($id)
    {
        $sale = Sale::find($id);
        return view('supervisor.cancel-ticket-print', ['sale' =>$sale]);
    }


}
