@extends('layouts.admin')

@section('title')
    Gallerie
@stop

@section('content')
	<div class="clearfix"></div>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Titolo</th>
					<th>Settore</th>
					<th>Azioni</th>
				</tr>
			</thead>
			<tbody>
				@foreach($galleries as $gallery)
					<tr>
						<td>{{$gallery->name}}</td>
						<td>{{$gallery->sectors()->first()->name}}</td>
						<td>
	                        {!!Form::open([ 'method'  => 'delete', 'url' => url('gallerie/'.$gallery->slug) ]) !!}
	                            <button class="btn btn-danger btn-xs" type="submit">Elimina</button>
	                            <a class="btn btn-primary btn-xs" href="{{url('gallerie/'.$gallery->id.'/edit')}}">Modifica</a>
	                            <a class="btn btn-warning btn-xs" href="{{url('admin/gallerie/'.$gallery->id.'/media')}}">Immagini</a>
	                            <a class="btn btn-success btn-xs" href="{{$gallery->url}}">Vedi</a>
	                        {!!Form::close()!!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="clearfix"></div>

    <div class="row">
        <div class="text-center">
            {{ $galleries->links() }}
        </div>
    </div>

@stop
