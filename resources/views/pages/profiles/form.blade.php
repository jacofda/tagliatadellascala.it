<div class="pt-10 from-group col-sm-6{{$errors->has('nome') ? ' input-danger' : '' }}">
    <label>Nome:</label>
    {!! Form::text('nome', null, ['placeholder' => 'Nome', 'class' => 'input-md round form-control']) !!}
    @if ($errors->has('nome'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('nome') }}</strong>
        </span>
    @endif
</div>
<div class="pt-10 from-group col-sm-6{{$errors->has('cognome') ? ' input-danger' : '' }}">
    <label>Nome:</label>
    {!! Form::text('cognome', null, ['placeholder' => 'Cognome', 'class' => 'input-md round form-control']) !!}
    @if ($errors->has('cognome'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('cognome') }}</strong>
        </span>
    @endif
</div>

<div class="pt-10 from-group col-sm-6{{$errors->has('email') ? ' input-danger' : '' }}">
    <label>Email:</label>
    {!! Form::text('email', \Auth::user()->email, ['placeholder' => 'Email', 'class' => 'input-md round form-control']) !!}
    @if ($errors->has('email'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="pt-10 from-group col-sm-6{{$errors->has('telefono') ? ' input-danger' : '' }}">
    <label>Telefono:</label>
    {!! Form::text('telefono', null, ['placeholder' => 'telefono', 'class' => 'input-md round form-control']) !!}
    @if ($errors->has('telefono'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('telefono') }}</strong>
        </span>
    @endif
</div>

<div class="clearfix"></div>
<br>

<hr>
<div class="col-sm-8 col-sm-offset-2">
    <input class="submit_btn btn btn-mod btn-medium btn-round btn-full" type="submit" value="{{$submitButtonText}}">
</div>
