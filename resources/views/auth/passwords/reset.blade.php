@extends('layouts.app')


@section('meta')
<title>Reset Password</title>
@endsection


@section('title')

<section class="small-section bg-dark-alfa-90">
    <div class="relative container align-left">
        
        <div class="row">
            
            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Reset Password</h1>
                <h2 class="hs-line-4 font-alt">Scrivi una nuova password</h2>
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

                <form  class="form contact-form" id="contact_form" role="form" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="input-md round form-control" placeholder="la tua email" name="email" required="" value="{{ old('email') }}" >
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="input-md round form-control" name="password" placeholder="Password" required="">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input id="password-confirm" type="password" class="input-md round form-control" name="password_confirmation" placeholder="Password" required="">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <div class="align-right pt-10 ab-right">
                                <button type="submit" class="submit_btn btn btn-mod btn-small btn-round float" id="login-btn">Login</button>
                        </div> 
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
