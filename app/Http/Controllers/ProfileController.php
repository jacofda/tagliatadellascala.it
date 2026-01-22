<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use \Auth;

class ProfileController extends Controller
{
    
    public function __construct()
    {
    	$this->middleware('auth');
    }

	public function show($id)
	{	
		if( Auth::user()->isAdmin() )
		{
			$profile = Profile::find($id);
		}
		else
		{
			$profile = Auth::user()->profile;
		}	
		return view('pages.profiles.show', compact('profile'));
	}

	public function index()
	{	
		if( Auth::user()->isAdmin() )
		{
			$profiles = Profile::orderBy('id', 'DESC')->paginate(30);
			return view('pages.admin.profiles', compact('profiles'));			
		}

		if ( Auth::user()->profile()->exists() )
		{	
			return redirect('profilo/'.Auth::user()->profile->id);
		}

		return redirect('profilo/create');

	}

	public function create()
	{
		return view('pages.profiles.create');
	}

	public function edit($id)
	{	
		$user = Auth::user();
		$profile = $user->profile;
		return view('pages.profiles.edit', compact('profile'));
	}

	public function store()
	{
		$this->validate(request(), [
			'nome' => 'required',
			'cognome' => 'required',
			'email' => 'required',
			'telefono' => 'required'
		]);
		$user = Auth::user();
		$profile = new Profile;
			$profile->nome = ucfirst(strtolower(request('nome')));
			$profile->cognome = ucfirst(strtolower(request('cognome')));
			$profile->email = request('email');
			$profile->telefono = request('telefono');
			$profile->user_id = $user->id;
		$profile->save();

		return redirect('profilo/'.$profile->id);
	}

	public function update($id)
	{
		$this->validate(request(), [
			'nome' => 'required',
			'cognome' => 'required',
			'email' => 'required',
			'telefono' => 'required'
		]);

		$profile = Profile::find($id);
			$profile->nome = request('nome');
			$profile->cognome = request('cognome');
			$profile->email = request('email');
			$profile->telefono = request('telefono');
		$profile->save();

		return redirect('profilo/'.$profile->id);
	}

	public function editLogin($id)
	{	
		$user = \Auth::user();
		if($user->isAdmin())
		{	
			$user = User::find($id);
			return view('pages.profiles.edit-login', compact('user'));
		}

		return view('pages.profiles.edit-login', compact('user'));
	}

	public function updateLogin($id)
	{	
		$this->validate(request(), [
            'email'      => 'required|email|unique:users,email,'.\Auth::user()->id,
            'password'   => 'required|confirmed',
		]);
		$user = User::find($id);
			$user->email = request('email');
			$user->password = bcrypt(request('password'));
		$user->save();

		return redirect('profilo/'.Auth::user()->profile->id);
	}

	public function destroy($id)
	{
		$profile = Profile::find($id);
		$profile->delete();

		return redirect('profilo');
	}


}
