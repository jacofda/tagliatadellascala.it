@extends('layouts.admin')

@section('title')
    Eventi
@stop

@section('content')
	<div class="clearfix"></div>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Titolo</th>
					<th>Settore</th>
					<th>Data Inizio</th>
					<th>Azioni</th>
				</tr>
			</thead>
			<tbody>
				@foreach($events as $event)
					<tr>
						<td>{{$event->name}}</td>
						<td>{{$event->sectors()->first()->name}}</td>
						<td>{{$event->start}}</td>
						<td>
	                        {!!Form::open([ 'method'  => 'delete', 'url' => url('eventi/'.$event->slug) ]) !!}
	                            <button class="btn btn-danger btn-xs" type="submit">Elimina</button>
	                            <a class="btn btn-primary btn-xs" href="{{url('eventi/'.$event->id.'/edit')}}">Modifica</a>
	                            <a class="btn btn-warning btn-xs" href="{{url('admin/eventi/'.$event->id.'/media')}}">Immagini</a>
	                            <a class="btn btn-success btn-xs" href="{{$event->url}}">Vedi</a>
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
            {{ $events->links() }}
        </div>
    </div>

@stop
