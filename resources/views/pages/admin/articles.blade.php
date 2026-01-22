@extends('layouts.admin')

@section('title')
    Articoli
@stop

@section('content')
	<div class="clearfix"></div>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Titolo</th>
					<th>Settore</th>
                    <th>Data</th>
					<th>Azioni</th>
				</tr>
			</thead>
			<tbody>
				@foreach($articles as $article)
					<tr>
						<td>{{$article->name}}</td>
						<td>{{$article->sectors()->first()->name}}</td>
                        <td>{{$article->created_at->format('m/Y')}}</td>
						<td>
	                        {!!Form::open([ 'method'  => 'delete', 'url' => url('articoli/'.$article->slug) ]) !!}
	                            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
	                            <a class="btn btn-primary btn-xs" href="{{url('articoli/'.$article->id.'/edit')}}"><i class="fa fa-edit"></i></a>
	                            <a class="btn btn-warning btn-xs" href="{{url('admin/articoli/'.$article->id.'/media')}}"><i class="fa fa-image"></i></a>
	                            <a class="btn btn-success btn-xs" href="{{$article->url}}"><i class="fa fa-eye"></i></a>
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
            {{ $articles->links() }}
        </div>
    </div>

@stop
