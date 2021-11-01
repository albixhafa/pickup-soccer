@extends('layouts.onlyme')


@section('content')

<h1>Gender Config</h1>
<hr>
<div class="row">
<div class="col-sm-6">
	{!! Form::open(['method'=>'POST', 'action'=>'GenderController@store']) !!}
		<div class="form-group">
			{!! Form::label('id', 'ID: ') !!}
			{!! Form::text('id', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('name', 'Gender: ') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Create Gender', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
</div>

<div class="col-sm-6">
	@if($genders)
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Gender</th>
			</tr>
		</thead>
		<tbody>
			@foreach($genders as $gender)
				<tr>
					<td>{{$gender->id}}</td>
					<td><a href="{{route('genders.edit', $gender->id)}}">{{$gender->name}}</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
  	@endif
</div>
</div>

@stop