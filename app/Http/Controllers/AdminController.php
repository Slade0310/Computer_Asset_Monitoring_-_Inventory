<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function check(LoginRequest $request, Admin $admin)
    {
        $requests = $request->validated();

        $adminCredential = $admin->where('email', $requests['email'])->first();

        if (!$adminCredential) return back()->with('error', 'The user is not reflected to our database');

        if (!Hash::check($requests['password'], $adminCredential->password)) {
            return back()->with('error', 'The password does not match');
        }
        $request->session()->put('adminEmail', $adminCredential->id);

        return redirect()->route('admin-index');
    }

    public function logout()
    {
        if (session()->has('adminEmail'))
        {
            session()->pull('adminEmail');

            return redirect()->route('index-login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
