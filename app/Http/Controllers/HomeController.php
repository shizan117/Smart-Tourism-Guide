<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public static function index()
    {
        return view('frontend.home.home');
    }

    public static function spot_details()
    {
        return view('frontend.spot_details.spot_details');
    }

    public static function spots()
    {
        return view('frontend.spots.spots');
    }

    public static function cost_calculator()
    {
        return view('frontend.cost_calculator.cost_calculator');
    }

    public static function plans()
    {
        return view('frontend.plans.plans');
    }

    public static function plan_creator()
    {
        return view('frontend.plan_creator.plan_creator');
    }

    public static function plan_details()
    {
        return view('frontend.plan_details.plan_details');
    }

    public static function faq()
    {
        return view('frontend.support.faq');
    }

    public static function contact()
    {
        return view('frontend.support.contact');
    }

    public static function privacy()
    {
        return view('frontend.support.privacy');
    }

    public static function login()
    {
        return view('frontend.auth.login');
    }

    public static function register()
    {
        return view('frontend.auth.register');
    }


}
