<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $allTickets = Ticket::all()->count();
        $pendingTickets = Ticket::where('status', 'pending')->count();
        $completedTickets = Ticket::where('status', 'completed')->count();
 
        return view ('agent.dashboard')->with([
            'all' => $allTickets,
            'pending' => $pendingTickets,
            'completed' => $completedTickets,
        ]);
    }
}
