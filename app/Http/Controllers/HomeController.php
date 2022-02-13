<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;
use App\Time;
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
        $routes=Route::all();
        foreach($routes as $route)
        {
            $route['times']=Time::where('route_id','=',$route->id)->get();
        }
        return view('home',compact('routes'));
    }
     public function Route(Request $req)
    {
        return($req);
    }
}
