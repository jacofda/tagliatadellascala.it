<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Event, Sector, Tag, Ticket, User, Profile, Media};
use \Carbon\Carbon;
use \Auth;
use \Session;
use \PDF;
use \DB;
use App\Libraries\MediaHelper;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin', ['only' => ['create', 'edit', 'destroy', 'store', 'update']]);
    }

	//eventi | GET
	public function index()
	{
		$events = Event::orderBy('start', 'DESC')->get();
		return view('pages.events.index', compact('events'));
	}
	//eventi/create | GET
	public function create()
	{
        $tags = Tag::orderBy('name')->pluck('name','id');
        $selected = [];
        $sectors = Sector::pluck('name','id');
        $sector = [];
		return view('pages.events.create', compact('tags', 'selected', 'sectors', 'sector'));
	}
	//eventi | POST
	public function store()
	{



		$this->validate(request(), [
			'name' => 'required',
			'categories' => 'required',
			'location' => 'required',
			'sectors' => 'required',
			'start' => 'required',
			'finish' => 'required',
			'description' => 'required',
			'price' => 'nullable|integer|min:3',
			'price_reduced' => 'nullable|integer|min:3',
			'ticket_availability' => 'nullable|integer'
		]);
		$event = new Event;
			$event->name = request('name');
			$event->description = request('description');
			$event->location = request('location');
            $event->start = Carbon::createFromFormat( 'd/m/Y H:i', request('start') );
            $event->finish = Carbon::createFromFormat( 'd/m/Y H:i', request('finish') );
            $event->price = request('price');
            $event->price_reduced = request('price_reduced');
            $event->ticket_availability = request('ticket_availability');
        $event->save();

        $event->tags()->attach(request('categories'));
        $event->sectors()->attach(request('sectors'));

		return redirect('admin/eventi');
	}
	//eventi/{id}/edit | GET
	public function edit($id)
	{
        $event = Event::findOrFail($id);
        $tags = Tag::orderBy('name')->pluck('name','id');
        $selected = [];
        foreach ($event->tags as $tag) {
            $selected[$tag->name] = $tag->id;
        }
        $sectors = Sector::pluck('name','id');
        $sector = [];
        foreach ($event->sectors as $value) {
            $sector[$value->name] = $value->id;
        }
        return view('pages.events.edit', compact('event', 'tags', 'selected', 'sectors', 'sector'));
	}
	//eventi/{id} | PATCH
	public function update($id)
	{
		$this->validate(request(), [
			'name' => 'required',
			'categories' => 'required',
			'sectors' => 'required',
			'start' => 'required',
			'finish' => 'required',
			'description' => 'required',
			'price' => 'nullable|integer|min:3',
			'price_reduced' => 'nullable|integer|min:3',
			'ticket_availability' => 'nullable|integer'
		]);
		$event = Event::findOrFail($id);
			$event->name = request('name');
			$event->description = request('description');
			$event->location = request('location');
            $event->start = Carbon::createFromFormat( 'd/m/Y H:i', request('start') );
            $event->finish = Carbon::createFromFormat( 'd/m/Y H:i', request('finish') );
            $event->price = request('price');
            $event->price_reduced = request('price_reduced');
            $event->ticket_availability = request('ticket_availability');
        $event->save();

        $event->tags()->sync(request('categories'));
        $event->sectors()->sync(request('sectors'));

		return redirect('admin/eventi');
	}
	//eventi/{id} | DELETE
	public function destroy($id, MediaHelper $helper)
	{
		$event = Event::findOrFail($id);
		foreach($event->media as $file)
		{
			$helper->deleteMediaFromModel('events', $file->id);
		}
		return redirect('admin/eventi');
	}
	//eventi/associazione | GET
	public function associazione()
	{
		dd('todo ass');
		return view('pages.events.associazione');
	}
	//eventi/scala-dei-sapori | GET
	public function scala()
	{
		dd('todo scala');
		return view('pages.events.scala');
	}
	//eventi/{sector}/{slug} | GET
	public function show($sector, $slug)
	{
		$event = Event::findBySlugOrFail($slug);
		setlocale(LC_TIME, 'it_IT.utf8');

		return view('pages.events.show', compact('event'));
	}

	//eventi/biglietti (POST)
	public function biglietti()
	{
		$event = Event::findOrFail(request('id'));


		if ( Carbon::now()->gt( $event->start->subDays(2) ) )
		{
			return back()->with('error', 'Ci dispiace ma la prevendita è scaduta');
		}

		if ( $event->ticket_availability == 0 )
		{
			return back()->with('error', 'Ci dispiace ma non ci sono più biglietti disponibili');
		}

		if ( Auth::guest() )
		{
			return redirect('login')->with("message", "Per acquistare i bilgietti dell'evento: ".$event->name." devi prima registarti sul sito");
		}

		Session::put('event_id', request('id'));

		return redirect('eventi/carrello');
	}

	//eventi/carrello (GET)
	public function carrello()
	{
		if ( session()->has('event_id') )
		{
			$event = Event::findOrFail( session('event_id') );
			return view('pages.events.cart', compact('event'));
		}

		return redirect('eventi')->with('message', 'La sessione è scaduta. Ricomincia grazie');
	}

	//eventi/pre-pagamento (POST)
	public function prePagamento()
	{
		$event = Event::findOrFail(request('id'));
		if ( Auth::guest() )
		{
			return redirect('login')->with("message", "Per acquistare i bilgietti devi prima registarti sul sito");
		}


		$numero_biglietti = request('n_tickets') + request('n_tickets_reduced');
		if ( $event->ticket_availability < $numero_biglietti )
		{
			return back()->with('error', 'Ci dispiace ma sono disponibili solo '.$event->ticket_availability.' bilgietti');
		}

		Session::put('n_tickets', request('n_tickets'));
		Session::put('n_tickets_reduced', request('n_tickets_reduced'));

		return redirect('eventi/pagamento');
	}

	//eventi/pagamento (GET)
	public function pagamento()
	{

        if ( request()->session()->has('error') )
        {
            request()->session()->forget('error');
        }

		if ( session()->has('event_id') && session()->has('n_tickets') )
		{
			$event = Event::findOrFail( session('event_id') );
			$tickets = session('n_tickets');
			$tickets_reduced = session('n_tickets_reduced');

			\Stripe\Stripe::setApiKey(config('app.stripe_secret'));
			$amount = ($tickets*$event->price)+($tickets_reduced*$event->price_reduced);


	        $intent = \Stripe\PaymentIntent::create([
	          "amount" => $amount,
	          "currency" => "eur",
	          "payment_method_types" => ["card"],
	        ]);

			return view('pages.events.payment', compact('event', 'tickets', 'tickets_reduced', 'intent', 'amount'));
		}

		return redirect('eventi')->with('message', 'La sessione è scaduta. Ricomincia grazie');
	}


