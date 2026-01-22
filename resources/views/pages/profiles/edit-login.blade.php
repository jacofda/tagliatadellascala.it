@extends('layouts.app')

@section('meta') 
<title>Modifica email e password</title>
@endsection


@section('title')

<section class="page-section bg-dark-alfa-90">
    <div class="relative container align-left">
        
        <div class="row">
            
            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Modifica dati Utente</h1>
                <h2 class="hs-line-4 font-alt">Qui potrai modificare/cambiare email e password</h2>
            </div>
            
            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs font-alt align-right">
                    <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
                    <a href="{{url('profilo/'.$user->profile->id)}}">Profilo</a>&nbsp;/&nbsp;
                    <span>Modifica dati account</span>
                </div>
                
            </div>
        </div>
        
    </div>
</section>

@endsection


@section('content')
    <section class="page-section">
        <div class="container relative">

			{!! Form::model($user, ['method' => 'PATCH', 'url' => 'user/' . $user->id, 'class' =>'form']) !!}
				
				<div class="row">
					<div class="col-md-5 col-md-offset-3">
		                <div class="mb-20 mb-md-10">
		                    <!-- Email -->
		                    <input type="email" name="email" id="email" class="input-md form-control" value="{{ $user->email }}" placeholder="Email" maxlength="155">
		                </div>    
		                
		                <div class="mb-20 mb-md-10">
		                    <!-- Password -->
		                    <input type="password" name="password" id="password" class="input-md form-control" placeholder="Password" maxlength="100">
		                </div>

		                <div class="mb-20 mb-md-10">
		                    <!-- Password -->
		                    <input type="password" name="password_confirmation" id="password" class="input-md form-control" placeholder="Password" maxlength="100">
		                </div>
						
						<div class="mb-10 center">
	                        <a class="btn btn-mod btn-border btn-small btn-round" href="{{url('profilo/'.$user->profile->id)}}">Indietro</a>
	                        <input class="btn btn-mod btn-border btn-small btn-round" type="submit" value="Aggiorna"> 
	                    </div>

	                    
					    @if ($errors->has('password'))
					    	<div class="alert error"><span class="help-block"><strong style="color:#f9f9f9">* password non combaciano</strong></span></div>
					    @endif	 
					    @if ($errors->has('email'))
					    	<div class="alert error"><span class="help-block"><strong style="color:#f9f9f9">* email già in uso o invalida </strong></span></div>
					    @endif	

					</div>
				</div>


			{!! Form::close() !!}

		</div>
	</section>
@endsection