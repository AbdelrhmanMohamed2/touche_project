<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSettingRequest;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::get();
        return view('Admin.pages.setting.index', compact('settings'));
    }

    public function edit(Setting $setting)
    {
        return view('Admin.pages.setting.edit', compact('setting'));
    }

    public function update(StoreSettingRequest $request, Setting $setting)
    {
        $setting->update([
            'value' => $request->value,
        ]);

        return redirect()->back()->with('success', 'Setting updated successfully');
    }
}
