@extends('layouts.onlyme')


@section('content')

<h1>Team Genders Config</h1>
<hr>
<div class="row">
<div class="col-sm-6">
	{!! Form::open(['method'=>'POST', 'action'=>'TeamGenderController@store']) !!}
		<div class="form-group">
			{!! Form::label('id', 'ID: ') !!}
			{!! Form::text('id', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('name', 'Team Gender: ') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Create Team Gender', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
</div>

<div class="col-sm-6">
	@if($teamgenders)
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Team Gender</th>
			</tr>
		</thead>
		<tbody>
			@foreach($teamgenders as $teamgender)
				<tr>
					<td>{{$teamgender->id}}</td>
					<td><a href="{{route('teamgenders.edit', $teamgender->id)}}">{{$teamgender->name}}</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
  	@endif
</div>
</div>

@stop