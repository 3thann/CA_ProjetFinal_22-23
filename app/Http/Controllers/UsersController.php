<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    public function store(Request $request)
    {
        $account = new Users();
        $account->name = $request->get('name');
        $account->password = bcrypt($request->get('password'));
        $account->email = $request->get('email');
        $account->phone_number = $request->get('name');
        $account->is_admin = false;
        $account->save();

        return redirect()->route('index');
    }
}