//ordine/process-stripe-payment - POST
public function processStripePayment()
	{
	    $transaction = request('response');
	    $order = $this->addOrder($transaction['paymentIntent'], 'carta');
	    return 'SUCCESS';
	}

//STRIPE
//ordine/pagamento-fallito/{id} - GET
	public function failedPaymentWithCard($code)
	{
	    $element = \DB::table('responses')->where('decline_code', $code)->first();
        $event = Event::findOrFail( session('event_id') );
	    return view('pages.events.failed', compact('element','event'));
	}


	//eventi/pagamento (POST)
	public function payment()
	{



		if ( session()->has('event_id') && session()->has('n_tickets') )
		{

			$event = Event::findOrFail( session('event_id') );

			if ( session()->has('n_tickets') && session()->has('n_tickets_reduced') )
			{
				$total = ( $event->price * session('n_tickets') ) + ( $event->price_reduced * session('n_tickets_reduced') );
				$ticket_json = [
					'Intero' => session('n_tickets'),
					'Ridotto' => session('n_tickets_reduced')
				];
				$numero_biglietti = session('n_tickets') + session('n_tickets_reduced');
			}
			elseif ( session()->has('n_tickets') )
			{
				$total = $event->price * session('n_tickets') ;
				$ticket_json = ['Intero' => session('n_tickets')];
				$numero_biglietti = session('n_tickets');
			}
			elseif ( session()->has('n_tickets_reduced') )
			{
				$total = $event->price_reduced * session('n_tickets_reduced') ;
				$ticket_json = ['Ridotto' => session('n_tickets_reduced')];
				$numero_biglietti = session('n_tickets_reduced');
			}
			else
			{
				return redirect('eventi')->with('message', 'La sessione è scaduta. Ricomincia grazie');
			}


	    	//2. update database
	    	$ticket = new Ticket;
	    		$ticket->ticket_json = json_encode($ticket_json);
	    		$ticket->code = uniqid();
	            $ticket->charge_response_id = request('response');
	    		$ticket->user_id = Auth::user()->id;
	    		$ticket->event_id = $event->id;
	    	$ticket->save();

	    	$event->decrement('ticket_availability', $numero_biglietti);

	    	//3. create PDF
	    	$this->createPDF($ticket, $event);


	        return "SUCCESS";
		}

		return redirect('eventi')->with('message', 'La sessione è scaduta. Ricomincia grazie');

	}


	//eventi/pagamento/conferma
	public function confirmation()
	{

        $user = Auth::user();

        $ticket = Ticket::where('user_id', $user->id)->latest()->first();
        $event = Event::findOrFail($ticket->event_id);



//send email confirmation
		$profile = $user->profile;
		\Mail::to( $user )->send( new \App\Mail\SendTicket($ticket, $profile, $event) );


//forget session
session()->forget(['n_tickets', 'n_tickets_reduced', 'ticket_id', 'event_id' ]);



        return view('pages.events.confirmation', compact('ticket', 'event', 'profile'));

	}

    public function createPDF($ticket, $event)
    {
    	$profile = $ticket->user->profile;
		$pdf = PDF::loadView('pdf.ticket', compact('profile', 'event', 'ticket'));

		$filename = '2022/'.date('d-m--h-i').'-'.rand(1,10).$ticket->id.'-'.$event->slug.'.pdf';
		$fullpath = storage_path('/app/public/tickets/'.$filename);
		$description = $profile->nome.' '.$profile->cognome. " biglietti evento: ".$event->name;

        Media::create([
        	'mime' => 'doc',
        	'filename' => $filename,
        	'description' => $description,
        	'mediable_id' => $ticket->id,
        	'mediable_type' => "App\Ticket"
        ]);

		$pdf->save($fullpath);

		return $pdf->download($filename);
    }





}
