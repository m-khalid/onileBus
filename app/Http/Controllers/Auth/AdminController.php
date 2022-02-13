<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Route;
use App\User;
use App\Reservation;
use App\Time;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    //   $this->middleware('guest:admin', ['except' => ['logout']]);

    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$reservations =null;
$reservations = Reservation::
          join('users', 'users.id', '=', 'reservations.user_id')
           ->join ('times', 'times.id', '=', 'reservations.reservation_id')
        //    ->join ('routes', 'times.routes_id', '=', 'routes.id')
        ->where('status', '=', '0')
            ->select('reservations.id','times.time','times.route_id','users.name','users.email','reservations.receipt_number')
            ->get();
            // return $reservations;
            // return $reservations;
            foreach ($reservations as $reservation){
    $reservation['route']=Route::where('id','=',$reservation->route_id)->select('routes.from','routes.to','routes.price')->first();
    // $reservations[] = (array_merge($trip->toArray(), $route->toArray()));
            }
            // return $reservations;
        return view('admin.dashboard',compact('reservations'));
    }

}
