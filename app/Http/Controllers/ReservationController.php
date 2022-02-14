<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Reservation;
use App\Route;
class ReservationController extends Controller
{
  public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
        $id= Auth::user()->id;
       $reservations= Reservation::join ('times', 'times.id', '=', 'reservations.reservation_id')
        ->where('reservations.user_id','=',$id)->get();
        foreach ($reservations as $reservation)
        {
            $reservation['route']=Route::where('id','=',$reservation->route_id)->first();


        }

        return view('reservation',compact('reservations'));

    }

    public function create(Request $request)
    {
        // return $request->time;


       $reservation= new Reservation;
       $reservation->reservation_id=$request->time;
       $reservation->status=0;
       $reservation->user_id=Auth::user()->id;
       $reservation->receipt_number=rand(10000, 99999);
       $reservation->save();
        $message="pending";
return $this->index();

    }

}
