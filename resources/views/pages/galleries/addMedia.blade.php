@extends('layouts.admin')

@section('title')
   Aggiungi Media
@stop

@section('content')

    <div class="col-md-10 col-md-offset-1"> 
        <form action="{{url('admin/media/add')}}" class="dropzone" id="dropzoneForm">
            {{ csrf_field() }}

            <div class="row">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </div>

        </form> 
    </div>
    
    <div class="clearfix"></div>
    <div class="myline"></div>

    @if($gallery->media()->exists())
    <div class="col-sm-12 ">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td>Descrizione</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gallery->media as $file)
                        <tr id="file{{$file->id}}">
                            <td>
                                <form method="POST" action="{{url('admin/media/update')}}"}}" class="relative updateDesc">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$file->id}}">
                                    <input class="form-control" style="margin-bottom: 0;" type="text" name="description"  value="{{$file->description}}" />
                                    <button class="btn btn-primary save-btn" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span></button>
                                </form>
                            </td>
                            <td style="text-align: center;">
                                @if($file->mime == 'image')
                                    <a class="image-popup" href="{{ asset('storage/galleries/full/'.$file->filename)}}" >
                                        <img class="max100" src="{{ asset('storage/galleries/display/'.$file->filename)}}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                <form method="POST" action="{{url('admin/media/delete')}}" class="deleteMedia">
                                    {{csrf_field()}}
                                    <input type="hidden" name="directory" value="galleries">
                                    <input type="hidden" name="id" value="{{$file->id}}">
                                    <button class="btn btn-sm btn-danger" type="submit">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <div class="clearfix"></div>
    <div class="myline"></div>

    <div class="text-center mt40">
        <a class="btn btn-primary" href="{{url('admin/gallerie')}}">Torna Alle Gallerie</a><a class="btn btn-primary" href="{{$gallery->url}}">Vedi Galleria</a>
    </div>

@stop

@section('scripts')
<script>
    
        Dropzone.options.dropzoneForm = {
            paramName: "file",
            maxFilesize: 10,
            dictDefaultMessage: "<strong>Clicca per caricare i files. (jpg, png, pdf, doc, xls, etc ...)</strong>",
            sending: function(file, xhr, formData) {
                formData.append("mediable_id", "{{$gallery->id}}");
                formData.append("mediable_type", "App\\Gallery");
                formData.append("directory", "galleries");
            },
            init: function () {
                this.on('queuecomplete', function () {
                   location.reload();
                });
            },
        };

    $('.image-popup').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }
    });

    $(".updateDesc").submit( function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        $.post( url, data, function(response) {
            $(this).find('input[name="description"]').val(response);
        });
    });

    $(".deleteMedia").submit( function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        var id = $(this).find('input[name="id"]').val();
        $.post( url, data, function(response) {
            if(response == "done")
            {
                $('table tr#file'+id).hide('400');
            }
        });
    });


</script>
@stop