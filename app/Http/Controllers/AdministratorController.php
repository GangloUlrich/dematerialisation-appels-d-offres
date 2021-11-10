<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdministratorController extends Controller
{
    public function comptes()
    {
        $comptes = User::all();

        return view('admin.users', ['comptes' => $comptes]);
    }
}
