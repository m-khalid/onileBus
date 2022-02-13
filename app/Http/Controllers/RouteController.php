<?php

namespace App\Http\Controllers;
use Auth;
//  return Auth::user();
use App\Time;
use App\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
 public function __construct()
    {
    $this->middleware('auth');
    }

    public function index(Request $request){
        $uri = \Request::getRequestUri();
        $id = parse_url($uri)['query'];
        $selected = Route::find($id); //for check choice
        $routes=Route::all();
        if($selected){
        $times=Time::where('route_id',$id)->get();
        return view('route',compact('times','routes','selected'));
    }
    else
    {
        return view('home',compact('routes'));
    }

    }

    public function SearchByName(Request $request)
    {
        $routes =Route::where('from','LIKE', "%{$request->search}%")
        ->orwhere('to','LIKE', "%{$request->search}%")->get();
         foreach($routes as $route)
        {
            $route['times']=Time::where('route_id','=',$route->id)->get();
        }
        return view('home',compact('routes'));
    }
}
