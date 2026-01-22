<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sector;
use \Illuminate\Support\Collection;
use \Carbon\Carbon;
use App\Event;

class PagesController extends Controller
{

    public function welcome()
    {
        $event = null;
        setlocale(LC_TIME, 'it_IT.utf8');
        if ( Event::whereDate('start', '>', Carbon::today()->toDateString())->exists() )
        {
            $event = Event::whereDate('start', '>', Carbon::today()->toDateString())->orderBy('start', 'ASC')->first();
        }

        return view('welcome', compact('event'));
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function associazione()
    {
        $sector = Sector::find(1);
        return view('pages.associazione', compact('sector'));
    }

    public function contattiGet()
    {
    	return view('pages.contatti');
    }

    public function contattiPost()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'body' => 'required',
            'recaptcha_response' => 'required'
        ]);

        $response = (new \ReCaptcha\ReCaptcha(config('app.recaptcha_secret')))
                ->setExpectedAction('contact_form')
                ->verify(request('recaptcha_response'), $_SERVER['REMOTE_ADDR']);

        if (!$response->isSuccess()) {
            return back()->with('message', 'Recaptcha Failed');
        }

        if ($response->getScore() < 0.8) {
          return back()->with('message', 'Recaptcha low score');
        }



        if ( request('to_whom') == 'tagliata' )
        {
            $to = 'info@tagliatadellascala.it';
        }
        else
        {
            $to = 'scaladeisapori@gmail.com';
        }

        $to = 'giacomo.gasperini@gmail.com';


        \Mail::to($to)->send(new \App\Mail\Contatti(request('name'), request('email'), request('body')));

    	return back()->with('message', 'Richiesta di contatti inviata');
    }

    //scala-dei-sapori/la-storia
    public function storia()
    {
        return view('pages.sds.storia');
    }

    //scala-dei-sapori/diventa-espositore
    public function espositore()
    {
        return view('pages.sds.diventa-espositore');
    }

    //scala-dei-sapori/edizione-2017
    public function sds2017()
    {
        return view('pages.sds.sds2017');
    }

    //scala-dei-sapori/edizione-2018
    public function sds2018()
    {
        return view('pages.sds.sds2018');
    }

    //scala-dei-sapori/edizione-2019
    public function sds2019()
    {
        return view('pages.sds.sds2019');
    }


    public function associazioneContent()
    {
        $collection = $this->collectContent(1);
        $collection = $collection->sortByDesc('created_at');

        return view('pages.collections.associazione', compact('collection'));
    }
    public function scalaContent()
    {
        $collection = $this->collectContent(2);
        $collection = $collection->sortByDesc('created_at');

        return view('pages.collections.scala', compact('collection'));
    }
    // public function associazioneContentTag($slug)
    // {
    //     return view('pages.associazione-content-tag', compact('collection'));
    // }
    // public function scalaContentTag($slug)
    // {
    //     return view('pages.associazione-content-tag', compact('collection'));
    // }

    public function collectContent($sector)
    {
        $collection = new Collection;
        $sector = Sector::find($sector);

        $articles = $sector->articles;
        $events = $sector->events;
        $galleries = $sector->galleries;

        $collection = $collection->merge($events);
        $collection = $collection->merge($articles);
        $collection = $collection->merge($galleries);

        return $collection;
    }


    public function faq()
    {
        return view('pages.faq');
    }

}
