<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    public function index()
    {
        return view('createTickets');
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'gt:0'],
            'price' => ['required', 'gt:0'],
            'type' => 'required'
        ]);

        dd($request);
    }
}
