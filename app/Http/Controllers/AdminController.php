<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    // Show admin login form
    public function login()
    {
        if (auth()->check() && auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return view('backend.auth.login');
    }


    // Handle login
    public function AdminLogin(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt login with guard (default guard assumed, else use 'admin')
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->filled('remember'))) {

            // Check role
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
            }

            Auth::logout(); // logout non-admins
            return redirect()->route('admin.login')->with('error', 'Access denied. Admins only.');
        }

        // Login failed
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->withInput($request->only('email'));
    }

    // Logout admin
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }

    // Show admin dashboard
    public function index()
    {
        return view('backend.dashboard.dashboard');
    }

    // Show admin users list
    public function profileSettings()
    {
        $user = auth()->user(); // Get the currently logged-in admin

        return view('backend.settings.profile', compact('user'));
    }
    // Update profile info (name, email, bio)
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required','email','max:255', Rule::unique('users')->ignore($user->id)],
            'bio' => 'nullable|string|max:500',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio,
        ]);

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }

    // Update password

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match']);
        }

        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->route('admin.profile')->with('success', 'Password updated successfully.');
    }

    public function updateAvatar(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('avatar');
        $filename = 'avatar_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('backend/img/avatars');

        // Create folder if not exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Delete old avatar if exists
        if ($user->avatar && file_exists(public_path($user->avatar))) {
            unlink(public_path($user->avatar));
        }

        // Move new file to public folder
        $file->move($destinationPath, $filename);

        // Save relative path in DB
        $user->update(['avatar' => 'backend/img/avatars/' . $filename]);

        return redirect()->route('admin.profile')->with('success', 'Profile picture updated successfully.');
    }

    public function AdminLogout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect to admin login page
        return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');
    }


}
