<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string'
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Check if role is 'user'
            if ($user->role !== 'user') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'You are not authorized to login here.'
                ])->withInput();
            }

            $request->session()->regenerate();

            // Log activity
            $lat = $request->lat;
            $lon = $request->lon;

            Activity::create([
                'user_id' => $user->id,
                'type'    => 'login',
                'meta'    => [
                    'ip'  => $request->ip(),
                    'lat' => $lat,
                    'lon' => $lon,
                ]
            ]);


            return redirect()->intended(route('user.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.'
        ])->withInput();
    }


    public function showRegisterForm()
    {
        return view('frontend.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'user'
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        Activity::create([
            'user_id'=>Auth::id(),
            'type'=>'register',
            'meta'=>['ip'=>$request->ip()]
        ]);

        return redirect()->route('user.dashboard')->with('success','Welcome!');
    }

    public function logout(Request $request)
    {
        Activity::create([
            'user_id'=>Auth::id(),
            'type'=>'logout',
            'meta'=>['ip'=>$request->ip()]
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index')->with('success','Logged out.');
    }

    public function dashboard()
    {
        $user = Auth::user();
        // load relevant counts
        $savedCount = $user->savedSpots()->count();
        $recentActivities = $user->activities()->latest()->limit(10)->get();

        return view('frontend.user.dashboard', compact('savedCount','recentActivities'));
    }

    public function profile()
    {$user = auth()->user(); // Get the currently logged-in admin

        return view('frontend.user.profile', compact('user'));
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

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
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

        return redirect()->route('user.profile')->with('success', 'Password updated successfully.');
    }

    public function updateAvatar(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('avatar');
        $filename = 'avatar_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('frontend/img/avatars');

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
        $user->update(['avatar' => 'frontend/img/avatars/' . $filename]);

        return redirect()->route('user.profile')->with('success', 'Profile picture updated successfully.');
    }


    public function activities()
    {
        $activities = Auth::user()->activities()->latest()->paginate(20);
        return view('frontend.user.activities', compact('activities'));
    }

    public function saved()
    {
        $spots = Auth::user()->savedSpots()->paginate(12);
        return view('frontend.user.saved', compact('spots'));
    }
}
