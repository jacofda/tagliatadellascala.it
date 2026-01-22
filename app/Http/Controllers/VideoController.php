<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Sector;
use App\Tag;

class VideoController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin', ['only' => ['create', 'edit', 'destroy', 'store', 'update']]);
    }

	//video | GET
	public function index()
	{
		$videos = Video::latest()->get();
		return view('pages.videos.index', compact('videos'));
	}

//video/{sector}/{slug} | GET
	public function show($sector,$slug)
	{
		$video = Video::findBySlugOrFail($slug);
        $sector = Sector::findBySlugOrFail($sector);
		return view('pages.videos.show', compact('video', 'sector'));
	}

	//video/create | GET
	public function create()
	{
        $tags = Tag::orderBy('name')->pluck('name','id');
        $selected = [];
        $sectors = Sector::pluck('name','id');
        $sector = [];
		return view('pages.videos.create', compact('tags', 'selected', 'sectors', 'sector'));
	}

	//video | POST
	public function store()
	{
		$this->validate(request(), [
			'name' => 'required',
			'categories' => 'required',
			'sectors' => 'required',
			'description' => 'required',
			'embed' => 'required'
		]);

		$video = new Video;
			$video->name = request('name');
			$video->description = request('description');
			$video->embed = request('embed');
        $video->save();

        $video->tags()->attach(request('categories'));
        $video->sectors()->attach(request('sectors'));

		return redirect('admin/video');
	}
	//video/{id}/edit | GET
	public function edit($id)
	{
        $video = Video::findOrFail($id);
        $tags = Tag::orderBy('name')->pluck('name','id');
        $selected = [];
        foreach ($video->tags as $tag) {
            $selected[$tag->name] = $tag->id;
        }
        $sectors = Sector::pluck('name','id');
        $sector = [];
        foreach ($video->sectors as $value) {
            $sector[$value->name] = $value->id;
        }
		return view('pages.videos.edit', compact('video', 'tags', 'selected', 'sectors', 'sector'));

	}
	//video/{id} | PATCH
	public function update($id)
	{
		$this->validate(request(), [
			'name' => 'required',
			'categories' => 'required',
			'sectors' => 'required',
			'description' => 'required',
			'embed' => 'required'
		]);

		$video = Video::findOrFail($id);;
			$video->name = request('name');
			$video->description = request('description');
			$video->embed = request('embed');
        $video->save();

        $video->tags()->sync(request('categories'));
        $video->sectors()->sync(request('sectors'));

		return redirect('admin/video');
	}
	//video/{id} | DELETE
	public function destroy($id)
	{
		dd('todo delete');
		return redirect('admin/video');
	}
}
