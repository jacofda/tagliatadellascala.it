<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Event, Ticket, User, Profile};
use \Auth;
use \DB;


class TicketController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }


    public function showTicketAdmin($id)
    {
        $ticket = Ticket::find($id);
        $user = User::find($ticket->user_id);
        $event = Event::find($ticket->event_id);
        $profile = $user->profile;
        return view('pages.admin.tickets.showTicketAdmin', compact('ticket', 'profile', 'user', 'event'));
    }


    public function show($uuid)
    {   

        if ( session()->has('uuid') )
        {
            session()->forget('uuid');
        }

        if( !Ticket::where('code', $uuid)->exists() )
        {
            session()->put('uuid', $uuid);
            return redirect('tickets/spam');
        }

        $ticket = Ticket::where('code', $uuid)->first();
        $user = User::find($ticket->user_id);
        $event = Event::find($ticket->event_id);
        $profile = $user->profile;
        return view('pages.admin.tickets.show', compact('ticket', 'profile', 'user', 'event'));
    }

    public function index()
    {   
        if( request()->has('filter') )
        {
            $tickets = Ticket::where('event_id', request()->get('filter') )->get();
        }
        elseif ( request()->has('sort') )
        {
            $tickets = Ticket::orderBy('created_at',  request()->get('sort') )->get();
        }
        else
        {
            $tickets = Ticket::all();
        }
        
        return view('pages.admin.tickets.index', compact('tickets'));
    }

    public function update($id)
    {   
        $ticket = Ticket::find($id);
            $ticket->checked = true;
        $ticket->save();

        return back();
    }

    public function spam()
    {
        return view('pages.admin.tickets.spam');
    }

}
