<div class="form-group col-sm-8{{$errors->has('name') ? ' input-danger' : '' }}">
    <label>Titolo:</label>
    {!! Form::text('name', null, ['placeholder' => 'Concerto musica classica', 'class' => 'form-control']) !!}
    @if ($errors->has('name'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-sm-4{{$errors->has('categories') ? ' input-danger' : '' }}">
    <label>Categoria:</label>
    <div class="select-option">
        <select name="categories[]" class="category form-control" multiple="multiple">
            <option></option>
            @foreach($tags as $id => $name)
                @if( in_array($id, $selected) )
                    <option selected value="{{$id}}">{{$name}}</option>
                @else
                    <option value="{{$id}}">{{$name}}</option>
                @endif    
            @endforeach
        </select>
    </div>
    @if ($errors->has('categories'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('categories') }}</strong>
        </span>
    @endif
</div>



<div class="form-group col-sm-8{{$errors->has('location') ? ' input-danger' : '' }}">
    <label>Indirizzo:</label>
    {!! Form::text('location', null, ['placeholder' => 'Sede o esterno', 'class' => 'form-control']) !!}
    @if ($errors->has('location'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('location') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-sm-4{{$errors->has('sectors') ? ' input-danger' : '' }}">
    <label>Settore:</label>
    <div class="select-option">
        <select name="sectors[]" class="sector form-control" multiple="multiple">
            <option></option>
            @foreach($sectors as $id => $name)
                @if( in_array($id, $sector) )
                    <option selected value="{{$id}}">{{$name}}</option>
                @else
                    <option value="{{$id}}">{{$name}}</option>
                @endif    
            @endforeach
        </select>
    </div>
    @if ($errors->has('sectors'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('sectors') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-sm-6{{$errors->has('start') ? ' input-danger' : '' }}">
    <label>Data Inizio:</label>
     <input id="date-start" class="form-control" name="start" type="text" value="{{ isset($event->start) ? $event->start->format('d/m/Y H:i') : date('d/m/Y H:i')}}">
    @if ($errors->has('start'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('start') }}</strong>
        </span>
    @endif
</div>
<div class="form-group col-sm-6{{$errors->has('finish') ? ' input-danger' : '' }}">
    <label>Data Fine:</label>
    <input id="date-finish" class="form-control" name="finish" type="text" value="{{ isset($event->finish) ? $event->finish->format('d/m/Y H:i') : date('d/m/Y H:i')}}">
    @if ($errors->has('finish'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('finish') }}</strong>
        </span>
    @endif
</div>


<div class="form-group col-sm-12{{$errors->has('price') ? ' input-danger' : '' }}">
    <label>Costo Biglietto</label>
    <input class="form-control" name="price" type="number" value="{{ isset($event->price) ? $event->price : old('price')}}">
    @if ($errors->has('price'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('price') }}</strong>
        </span>
    @endif
    <p class="info">I prezzo va indicato in CENTESIMI. 5euro = 500. Lascia vuoto se non vuoi l'acquisto online.</p> 
</div>

<div class="form-group col-sm-12{{$errors->has('price_reduced') ? ' input-danger' : '' }}">
    <label>Costo Biglietto Ridotto</label>
    <input class="form-control" name="price_reduced" type="number" value="{{ isset($event->price_reduced) ? $event->price_reduced : old('price_reduced') }}">
    @if ($errors->has('price_reduced'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('price_reduced') }}</strong>
        </span>
    @endif
    <p class="info">I prezzo va indicato in CENTESIMI. 5euro = 500. Lascia vuoto se non vuoi l'acquisto online.</p> 
</div>

<div class="form-group col-sm-12{{$errors->has('ticket_availability') ? ' input-danger' : '' }}">
    <label>Biglietti disponibili</label>
    <input class="form-control" name="ticket_availability" type="number" value="{{ isset($event->ticket_availability) ? $event->ticket_availability : old('ticket_availability') }}">
    @if ($errors->has('ticket_availability'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('ticket_availability') }}</strong>
        </span>
    @endif
    <p class="info">Lascia vuoto se non vuoi l'acquisto online.</p> 
</div>

<div class="form-group col-sm-12{{$errors->has('description') ? ' input-danger' : '' }}">
    <label>Descrizione:</label>
    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'summernote']) !!}
    @if ($errors->has('description'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>

<div class="clearfix"></div>
<br>

<hr>
<div class="col-sm-8 col-sm-offset-2">
    <input class="btn btn-primary" type="submit" value="{{$submitButtonText}}">
</div>


@section('scripts')
<script>

    (function (){

        $(".category").select2({placeholder:"almeno una categoria"});
        $(".sector").select2({placeholder:"almeno un settore"});

        $('#date-start').datetimepicker({
            locale: 'it'
        });
        $('#date-finish').datetimepicker({
            locale: 'it'
        });
        $('#summernote').summernote({lang: 'it-IT', minHeight: 300});

    })(jQuery);   
</script>
@stop