<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Sector;
use App\Tag;
use App\Libraries\MediaHelper;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin', ['only' => ['create', 'edit', 'destroy', 'store', 'update']]);
    }

	//articoli/create | GET
	public function create()
	{	
        $tags = Tag::orderBy('name')->pluck('name','id');
        $selected = [];
        $sectors = Sector::pluck('name','id');
        $sector = [];		
		return view('pages.articles.create', compact('tags', 'selected', 'sectors', 'sector'));
	}

	//articoli | POST
	public function store()
	{
		$this->validate(request(), [
			'name' => 'required',
			'categories' => 'required',
			'sectors' => 'required',
			'description' => 'required'
		]);

		$article = new Article;
			$article->name = request('name');
			$article->description = request('description');
        $article->save();

        $article->tags()->attach(request('categories'));
        $article->sectors()->attach(request('sectors'));

		return redirect('admin/articoli');
	}
	//articoli/{id}/edit | GET
	public function edit($id)
	{
        $article = Article::findOrFail($id);
        $tags = Tag::orderBy('name')->pluck('name','id');
        $selected = [];
        foreach ($article->tags as $tag) {
            $selected[$tag->name] = $tag->id;
        }
        $sectors = Sector::pluck('name','id');
        $sector = [];
        foreach ($article->sectors as $value) {
            $sector[$value->name] = $value->id;
        }
		return view('pages.articles.edit', compact('article', 'tags', 'selected', 'sectors', 'sector'));

	}
	//articoli/{id} | PATCH
	public function update($id)
	{
		$this->validate(request(), [
			'name' => 'required',
			'categories' => 'required',
			'sectors' => 'required',
			'description' => 'required'
		]);

		$article = Article::findOrFail($id);;
			$article->name = request('name');
			$article->description = request('description');
        $article->save();

        $article->tags()->sync(request('categories'));
        $article->sectors()->sync(request('sectors'));

		return redirect('admin/articoli');
	}
	//articoli/{id} | DELETE
	public function destroy($slug)
	{
		$article = Article::findBySlugOrFail($slug);
		if ( $article->media()->exists() )
		{	
			$helper = new MediaHelper;
			foreach ($article->media as $media) {
				$helper->deleteMediaFromModel("articles", $media->id);
			}
		}
		$article->delete();
		return redirect('admin/articoli');
	}
	//articoli/associazione | GET
	public function associazione()
	{
		$articles = Sector::find(1)->articles()->orderBy('created_at', 'DESC')->paginate(14);
		return view('pages.articles.associazione', compact('articles'));
	}
	//scala-dei-sapori/stands | GET
	public function scala()
	{	
		$articles = Sector::find(2)->articles()->orderBy('created_at', 'DESC')->paginate(14);
		
		return view('pages.articles.scala', compact('articles'));
	}

	//scala-dei-sapori/stands/{tag} | GET
	public function scalaTag($slug)
	{	
		$tag = Tag::findBySlugOrFail($slug);
		$articles = Article::join('sectorables', function ($join) {
            	$join->on('articles.id', '=', 'sectorables.sectorable_id')
                 ->where('sectorables.sectorable_type', 'App\Article')
                 ->where('sectorables.sector_id', 2);
        	})
        	->join('taggables', function ($join) use ($tag) {
            	$join->on('articles.id', '=', 'taggables.taggable_id')
                 ->where('taggables.taggable_type', 'App\Article')
                 ->where('taggables.tag_id', $tag->id );
        	})
            ->select('articles.*')
            ->orderBy('created_at', 'DESC')
            ->paginate(14);

		return view('pages.articles.scala-tag', compact('articles', 'tag'));	
	}

	//articoli/{sector}/tags/{tag} | GET
	public function tags($sector, $tag)
	{	
		dd('todo');
		$articles = Tag::findBySlugOrFail($tag);
		return view('pages.articles.tags');
	}
	//articoli/{sector}/{slug} | GET
	public function show($sector, $slug)
	{	
		$article = Article::findBySlugOrFail($slug);
		return view('pages.articles.show', compact('article'));
	}

}


