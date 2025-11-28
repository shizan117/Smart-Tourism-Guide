<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Auth::user()->activities()->latest()->paginate(25);
        return view('frontend.user.activities', compact('activities'));
    }
}
