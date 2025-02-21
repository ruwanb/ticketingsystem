<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Models\Ticket;
use App\Notifications\SendReplyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TicketController extends Controller
{
    public function index()
    {
        return view ('agent.tickets.index');
    }

    public function show(Ticket $ticket)
    { 
        return view ('agent.tickets.show', compact('ticket'));
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'ticket_id' => 'required',
            'reply' => 'required',
        ]); 

        $reply = Reply::create([
            'ticket_id' => $request->get('ticket_id'),
            'reply' => $request->get('reply'),
        ]);

        $ticket = Ticket::find($request->get('ticket_id'));
        
        $ticket->update([
            'status' => 'completed',
        ]);

        Notification::send( $ticket->user, new SendReplyNotification($ticket->reference, $reply->reply));

        return redirect()->back()->with(['success', 'Reply and Status updated succesfully']);
    }
}
