@extends('layouts.onlyme')


@section('content')

<h1>User Status Config</h1>
<hr>
<div class="row">
<div class="col-sm-6">
	{!! Form::open(['method'=>'POST', 'action'=>'StatusController@store']) !!}
		<div class="form-group">
			{!! Form::label('id', 'ID: ') !!}
			{!! Form::text('id', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('name', 'User Status: ') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Create Status', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
</div>

<div class="col-sm-6">
	@if($statuses)
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>User Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($statuses as $status)
				<tr>
					<td>{{$status->id}}</td>
					<td><a href="{{route('status.edit', $status->id)}}">{{$status->name}}</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
  	@endif
</div>
</div>

@stop