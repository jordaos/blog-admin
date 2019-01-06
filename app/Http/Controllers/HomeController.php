<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $breadcrumbList = json_encode([
            [
                "text" => "Home",
                "active" => true
            ]
        ]);
        return view(
            'home',
            compact('breadcrumbList')
        );
    }
}
