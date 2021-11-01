@extends('layouts.onlyme')


@section('content')

<h1>Edit Number of Teams</h1>
<hr>
<div class="row">
	<div class="col-sm-6">
		{!! Form::model($team, ['method'=>'PATCH', 'action'=>['TeamController@update', $team->id]]) !!}
			<div class="form-group">
				{!! Form::label('id', 'ID: ') !!}
				{!! Form::text('id', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('numberofteams', 'Number of Teams: ') !!}
				{!! Form::text('numberofteams', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Update', ['class'=>'btn btn-primary col-sm-3 pull-left']) !!}
			</div>
		{!! Form::close() !!}

		{!! Form::open(['method'=>'DELETE', 'action'=>['TeamController@destroy', $team->id]]) !!}
		<div class="form-group">
			{!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-3 pull-left']) !!}
		</div>
		{!! Form::close() !!}
	</div>

	<div class="col-sm-6">
	</div>
	
</div>

@stop