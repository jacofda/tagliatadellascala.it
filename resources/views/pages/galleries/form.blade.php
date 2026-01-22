<div class="form-group col-sm-12{{$errors->has('name') ? ' input-danger' : '' }}">
    <label>Titolo:</label>
    {!! Form::text('name', null, ['placeholder' => 'Galleria Immagini Scala dei Sapori 2018', 'class' => 'form-control']) !!}
    @if ($errors->has('name'))
        <span class="error">
            <strong class="color-danger">{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-sm-6{{$errors->has('categories') ? ' input-danger' : '' }}">
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


<div class="form-group col-sm-6{{$errors->has('sectors') ? ' input-danger' : '' }}">
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
        $('#summernote').summernote({lang: 'it-IT', minHeight: 300});
    })(jQuery);   
</script>
@stop