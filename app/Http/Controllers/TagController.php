<?php

namespace App\Http\Controllers;

use App\Tag;
use \Illuminate\Support\Collection;
use App\Sector;

class TagController extends Controller
{


    public function __construct()
    {
        $this->middleware('role:admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        dd('tags index');
    }

    public function create()
    {
        return view('pages.tags.create');
    }

    public function store()
    {   
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        $tag = new Tag;
            $tag->name = request('name');
            $tag->description = request('description');
        $tag->save();

        return redirect('admin/tags');
    }

    public function show($slug)
    {   
        $tag = Tag::findBySlugOrFail($slug);
        $collection = $this->collectContent( $tag );
        return view('pages.tags.show', compact('tag', 'collection'));
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('pages.tags.edit', compact('tag'));
    }

    public function update($id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        $tag = Tag::find($id);
            $tag->name = request('name');
            $tag->description = request('description');
        $tag->save();

        return redirect('admin/tags');
    }

    public function destroy($slug)
    {
        Tag::findBySlugOrFail($slug)->delete();
        return redirect('admin/tags');
    }

    public function collectContent($tag)
    {
        $collection = new Collection;

        $articles = $tag->articles;
        $events = $tag->events;
        $galleries = $tag->galleries;

        $collection = $collection->merge($events);
        $collection = $collection->merge($articles);
        $collection = $collection->merge($galleries);

        return $collection;
    }

}
