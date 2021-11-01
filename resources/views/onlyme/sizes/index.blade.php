@extends('layouts.onlyme')


@section('content')

<h1>Team Sizes Config</h1>
<hr>
<div class="row">
<div class="col-sm-6">
	{!! Form::open(['method'=>'POST', 'action'=>'SizeController@store']) !!}
		<div class="form-group">
			{!! Form::label('id', 'ID: ') !!}
			{!! Form::text('id', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('teamsize', 'Size: ') !!}
			{!! Form::text('teamsize', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Create Status', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
</div>

<div class="col-sm-6">
	@if($sizes)
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Size</th>
			</tr>
		</thead>
		<tbody>
			@foreach($sizes as $size)
				<tr>
					<td>{{$size->id}}</td>
					<td><a href="{{route('sizes.edit', $size->id)}}">{{$size->teamsize}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
  	@endif
</div>
</div>

@stop