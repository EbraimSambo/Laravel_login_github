<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Support\Facades\Storage;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$user  = auth()->user();
        //$tickets = $user->isAdmin ? Ticket::latest()->get() : $user->tickets;

       // $tickets = Ticket::all()->where('user_id', auth()->id());
        return view('ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {

        if ($request->hasFile('attachment')) {

            Ticket::create([
                'title' => $request->title,
                'description' => $request->description,
                'attachment' => $request->file('attachment')->store('attachments', 'public'),
                'user_id' => auth()->id(),
            ]);

         }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //$ticketshow = Ticket::find($ticket)->where('user_id', auth()->id());
       return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->except('attachment'));

        return redirect(route('ticket.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect(route('ticket.index'));
    }
}
