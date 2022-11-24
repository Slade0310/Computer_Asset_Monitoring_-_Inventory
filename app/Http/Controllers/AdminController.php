<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComputerAssetsRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateComputerAssetRequest;
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

        return to_route('admin-index');
    }

    public function logout()
    {
        if (session()->has('adminEmail'))
        {
            session()->pull('adminEmail');

            return to_route('index-login');
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
    public function update(UpdateComputerAssetRequest $request, ComputerAsset $computerAsset, $id)
    {
        $requests = $request->validated();
        $computerAsset->where('id', $id)->update($requests);

        return to_route('admin-index')->with('success', 'Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy(ComputerAsset $computerAsset, $id)
    {
        $computerAssetID = $computerAsset->findOrFail($id);
        $computerAssetID->delete();

        return to_route('admin-index')->with('success', "Move to archive Successfully!");
    }

    public function restore(ComputerAsset $computerAsset, $id)
    {
        // * FIND THE ID FIRST AND THEN RESTORE SINCE IT HASN'T DELETED PERMANENTLY BY USING SOFT DELETE * //
        $computerAssetDetails = $computerAsset->onlyTrashed()->findorFail($id);
        $computerAssetDetails->restore();

        return to_route('admin-archive')->with('success', "Successfully Restored!");
    }

    public function forceDelete(ComputerAsset $computerAsset, $id)
    {
        // NOW THIS WILL DELETE PERMANENTLY BY USING FORCE DELETE
        $computerAssetDetails = $computerAsset->onlyTrashed()->findorFail($id);
        $computerAssetDetails->forceDelete();

        return to_route('admin-archive')->with('success', "Force Delete Successfully!");
    }
}
