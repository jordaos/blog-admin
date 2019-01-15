<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\User;
use App\Role;

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
        $roleCount = Role::count();

        return view(
            'home',
            compact('breadcrumbList', 'articleCount', 'userCount', 'roleCount')
        );
    }
}
