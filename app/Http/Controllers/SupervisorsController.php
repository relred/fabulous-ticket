<?php

namespace App\Http\Controllers;

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
}
