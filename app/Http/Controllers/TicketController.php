<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\tickets_type;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    public function index($id)
    {
        $type = tickets_type::all();
        $eventId = $id;
        return view('createTickets', compact('eventId', 'type'));
    }

    public function store(Request $request)
    {
        if (session('user_id') == null) {
            return redirect()->route('login')->with('errorLogin', 'You should have account to this action');
        }

        $event = Event::find($request->event);
        if (!session('user_id') == $event->user_id) {
            return abort(404);
        }

        $request->validate([
            'quantity' => ['required', 'integer', 'gt:0'],
            'price' => ['required', 'gt:0'],
            'type' => 'required'
        ]);

        if ($request->type == 1) {
            $type = 1;
        } else {
            $type = 2;
        }
        $checkType = Ticket::where('event_id', $request->event)->where('type_id', $type)->first();
        if ($checkType !== null) {
            if ($request->next == null) {
                return redirect()->route('to.add.ticket', $request->event)->with('wrongAdd', 'a Event with this type of Tickets already stored, Please change the Tickets type!');
            }else{
                return redirect()->route('event.details', $request->event)->with('wrongAdd', 'a Event with this type of Tickets already stored, Please change the Tickets type!');
            }
        }

        Ticket::create([
            'place_nbr' => $request->input('quantity'),
            'price' => $request->input('price'),
            'type_id' => $type,
            'event_id' => $request->event
        ]);

        if ($request->next == null) {
            return redirect()->route('to.add.ticket', $request->event)->with('addSuccess', 'Your Tickets Created Successfully');
        } else {
            return redirect()->route('event.details', $request->event)->with('actionResponse', 'Your Tickets Created Successfully');
        }
    }
}
