<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Event;
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
            'localisation'=> 'required',
            'tickets' => ['required', 'integer', 'gt:0']
        ]);

        if ($request->acceptation == 1){
            $acceptation = true;

        }else {
            $acceptation = false;

        }
//        dd($acceptation);

        Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => session('user_id'),
            'acceptation' => $acceptation,
            'categorie_id' => $request->input('categorie'),
            'date' => $request->input('date'),
            'localisation' => $request->input('localisation'),
            'number_of_seats' => $request->input('tickets')
        ]);

        return redirect()->route('to.add.event')->with('addSuccess', 'Your Event Created Successfully');
    }

    public function getEvents()
    {
        $events = Event::all();
        return view('home', compact('events'));
    }

    public function eventDetails($id)
    {
        $eventId = $id;
        $event = Event::find($eventId);
        $categories = Categorie::all();

        return view('eventDetails', compact('event', 'categories'));
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
            'localisation'=> 'required',
            'tickets' => ['required', 'integer', 'gt:0']
        ]);

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
                'localisation' => $request->input('localisation'),
                'number_of_seats' => $request->input('tickets')
            ]);

            return redirect()->route('event.details', $id)->with('actionResponse', 'Your Event Updated Successfully');
    }
}
