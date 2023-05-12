<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AssetCategory;
use App\Models\ComputerAsset;
use App\Models\ComputerDesignation;

class ControllerView extends Controller
{
    public function login()
    {
        return view('index');
    }

    public function index(Admin $admin, AssetCategory $assetCategory, ComputerAsset $computerAsset, ComputerDesignation $computerDesignation)
    {
        // * CURRENTLY EMAIL SESSION BY ADMIN
        $adminEmail = ['adminEmail' => $admin->where('id', session('adminEmail'))->first()];
        $assetCategories = $assetCategory::orderBy('name')->get();
        $computerAssets = $computerAsset::get();
        $computerDesignations = $computerDesignation::get();
        $computerAssetsStatusOn = $computerAsset::where('active_status', 1);
        $computerAssetsStatusOff = $computerAsset::where('active_status', 0);
        $computerAssetsOnlyTrashed = $computerAsset::onlyTrashed();

        return view('admin.index', $adminEmail, compact('assetCategories', 'computerAssets', 'computerAssetsStatusOn', 'computerAssetsStatusOff', 'computerAssetsOnlyTrashed', 'computerDesignations'));
    }

    public function archiveView(Admin $admin, AssetCategory $assetCategory, ComputerDesignation $computerDesignation)
    {
        // * CURRENTLY EMAIL SESSION BY ADMIN
        $adminEmail = ['adminEmail' => $admin->where('id', session('adminEmail'))->first()];
        $assetCategories = $assetCategory::orderBy('name')->get();
        $computerDesignations = $computerDesignation::get();

        return view('admin.archive', $adminEmail, compact('assetCategories', 'computerDesignations'));
    }

    public function activeView(Admin $admin, AssetCategory $assetCategory, ComputerDesignation $computerDesignation)
    {
        // * CURRENTLY EMAIL SESSION BY ADMIN
        $adminEmail = ['adminEmail' => $admin->where('id', session('adminEmail'))->first()];
        $assetCategories = $assetCategory::orderBy('name')->get();
        $computerDesignations = $computerDesignation::get();

        return view('admin.active', $adminEmail, compact('assetCategories', 'computerDesignations'));
    }

    public function inactiveView(Admin $admin, AssetCategory $assetCategory, ComputerDesignation $computerDesignation)
    {
        // * CURRENTLY EMAIL SESSION BY ADMIN
        $adminEmail = ['adminEmail' => $admin->where('id', session('adminEmail'))->first()];
        $assetCategories = $assetCategory::orderBy('name')->get();
        $computerDesignations = $computerDesignation::get();

        return view('admin.inactive', $adminEmail, compact('assetCategories', 'computerDesignations'));
    }

    public function assetMonitoring(Admin $admin, AssetCategory $assetCategory, ComputerAsset $computerAsset, ComputerDesignation $computerDesignation)
    {
        // * CURRENTLY EMAIL SESSION BY ADMIN
        $adminEmail = ['adminEmail' => $admin->where('id', session('adminEmail'))->first()];
        $assetCategories = $assetCategory::orderBy('name')->get();
        $computerDesignationNumbers = $computerAsset::where('active_status', 1)->get();
        $computerDesignations = $computerDesignation::get();

        return view('admin.asset-monitoring', $adminEmail, compact('assetCategories', 'computerDesignations', 'computerDesignationNumbers'));
    }
}
