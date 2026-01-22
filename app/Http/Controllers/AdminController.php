<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\Event;
use App\Article;
use App\Gallery;
use App\Tag;
use App\Libraries\MediaHelper;
use App\Video;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin', ['except' => ['dashboard']]);
    }

	public function dashboard()
	{
		$user = Auth::user();
		if ( $user->isAdmin() )
		{
			return view('home');
		}

		if ( $user->profile()->exists() )
		{
			return redirect('profile/'.$user->profile->id);
		}

		return redirect('profilo/create');

	}


    public function addMedia(MediaHelper $helper)
    {
        return $helper->saveImageOrFile(request());
    }

    public function updateMedia(MediaHelper $helper)
    {
        $helper->updateDescription(request()->input());
        return request('description');
    }

    public function deleteMedia(MediaHelper $helper)
    {
    	return $helper->deleteMediaFromModel(request('directory'), request('id'));
    }


	//admin/eventi
	public function eventi()
	{
		$events = Event::orderBy('created_at', 'DESC')->paginate();
		return view('pages.admin.events', compact('events'));
	}

	//eventi/{id}/media
	public function eventiMedia($id)
	{
		$event = Event::findOrFail($id);
		return view('pages.events.addMedia', compact('event'));
	}

	//admin/articoli
	public function articoli()
	{
		$articles = Article::orderBy('created_at', 'DESC')->paginate(30);
		return view('pages.admin.articles', compact('articles'));
	}

	//articoli/{id}/media
	public function articoliMedia($id)
	{
		$article = Article::findOrFail($id);
		return view('pages.articles.addMedia', compact('article'));
	}

	//admin/gallerie
	public function gallerie()
	{
		$galleries = Gallery::orderBy('created_at', 'DESC')->paginate();
		return view('pages.admin.galleries', compact('galleries'));
	}

	//gallerie/{id}/media
	public function gallerieMedia($id)
	{
		$gallery = Gallery::findOrFail($id);
		return view('pages.galleries.addMedia', compact('gallery'));
	}

	//admin/tags
	public function tags()
	{
		$tags = Tag::orderBy('name', 'ASC')->paginate(40);
		return view('pages.admin.tags', compact('tags'));
	}

	//admin/video
	public function video()
	{
		$videos = Video::orderBy('created_at', 'DESC')->paginate();
		return view('pages.admin.video', compact('videos'));
	}


}
