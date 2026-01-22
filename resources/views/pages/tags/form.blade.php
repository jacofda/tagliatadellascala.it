<div class="form-group col-sm-12{{$errors->has('name') ? ' input-danger' : '' }}">
    <span>Nome:</span>
    {!! Form::text('name', null, ['placeholder' => 'Proloco Cismon', 'class' => 'form-control']) !!}
    @if ($errors->has('name'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>



<div class="form-group col-sm-12{{$errors->has('description') ? ' input-danger' : '' }}">
	{!! Form::textarea('description', null, ['placeholder' => 'Descrizione ...', 'row' => '4', 'class' => 'form-control']) !!}
    @if ($errors->has('description'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('description') }}</strong>
        </span>
    @endif	
</div>

<div class="col-sm-8 col-sm-offset-2">
    <input class="btn btn-primary" type="submit" value="{{$submitButtonText}}">
</div>