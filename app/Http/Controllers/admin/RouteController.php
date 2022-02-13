<?php

namespace App\Http\Controllers\admin;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Route;
use App\Time;
use DB;
class RouteController extends Controller
{
      public function __construct()
    {
      $this->middleware('auth:admin');
    }
    public function get()
    {
        return view('admin.add_route');
    }
    public function create(Request $request)
    {
        $data=array($request);
        Route::insert($request->all('from','to','price','description'));
        $id= DB::getPdo()->lastInsertId();
        foreach ($request->times as $time){
        Time::insert(array('route_id'=>$id,'time'=>$time));
        }

return redirect()->back()->with('alert', 'Add Successfully');

    }
}
