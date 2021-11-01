@extends('layouts.onlyme')


@section('content')

<h1>Number of Teams Config</h1>
<hr>
<div class="row">
<div class="col-sm-6">
	{!! Form::open(['method'=>'POST', 'action'=>'TeamController@store']) !!}
		<div class="form-group">
			{!! Form::label('id', 'ID: ') !!}
			{!! Form::text('id', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('numberofteams', 'Number of Teams: ') !!}
			{!! Form::text('numberofteams', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Create Team', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
</div>

<div class="col-sm-6">
	@if($teams)
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Number of Teams</th>
			</tr>
		</thead>
		<tbody>
			@foreach($teams as $team)
				<tr>
					<td>{{$team->id}}</td>
					<td><a href="{{route('teams.edit', $team->id)}}">{{$team->numberofteams}}</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
  	@endif
</div>
</div>

@stop