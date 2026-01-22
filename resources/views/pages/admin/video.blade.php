@extends('layouts.admin')

@section('title')
    Video
@stop

@section('content')
	<div class="clearfix"></div>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Descrizione</th>
					<th>Azioni</th>
				</tr>
			</thead>
			<tbody>
				@foreach($videos as $video)
					<tr>
						<td>{{$video->name}}</td>
						<td>{{$video->centocinquanta}}</td>
						<td>
	                        {!!Form::open([ 'method'  => 'delete', 'url' => url('video/'.$video->slug) ]) !!}
	                            <button class="btn btn-danger btn-xs" type="submit">Elimina</button>
	                            <a class="btn btn-primary btn-xs" href="{{url('video/'.$video->id.'/edit')}}">Modifica</a>
	                            <a class="btn btn-success btn-xs" href="{{$video->url}}">Vedi</a>
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
            {{ $videos->links() }}
        </div>
    </div>

@stop
