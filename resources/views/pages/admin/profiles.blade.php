@extends('layouts.admin')

@section('title')
    Profili
@stop

@section('content')
	<div class="clearfix"></div>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Data Iscrizione</th>
					<th>Email</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($profiles as $profile)
					<tr>
						<td>{{$profile->full_name}}</td>
						<td>{{$profile->created_at->format('d/m/Y')}}</td>
						<td>{{$profile->user->email}}</td>
						<td>
	                        {!!Form::open([ 'method'  => 'delete', 'url' => url('profilo/'.$profile->id) ]) !!}
	                            <button class="btn btn-danger btn-xs" type="submit">Elimina</button>
	                            <a class="btn btn-success btn-xs" href="{{url('profilo/'.$profile->id)}}">Vedi</a>
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
            {{ $profiles->links() }}
        </div>
    </div>

@stop
