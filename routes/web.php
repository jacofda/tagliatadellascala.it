<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'PagesController@welcome')->name('welcome');
Auth::routes();

Route::get('profilo/', 'ProfileController@index');
Route::post('profilo', 'ProfileController@store');
Route::get('profilo/create', 'ProfileController@create');
Route::get('profilo/{id}', 'ProfileController@show');
Route::get('profilo/{id}/edit', 'ProfileController@edit');
Route::delete('profilo/{id}', 'ProfileController@destroy');
Route::patch('profilo/{id}', 'ProfileController@update');

Route::get('user/{id}/edit', 'ProfileController@editLogin');
Route::patch('user/{id}', 'ProfileController@updateLogin');


Route::get('/home', 'AdminController@dashboard');

Route::get('eventi', 'EventController@index');
Route::get('eventi/create', 'EventController@create');
Route::post('eventi', 'EventController@store');

Route::post('eventi/biglietti', 'EventController@biglietti');
Route::get('eventi/carrello', 'EventController@carrello');
Route::post('eventi/pre-pagamento', 'EventController@prePagamento');
Route::get('eventi/pagamento', 'EventController@pagamento');
Route::post('eventi/pagamento', 'EventController@payment');

Route::get('eventi/pagamento/errore/{code}', 'EventController@failedPaymentWithCard');
Route::get('eventi/pagamento/conferma', 'EventController@confirmation');

Route::get('tickets', 'TicketController@index');
Route::get('tickets/spam', 'TicketController@spam');
Route::get('ticket/{id}', 'TicketController@showTicketAdmin');
Route::get('tickets/{uuid}', 'TicketController@show');
Route::post('tickets/{id}', 'TicketController@update');

Route::get('eventi/{id}/edit', 'EventController@edit');
Route::patch('eventi/{id}', 'EventController@update');
Route::delete('eventi/{id}', 'EventController@destroy');
Route::get('eventi/{sector}/{slug}', 'EventController@show');

Route::resource('tags', 'TagController');

Route::get('articoli/create', 'ArticleController@create');
Route::post('articoli', 'ArticleController@store');
Route::get('articoli/{id}/edit', 'ArticleController@edit');
Route::patch('articoli/{id}', 'ArticleController@update');
Route::delete('articoli/{id}', 'ArticleController@destroy');
Route::get('scala-dei-sapori/stands', 'ArticleController@scala');
Route::get('scala-dei-sapori/stands/{tag}', 'ArticleController@scalaTag');
Route::get('articoli/associazione', 'ArticleController@associazione');
Route::get('articoli/{sector}/{slug}', 'ArticleController@show');

Route::get('gallerie', 'GalleryController@index');
Route::get('gallerie/create', 'GalleryController@create');
Route::post('gallerie', 'GalleryController@store');
Route::get('gallerie/{id}/edit', 'GalleryController@edit');
Route::patch('gallerie/{id}', 'GalleryController@update');
Route::delete('gallerie/{id}', 'GalleryController@destroy');
Route::get('gallerie/scala-dei-sapori', 'GalleryController@scala');
Route::get('gallerie/associazione', 'GalleryController@associazione');
Route::get('gallerie/{sector}/{slug}', 'GalleryController@show');

Route::get('video', 'VideoController@index');
Route::get('video/create', 'VideoController@create');
Route::post('video', 'VideoController@store');
Route::get('video/{id}/edit', 'VideoController@edit');
Route::patch('video/{id}', 'VideoController@update');
Route::delete('video/{id}', 'VideoController@destroy');
Route::get('video/{sector}/{slug}', 'VideoController@show');


Route::get('contatti', 'PagesController@contattiGet');
Route::post('contatti', 'PagesController@contattiPost');
Route::get('associazione/chi-siamo', 'PagesController@associazione');
Route::get('scala-dei-sapori/la-storia', 'PagesController@storia');
Route::get('scala-dei-sapori/diventa-espositore', 'PagesController@espositore');
Route::get('scala-dei-sapori/edizione-2017', 'PagesController@sds2017');
Route::get('scala-dei-sapori/edizione-2018', 'PagesController@sds2018');
Route::get('scala-dei-sapori/edizione-2019', 'PagesController@sds2019');

Route::get('associazione', 'PagesController@associazioneContent');
Route::get('scala-dei-sapori', 'PagesController@scalaContent');
// Route::get('associazione/{tag}', 'PagesController@associazioneContentTag');
// Route::get('scala-dei-sapori/{tag}', 'PagesController@scalaContentTag');
Route::get('privacy', 'PagesController@privacy');
Route::get('faq-biglietti-online', 'PagesController@faq');


Route::group(['prefix' => 'admin'], function () {

	Route::get('eventi', 'AdminController@eventi');
	Route::get('eventi/{id}/media', 'AdminController@eventiMedia');
	Route::get('articoli', 'AdminController@articoli');
	Route::get('articoli/{id}/media', 'AdminController@articoliMedia');
	Route::get('gallerie', 'AdminController@gallerie');
	Route::get('gallerie/{id}/media', 'AdminController@gallerieMedia');
	Route::get('tags', 'AdminController@tags');
	Route::get('video', 'AdminController@video');

	Route::post('media/add', 'AdminController@addMedia');
	Route::post('media/update', 'AdminController@updateMedia');
	Route::post('media/delete', 'AdminController@deleteMedia');

});

Route::get('test', function(){


	\App\User::where('id', '>', 121)->delete();
	dd('done');


	$ticket = \App\Ticket::find(34);
	$user = $ticket->user;
	$profile = $ticket->user->profile;
	$event = \App\Event::find(15);

	//test send ticket
	// \Mail::to( $user )->send( new \App\Mail\SendTicket($ticket, $profile, $event) );


	//test create ticket
	$eventController = new \App\Http\Controllers\EventController;
	return $eventController->createPDF($ticket, $event);

	return 'DONE';
});
