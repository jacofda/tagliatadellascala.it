@extends('layouts.admin')

@section('title')
    Tags
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
				@foreach($tags as $tag)
					<tr>
						<td>{{$tag->name}}</td>
						<td>{{$tag->description}}</td>
						<td>
	                        {!!Form::open([ 'method'  => 'delete', 'url' => url('tags/'.$tag->slug) ]) !!}
	                            <button class="btn btn-danger btn-xs" type="submit">Elimina</button>
	                            <a class="btn btn-primary btn-xs" href="{{url('tags/'.$tag->id.'/edit')}}">Modifica</a>
	                            <a class="btn btn-success btn-xs" href="{{$tag->url}}">Vedi</a>
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
            {{ $tags->links() }}
        </div>
    </div>

@stop
