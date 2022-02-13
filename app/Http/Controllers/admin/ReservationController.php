<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Reservation;
use App\Time;
use App\Route;
use DB;


class ReservationController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth:admin');

    }
    public function ignore(Request $request)
    {
        $uri = \Request::getRequestUri();
        $id = parse_url($uri)['query'];
        Reservation::where('id','=',$id)->delete();
         $adminController = new AdminController();
      return  $adminController->index();
    }

    public function active(Request $request)
    {
        $uri = \Request::getRequestUri();
        $id = parse_url($uri)['query'];
        DB::table('reservations')->where('id','=',$id)->update(['status'=>'1']);
       $adminController = new AdminController();
      return  $adminController->index();

    }
    public function SerachByCode(Request $request)
    {
        $reservations = null;
        $reservation = Reservation::
          join('users', 'users.id', '=', 'reservations.user_id')
           ->join ('times', 'times.id', '=', 'reservations.reservation_id')
        //    ->join ('routes', 'times.routes_id', '=', 'routes.id')
        ->where('receipt_number', '=', $request->search)
                       ->select('reservations.id','times.time','times.route_id','users.name','users.email','reservations.receipt_number')
            ->first();
            // return $trips;
if(!empty($reservation)){
    $reservation['route']=Route::where('id','=',$reservation->route_id)->first();
   $reservations[]=$reservation;
    // $reservations[]= (array_merge($trip->toArray(), $route->toArray()));
//  return $reservations;
}
        return view('admin.dashboard',compact('reservations'));

    }
}
