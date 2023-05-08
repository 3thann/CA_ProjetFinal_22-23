<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function change_role(Request $request)
    {
        $user = User::find($request->user_id);

        if ($user->role == 'member') {
            $user->role = 'admin';
        } else {
            $user->role = 'member';
        }

        $user->save();

        return redirect()->route('users.index');
    }

    public function connection()
    {
        return view('users.connection');
    }

    public function create_account()
    {
        return view('users.create_account');
    }

    public function store(Request $request)
    {
        $account = new User();
        $account->name = $request->get('name');
        $account->password = bcrypt($request->get('password'));
        $account->email = $request->get('email');
        $account->role = 'member';
        $account->save();

        return redirect()->route('generics.index');
    }

    public function forgot_password()
    {
        return view('users.forgot_password');
    }

    public function reset_password()
    {
        return view('users.reset_password');
    }
}
