<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\User;

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

        $articleCount = Article::count();
        $userCount = User::count();

        return view(
            'home',
            compact('breadcrumbList', 'articleCount', 'userCount')
        );
    }
}
