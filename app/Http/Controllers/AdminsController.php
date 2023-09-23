<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\User;

use Illuminate\Support\Facades\Hash;


class AdminsController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'admin')
                    ->orWhere('role', 'supervisor')
                    ->get();

        return view('admin.index', ['users' => $users]);
    }

    public function addUserView()
    {
        return view('admin.add-user');
    }

    public function addUserStore(Request $request)
    {

        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|min:3',
        ]);

        if (User::where('username', $request->username)->first()) {
            return back()->with('usernameError', 'Nombre de usuario en uso')->withInput();
        }

         if ($request->password != $request->passwordconfirm)
        {
            return back()->with('passwordError', 'Las contraseñas no coinciden')->withInput();
            
        }else{
            $roleName = ($request->role == 1) ? 'supervisor' : 'admin';

             User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => $roleName,
            ]);

            return redirect()->route('admin.users')->with('success', 'Usuario creado con éxito.');
        }
    }



    public function monitoring()
    {
        $sales = Sale::where('session', Configuration::all()->first()->current_session)->take(100)->get();
        $salesCount = Sale::all()->count();

        $salesTotal = Sale::pluck('amount')->sum();
        $sessionSalesTotal = Sale::where('session', Configuration::all()->first()->current_session)->pluck('amount')->sum();
        $sessionSalesCount = Sale::where('session', Configuration::all()->first()->current_session)->count();


        return view('admin.monitoring', ['sales' => $sales, 'salesCount' => $salesCount, 'salesTotal' => $salesTotal, 'sessionSalesTotal' => $sessionSalesTotal, 'sessionSalesCount' => $sessionSalesCount]);
    }

    public function session()
    {
        $configuration = Configuration::all()->first();
        $configuration->current_session = uniqid();
        $configuration->save();

        return redirect()->route('admin.monitoring')->with('success', 'Sesíon creada con éxito');
    }

}
