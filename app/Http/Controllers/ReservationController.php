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
        ->where('reservations.user_id','=',$id)
        ->orderby('reservations.created_at','DESC')->get();
        foreach ($reservations as $reservation)
        {
            $reservation['route']=Route::where('id','=',$reservation->route_id)->first();
        }

        return view('Reservation',compact('reservations'));

    }

    public function create(Request $request)
    {
        // return $request->time;

    if($request->time!="time"){
       $reservation= new Reservation;
       $reservation->reservation_id=$request->time;
       $reservation->status=0;
       $reservation->user_id=Auth::user()->id;
       $reservation->receipt_number=rand(10000, 99999);
       $reservation->save();
        $message="pending";
        return $this->index();
        }
        return redirect()->back()->with('error', 'Please Choose a Time to continue');
    }

}
