<?php

namespace App\Services\Billing;

use \Stripe\{Stripe, Charge, Customer};
use \Stripe\Error\{Card, Base, RateLimit, InvalidRequest, Authentication, ApiConnection};
use \Session;
use \Mail;

class StripeBilling implements BillingInterface
{	

	public function __construct()
	{
		Stripe::setApiKey(config('app.stripe_secret'));
	}

	public function charge(array $data)
	{	
		try
		{	
			return Charge::create([
				'amount'	  	=> $data['amount'],
				"source" 		=> $data['source'],
				'currency'    	=> 'eur',
				"description" 	=> "Biglietti Ass. Tagliata Della Scala",
				"receipt_email" => $data['receipt_email']
			]);
		} 
		catch (Card $e)
		{	
		  	// $body = $e->getJsonBody();
		  	// $err  = $body['error'];
		  	// $error['code'] = $err['code'];
		  	// $error['message'] = $err['message'];
		  	// Session::put('error', $error);
		  	$this->errorHandler($e);

		}
		catch (RateLimit $e)
		{
			$error['code'] = 'Errore generico';
			$error['message'] = "Ci scusiamo enormemente, i dati da Lei forniti sono esatti, ma il processo di pagamento non è andato a termine.";				
			
			$arr['body'] = 'RateLimit Exception. Too many requests made to the API too quickly'; 
	        
	        $this->debugPayment($arr);

		  	Session::put('error', $error);

		} 
		catch (InvalidRequest $e)
		{

			$error['code'] = 'Errore generico';
			$error['message'] = "Ci scusiamo enormemente, i dati da Lei forniti sono esatti, ma il processo di pagamento non è andato a termine.";	
			
		    $arr['body'] = "InvalidRequest Exception. Invalid parameters were supplied to Stripe's API";
	        
	        $this->debugPayment($arr);

		  	Session::put('error', $error);

		} 
		catch (Authentication $e)
		{

			$error['code'] = 'Errore generico';
			$error['message'] = "Ci scusiamo enormemente, i dati da Lei forniti sono esatti, ma il processo di pagamento non è andato a termine.";	
			
		  	$arr['body'] = "Authentication Exception. Authentication with Stripe's API failed (maybe you changed API keys recently)";
	        
	        $this->debugPayment($arr);

		  	Session::put('error', $error);

		} 
		catch (ApiConnection $e)
		{
			$error['code'] = 'Errore generico';
			$error['message'] = "Ci scusiamo enormemente, i dati da Lei forniti sono esatti, ma il processo di pagamento non è andato a termine.";	
			
		  	$arr['body'] = "ApiConnection Exception. Network communication with Stripe failed";
	        
	        $this->debugPayment($arr);

		  	Session::put('error', $error);

		}
		catch(Base $e)
		{
			$this->errorHandler($e);
		}
        catch (Exception $e) 
        {
        	$error['code'] = 'Errore generico';
			$error['message'] = "Ci scusiamo enormemente, i dati da Lei forniti sono esatti, ma il processo di pagamento non è andato a termine.";	
			
		  	$arr['body'] = "Other Exception. Probably due to server problem";
	        
	        $this->debugPayment($arr);

		  	Session::put('error', $error);

		}

	}

	public function errorHandler($e)
	{	
		$error = [];
		if ( $e->jsonBody['error']['type'] == 'card_error' )
		{
			$code = $e->jsonBody['error']['code'];

			if ( $code == 'card_declined' )
			{
				$error['code'] = 'Carta Rifiutata';
				$error['message'] = 'La carta è stata rifiutata dal nostro sistema di elaborazione.';
			}
			elseif ( $code == 'invalid_number' )
			{
				$error['code'] = 'Numero della Carta Invalido';
				$error['message'] = 'Il numero della carta sembra invalido.';
			}
			elseif ( $code == 'invalid_expiry_month' )
			{
				$error['code'] = 'Mese di Scadenza Invalido';
				$error['message'] = 'Il mese di scadenza della carta non è valido';
			}
			elseif ( $code == 'invalid_expiry_year' )
			{
				$error['code'] = 'Anno di Scadenza Invalido';
				$error['message'] = "L'anno di scadenza della carta non è valido";
			}
			elseif ( $code == 'invalid_cvc' )
			{
				$error['code'] = 'CVC invalido';
				$error['message'] = "Il codice CVC sembra invalido";
			}
			elseif ( $code == 'incorrect_number' )
			{
				$error['code'] = 'Numero non corretto';
				$error['message'] = "Il numero della carta fornito non è corretto";
			}
			elseif ( $code == 'incorrect_cvc' )
			{
				$error['code'] = 'CVC non corretto';
				$error['message'] = "Il codice CVC non è corretto";
			}
			elseif ( $code == 'incorrect_zip' )
			{
				$error['code'] = 'CAP non corretto';
				$error['message'] = "Il codice di aviamento postale fornitoci non corrisponde a quello registrato con la carta";				
			}
			elseif ( $code == 'expired_card' )
			{
				$error['code'] = 'Carta Scaduta';
				$error['message'] = "Ci sembra che la tua carta sia scaduta. Sei sicuro dei dati che hai inserito?";				
			}
			else
			{
				$error['code'] = 'Errore generico';
				$error['message'] = "Ci scusiamo enormemente, i dati da Lei forniti sono esatti, ma il processo di pagamento non è andato a termine. ";
				
  				$body = $e->getJsonBody();
				$arr['body'] = $body['error']['message'];

		        $this->debugPayment($arr);

			}
		}
		else
		{
			$error['code'] = 'Errore generico';
			$error['message'] = "Ci scusiamo enormemente, i dati da Lei forniti sono esatti, ma il processo di pagamento non è andato a termine. ";
			
			$arr['body'] = "ELSE";


	        $this->debugPayment($arr);

		}

		  	Session::put('error', $error);
	}


	public function debugPayment($arr)
	{

		Mail::send('emails.error', $arr, function ($message)
        {
            $message->to( "giacomo.gasperini@gmail.com" );
            $message->subject("Associazione Tagliata Payment Exception");
        });


	}


}
