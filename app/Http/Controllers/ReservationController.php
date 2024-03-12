<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //
    public function index(){

        $user_id = session('user_id');
        $eventsCount = Event::where('user_id', $user_id)->count();
        $reservationsCount = Reservation::join('tickets', 'tickets.id', '=', 'reservations.ticket_id')
            ->join('events', 'events.id', '=', 'tickets.event_id')
            ->join('users', 'users.id', '=', 'events.user_id')
            ->where('users.id', $user_id)->count();


        return view('organizerDashboard', compact('reservationsCount', 'eventsCount'));
    }
    public function store(Request $request, $id)
    {
        if (session('user_id') == null){
            return redirect()->route('login')->with('errorLogin', 'You should have account to this action');
        }
        $request->validate([
            'type' => 'required',
            'quantity' => ['integer', 'in:1']
        ]);

        $ticket = Ticket::where('type_id', $request->type)->where('event_id', $id)->first();
        $checkType = Ticket::where('event_id', $id)->count();

        if ($ticket->place_nbr == 0){
            if ($checkType > 1){
                return redirect()->route('event.details', $id)->with('wrongAdd', 'This Type of The Tickets has Expired');
            }else {
                return redirect()->route('event.details', $id)->with('wrongAdd', 'The Tickets of This Event has Expired');
            }
        }

        $place = $ticket->place_nbr - 1;
        $ticket->update([
            'place_nbr' => $place
        ]);

        $event = Event::where('id', $id)->first();

        if($event->acceptation == 1){
            $status = 0;
        }else{
            $status = 1;
        }

        Reservation::create([
            'user_id' => session('user_id'),
            'ticket_id' => $ticket->id,
            'status' => $status
        ]);

        if($status == 1){
            return redirect()->route('event.details', $id)->with('actionResponse', 'Reserve Success');
        }else {
            return redirect()->route('event.details', $id)->with('wrongAdd', 'Your reservation is in the waiting section');
        }
    }

    public function reserveRequest()
    {
        $user_id = session('user_id');
        $reservations = Reservation::join('tickets', 'tickets.id', '=', 'reservations.ticket_id')
            ->join('events', 'events.id', '=', 'tickets.event_id')
            ->join('users as event_user', 'event_user.id', '=', 'events.user_id')
            ->join('users as reservation_user', 'reservation_user.id', '=', 'reservations.user_id')
            ->where('event_user.id', $user_id)->where('reservations.status', 0)
            ->get([
                'reservation_user.name as name',
                'title',
                'reservations.created_at',
                'reservations.id'

            ]);
        return view('reserveRequest', compact('reservations'));
    }

    public function acceptReserve($id)
    {
        $reservation = Reservation::find($id);
        $reservation->update([
            'status' => 1
        ]);

        return redirect()->route('reserve.request')->with('actionSuccess', 'Accept Success');
    }

    public function refuseReserve($id)
    {
        $reservation = Reservation::find($id);
        $ticket = Ticket::find($reservation->ticket_id);
        $ticket->update([
            'place_nbr' => $ticket->place_nbr + 1
        ]);

        $reservation->delete();
        return redirect()->route('reserve.request')->with('actionSuccess', 'Refused Success');
    }

    public function userTickets()
    {
        if (session('user_id') == null){
            return redirect()->route('login')->with('errorLogin', 'You should have account to this action');
        }

        $reservations = Reservation::where('user_id', session('user_id'))->get();
        return view('reservationTicket', compact('reservations'));
    }
}
