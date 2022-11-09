<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComputerAssetsRequest;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\ComputerAsset;
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
    public function store(ComputerAssetsRequest $request, ComputerAsset $computerAsset)
    {
        $requests = $request->validated();

        $save = $computerAsset->create($requests);

        if (!$save) {
            return back()->with('error', "There's something wrong...");
        }

        return back()->with('success', 'Computer Asset Saved!');
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
