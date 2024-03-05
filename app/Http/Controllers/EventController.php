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
            return redirect()->route('login');
        }
        $request->validate([
            'title' => ['required', 'unique:events'],
            'description' => 'required',
            'date' => ['required', 'date'],
            'categorie' => 'required',
            'localisation'=> 'required',
            'tickets' => ['required', 'integer', 'gt:0']
        ]);

        Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => session('user_id'),
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
}
