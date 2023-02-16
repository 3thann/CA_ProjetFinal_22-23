<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
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
