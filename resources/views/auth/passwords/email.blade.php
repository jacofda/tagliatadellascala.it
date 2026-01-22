@extends('layouts.app')


@section('meta')
<title>Invia link per password reset</title>
@endsection


@section('title')

<section class="small-section bg-dark-alfa-90">
    <div class="relative container align-left">
        
        <div class="row">
            
            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Reset Password</h1>
                <h2 class="hs-line-4 font-alt">Scrivi la tua email per il password reset</h2>
            </div>
            
            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs font-alt align-right">
                    <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;<span>Reset Password</span>
                </div>
                
            </div>
        </div>
        
    </div>
</section>

@endsection


@section('content')
    <div class="container relative">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">



                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form  class="form contact-form" id="contact_form" role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="input-md round form-control" placeholder="la tua email" name="email" required="" value="{{ old('email') }}" >
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    
                    <div class="form-group">
                        <div class="pt-10">
                                <button type="submit" class="submit_btn btn btn-mod btn-small btn-round float" id="login-btn">Spedisci a questa email <br> un link per resettare la password</button>
                        </div> 
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection

