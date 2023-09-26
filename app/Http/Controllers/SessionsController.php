<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\User;
use App\Models\Session;

class SessionsController extends Controller
{
    public function store(Request $request)
    {
        $session_id = uniqid();

        Session::create([
            'user_id' => $request->name,
            'session' => $session_id,
        ]);

        $configuration = Configuration::all()->first();
        $configuration->current_session = $session_id;
        $configuration->save();

        return redirect()->route('admin.session.controls')->with('success', 'Sesíon creada con éxito');
    }

    public function close()
    {
        $configuration = Configuration::all()->first();

        $users = User::where('session', $configuration->current_session)->get();

        if ($users->isEmpty()) {
            $configuration->current_session = 'closed';
            $configuration->save();
            return redirect()->route('admin.session.controls')->with('success', 'Sesíon cerrada con éxito');
        }

        return redirect()->route('admin.session.controls')->with('users', $users);
    }

}
