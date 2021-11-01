@extends('layouts.onlyme')


@section('content')

<h1>Edit User Status</h1>
<hr>
<div class="row">
	<div class="col-sm-6">
		{!! Form::model($status, ['method'=>'PATCH', 'action'=>['StatusController@update', $status->id]]) !!}
			<div class="form-group">
				{!! Form::label('id', 'ID: ') !!}
				{!! Form::text('id', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('name', 'User Status: ') !!}
				{!! Form::text('name', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Update', ['class'=>'btn btn-primary col-sm-3 pull-left']) !!}
			</div>
		{!! Form::close() !!}

		{!! Form::open(['method'=>'DELETE', 'action'=>['StatusController@destroy', $status->id]]) !!}
		<div class="form-group">
			{!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-3 pull-left']) !!}
		</div>
		{!! Form::close() !!}
	</div>

	<div class="col-sm-6">
	</div>
	
</div>

@stop