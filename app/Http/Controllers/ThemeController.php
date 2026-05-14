<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function index()
    {
        return view('theme-index');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->frontend_theme = $request->frontend_theme;
        $user->save();

        return redirect()->back()->with('success', __('Theme updated successfully!'));
    }
}
