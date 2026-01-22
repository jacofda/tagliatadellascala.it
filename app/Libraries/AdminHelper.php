<?php 

namespace App\Libraries;

use App\{Media, Event, Article, Tag, Sector, Gallery, Video};
use \Illuminate\Support\Collection;


class AdminHelper {

	public function makeSitemap()
	{
		$sitemap = \App::make("sitemap");
		$staticDate = '2017-07-05T10:10:00+02:00';


		$sitemap->add( url('/'), $staticDate, '1', 'weekly' );
		$sitemap->add( url('associazione/chi-siamo'), $staticDate, '0.9', 'monthly' );
		$sitemap->add( url('scala-dei-sapori/la-storia'), $staticDate, '0.9', 'monthly' );
		$sitemap->add( url('contatti'), $staticDate, '0.8', 'monthly' );

		$sitemap->add( url('gallerie/associazione'), $staticDate, '0.7', 'monthly' );
		$sitemap->add( url('gallerie/scala-dei-sapori'), $staticDate, '0.7', 'monthly' );

		$sitemap->add( url('scala-dei-sapori/edizione-2017'), $staticDate, '0.8', 'monthly' );
		$sitemap->add( url('scala-dei-sapori/stands'), $staticDate, '0.7', 'monthly' );
		$sitemap->add( url('scala-dei-sapori/diventa-espositore'), $staticDate, '0.4', 'monthly' );
		$sitemap->add( url('articoli/associazione'), $staticDate, '0.3', 'monthly' );
		$sitemap->add( url('faq-biglietti-online'), $staticDate, '0.6', 'monthly' );


        $collection = new Collection;

    	$articles = Article::all();
        $events = Event::all();
        $galleries = Gallery::all();
        $videos = Video::all();

        $collection = $collection->merge($events);
        $collection = $collection->merge($articles);
        $collection = $collection->merge($galleries);
        $collection = $collection->merge($videos);

        $collection = $collection->sortByDesc('created_at');

        foreach ($collection as $element) {

	    	if ( $element->media()->where('mime','image')->exists() )
	    	{
	            $images = [];
	            foreach ($element->media as $image) {
	                $images[] = array(
	                    'url' => $image->image,
	                    'title' => $image->description
	                );
	            }
				$sitemap->add( $element->url, $element->created_at->format('Y-m-d\TH:i:sP'), '0.5', 'weekly', $images );
	    	}
	    	else
	    	{
	    		$sitemap->add( $element->url, $element->created_at->format('Y-m-d\TH:i:sP'), '0.5', 'weekly' );
	    	}
        }

        foreach(Tag::onlyUsed() as $tag)
        {
        	$sitemap->add( $tag->url, $tag->created_at->format('Y-m-d\TH:i:sP'), '0.6', 'weekly' );
        }

		$sitemap->store('xml', '../sitemap');
	}

}