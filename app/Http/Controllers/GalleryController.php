<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Gallery;
use App\Sector;

class GalleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin', ['only' => ['create', 'edit', 'destroy', 'store', 'update']]);
    }

	//gallerie | GET
	public function index()
	{
		$galleries = Gallery::latest()->get();
		return view('pages.galleries.index', compact('galleries'));
	}

	//gallerie/create | GET
	public function create()
	{	
        $tags = Tag::orderBy('name')->pluck('name','id');
        $selected = [];
        $sectors = Sector::pluck('name','id');
        $sector = [];		
		return view('pages.galleries.create', compact('tags', 'selected', 'sectors', 'sector'));
	}

	//gallerie | POST
	public function store()
	{
		$this->validate(request(), [
			'name' => 'required',
			'categories' => 'required',
			'sectors' => 'required',
			'description' => 'required'
		]);

		$gallery = new Gallery;
			$gallery->name = request('name');
			$gallery->description = request('description');
        $gallery->save();

        $gallery->tags()->attach(request('categories'));
        $gallery->sectors()->attach(request('sectors'));

		return redirect('admin/gallerie');
	}
	//gallerie/{id}/edit | GET
	public function edit($id)
	{
        $gallery = Gallery::findOrFail($id);
        $tags = Tag::orderBy('name')->pluck('name','id');
        $selected = [];
        foreach ($gallery->tags as $tag) {
            $selected[$tag->name] = $tag->id;
        }
        $sectors = Sector::pluck('name','id');
        $sector = [];
        foreach ($gallery->sectors as $value) {
            $sector[$value->name] = $value->id;
        }
		return view('pages.galleries.edit', compact('gallery', 'tags', 'selected', 'sectors', 'sector'));

	}
	//gallerie/{id} | PATCH
	public function update($id)
	{
		$this->validate(request(), [
			'name' => 'required',
			'categories' => 'required',
			'sectors' => 'required',
			'description' => 'required'
		]);

		$gallery = Gallery::findOrFail($id);;
			$gallery->name = request('name');
			$gallery->description = request('description');
        $gallery->save();

        $gallery->tags()->sync(request('categories'));
        $gallery->sectors()->sync(request('sectors'));

		return redirect('admin/gallerie');
	}
	//gallerie/{id} | DELETE
	public function destroy($id)
	{
		dd('todo delete');
		return redirect('gallerie');
	}
	//gallerie/associazione | GET
	public function associazione()
	{
		$galleries = Sector::find(1)->galleries()->orderBy('created_at', 'DESC')->paginate();
		return view('pages.galleries.associazione', compact('galleries'));
	}
	//gallerie/scala-dei-sapori | GET
	public function scala()
	{	
		$galleries = Sector::find(2)->galleries()->orderBy('created_at', 'DESC')->paginate();
		return view('pages.galleries.scala', compact('galleries'));
	}


	//gallerie/{sector}/{slug} | GET
	public function show($sector, $slug)
	{	
		$gallery = Gallery::findBySlugOrFail($slug);
		return view('pages.galleries.show', compact('gallery'));
	}

}


