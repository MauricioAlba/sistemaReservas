<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservationbyUserID($userID)
    {
        $user = User::find($userID);

        if(!$user)
        {
            return response()->json([
                'message' => 'Usuario no encontrado'
            ],404);
        }

        $reservation = $user->reservation;

        return $reservation;
    }

    public function reservationbyEnvironmentID($environmentID)
    {
        $environment = Environment::find($environmentID);

        if(!$environment)
        {
            return response()->json([
                'message' => 'Ambiente no encontrado'
            ],404);
        }

        $reservation = $environment->reservation;

        return $reservation;   
    }

    public function index(){
        return Reservation::all();
    }

    public function store(Request $request){
        $request->validated();
        $startDateTime = $request->startDateTime;
        $endDateTime = $request->endDateTime;

        $this->validate_DateTime($startDateTime, $endDateTime);
    }

    //Completar funcion
    public function validate_DateTime($startDateTime, $endDateTime)
    {
        return true;
    }
}
