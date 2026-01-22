<?php 

namespace App\Libraries;

use \Mail;
use \Auth;
use \Log;

class EmailHelper
{
	public function sendEmailNewOrder($data)
	{	
		Mail::send('emails.ordertoprocess', array(
			'url' => $data['url']
		), function($m){
        	$m->from( env('EMAIL_ADDRESS'), str_replace("_", " ", env('EMAIL_NAME')) );
            $m->to( env('EMAIL_ADDRESS'), "Amministratore Betty")->subject("Nuovo Ordine da Betty.it");
        });
		return 'done';
	}

	public function sendEmailError($data)
	{	
		$data['email'] = Auth::user()->email;

		Mail::send('emails.error', array(
			'body' => $data['body'],
			'email' => $data['email']
		), function($m){
        	$m->from( env('EMAIL_ADDRESS'), str_replace("_", " ", env('EMAIL_NAME')) );
            $m->to( env('EMAIL_ADDRESS'), "Amministratore Betty")->subject("Errore Pagamento");
        });

		return 'done';
	}

	public function paymentConfirmation($data)
	{
		
		Mail::send('emails.purchaseConfirmation', array(
			'euro' => $data['euro']
		), function($m) use ($data){
        	$m->from( env('EMAIL_ADDRESS'), str_replace("_", " ", env('EMAIL_NAME')) );
            $m->to($data['email'], $data['name'])->subject($data['subject']);
        });

		return 'done';	
	}






}