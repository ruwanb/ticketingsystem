<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Notifications\SendTicketOpenNotification;
use Illuminate\Support\Facades\Notification;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        return view ('tickets.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $validatedData = $request->validated();
        
        $user = User::where('email', $request->email)->orWhere('phone', $request->phone)->first();

        if($user){
            $this->ticketCreate($user, $validatedData);
        } else {
            $newUser = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'password' => Hash::make(Str::random(8)),
            ]);

            $this->ticketCreate($newUser, $validatedData);
        }

        return redirect()->route('tickets.index')->with([
            'success',
            'Your ticket has created successfully'
        ]);

    }

    private function ticketCreate($user, $validatedData)
    {
        $ticket = Ticket::create([
            'user_id' => $user->id,
            'reference' => $this->referenceGenerate(),
            'question' => $validatedData['question'],
            'status' => 'pending',
            'created_at' => now(),
        ]);

        Notification::send( $ticket->user, new SendTicketOpenNotification($ticket->reference, $ticket->question));
    }

    private function referenceGenerate()
    {
        $tempReference = Str::random(10);

        $existingTicket = Ticket::where('reference', $tempReference)->first();

        if($existingTicket == null)
        {
            return $tempReference;
        } else {
            $this->referenceGenerate();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($reference)
    {
        $ticket = Ticket::where('reference', $reference)->first();

        if(!$ticket)
        {
            return redirect()->route('tickets.index');
        }

        return view ('tickets.show', compact('ticket'));
    }

}
