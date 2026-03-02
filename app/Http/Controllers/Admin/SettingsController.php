<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display settings page
     */
    public function index()
    {
        $settings = [
            'app_name' => config('app.name'),
            'app_url' => config('app.url'),
            'app_email' => config('mail.from.address'),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update settings
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'app_name' => 'required|string|max:255',
            'app_email' => 'required|email',
        ]);

        // Implementation for updating settings
        // This would typically write to config or database

        return redirect()
            ->back()
            ->with('success', 'Settings updated successfully!');
    }

    /**
     * Show email settings
     */
    public function email()
    {
        return view('admin.settings.email');
    }

    /**
     * Show general settings
     */
    public function general()
    {
        return view('admin.settings.general');
    }

    /**
     * Show security settings
     */
    public function security()
    {
        return view('admin.settings.security');
    }
}
