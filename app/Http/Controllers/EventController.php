<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use App\Models\Tickets_type;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    {
        $categories = Categorie::all();
//        dd($categories);
        return view('createEvent', compact('categories'));
    }

    public function store(Request $request)
    {
        if (session('user_id') == null){
            return redirect()->route('login')->with('errorLogin', 'You should have account to this action');
        }
        $request->validate([
            'title' => ['required', 'unique:events'],
            'description' => 'required',
            'date' => ['required', 'date'],
            'acceptation' => 'required',
            'categorie' => 'required',
            'localisation'=> 'required'
        ]);

        if($request->date < date('Y-m-d')){
            return redirect()->route('to.add.event')->with('errorDate', 'You trying to insert a invalid date!!');
        }

        if ($request->acceptation == 1){
            $acceptation = true;

        }else {
            $acceptation = false;
        }

        $event = Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => session('user_id'),
            'acceptation' => $acceptation,
            'categorie_id' => $request->input('categorie'),
            'date' => $request->input('date'),
            'localisation' => $request->input('localisation')
        ]);

        return redirect()->route('to.add.ticket', $event->id)->with('addSuccess', 'Your Should add the Tickets');
    }

    public function getEvents()
    {
        $events = Event::where('status' , '=' , '1')->paginate(6);
        return view('home', compact('events'));
    }

    public function eventDetails($id)
    {

        $eventId = $id;
        $event = Event::find($eventId);
        $tickets = Ticket::where('event_id', $eventId)->get();
        $type = Tickets_type::all();
        $categories = Categorie::all();

        return view('eventDetails', compact('event', 'categories', 'tickets', 'type'));
    }

    public function destroy(Request $request, $id)
    {
        if (session('user_id') == null){
            return redirect()->route('login')->with('errorLogin', 'You should have account to this action');
        }

        if (!$request->user_id == session('user_id')){
            return redirect()->route('home')->with('errorResponse', 'You do not have permission to perform this action');
        }

        $event = Event::find($id);
        $event->delete();
        return redirect()->route('home')->with('successResponse', 'Your Event Deleted Successfully');
    }

    public function update(Request $request, $id)
    {
        if (session('user_id') == null){
            return redirect()->route('login')->with('errorLogin', 'You should have account to this action');
        }
        $request->validate([
            'title' => ['required', 'unique:events'],
            'description' => 'required',
            'date' => ['required', 'date'],
            'acceptation' => 'required',
            'categorie' => 'required',
            'localisation'=> 'required'
        ]);

        if($request->date < date('Y-m-d')){
            return redirect()->route('event.details', $id)->with('wrongAdd', 'You trying to insert a invalid date!!');
        }

        if ($request->acceptation == 1){
            $acceptation = true;
        }else {
            $acceptation = false;
        }
        $evenet = Event::find($id);

            $evenet->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'acceptation' => $acceptation,
                'categorie_id' => $request->input('categorie'),
                'date' => $request->input('date'),
                'localisation' => $request->input('localisation')
            ]);

            return redirect()->route('event.details', $id)->with('actionResponse', 'Your Event Updated Successfully');
    }

    public function toFindEvent()
    {
        $categories = Categorie::all();
        return view('findEvent', compact('categories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query_s');
        $events = Event::where('title', 'LIKE', '%'.$query.'%')->where('status', 1)->get();
        return view('searchReasult',compact('events'));
    }

    public function sort(Request $request)
    {
        $query = $request->input('query_s');
        $events = Event::where('categorie_id', 'LIKE', '%'.$query.'%')->where('status', 1)->get();
        return view('searchReasult',compact('events'));
    }

    public function adminStatistics()
    {
        $events = Event::count();
        $users = User::count();
        $reservations = Reservation::count();
        $categories = Categorie::count();
        return view('adminDashboard', compact('events', 'users', 'categories', 'reservations'));
    }

    public function requestEvent()
    {
        $events = Event::where('status', 0)->get();
        return view('requestEvent', compact('events'));
    }

    public function acceptEvent($id)
    {
        $event = Event::find($id);

        if ($event->status == 0) {
            $event->status = 1;
            $event->save();
        }

        $user = User::find($event->user_id);

        if ($user->role_id == 3){
            $user->update([
                'role_id' => 2
            ]);
        }

        return redirect()->route('request.event')->with('response', 'accept Successfully');
    }

    public function refuseEvent($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('request.event')->with('response', 'refused Successfully');
    }
}
