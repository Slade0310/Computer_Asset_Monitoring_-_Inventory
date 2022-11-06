<?php

namespace App\Http\Controllers;

use App\Models\Admin;

class ControllerView extends Controller
{
    public function login()
    {
        return view('index');
    }

    public function index(Admin $admin)
    {
        // * CURRENTLY EMAIL SESSION BY ADMIN
        $adminEmail = ['adminEmail' => $admin->where('id', session('adminEmail'))->first()];

        return view('admin.index', $adminEmail);
    }
}
