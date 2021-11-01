@extends('layouts.onlyme')


@section('content')

<h1>Edit User Role</h1>
<hr>
<div class="row">
	<div class="col-sm-6">
		{!! Form::model($role, ['method'=>'PATCH', 'action'=>['RoleController@update', $role->id]]) !!}
			<div class="form-group">
				{!! Form::label('id', 'ID: ') !!}
				{!! Form::text('id', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('name', 'Role: ') !!}
				{!! Form::text('name', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Update', ['class'=>'btn btn-primary col-sm-3 pull-left']) !!}
			</div>
		{!! Form::close() !!}

		{!! Form::open(['method'=>'DELETE', 'action'=>['RoleController@destroy', $role->id]]) !!}
		<div class="form-group">
			{!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-3 pull-left']) !!}
		</div>
		{!! Form::close() !!}
	</div>

	<div class="col-sm-6">
	</div>
	
</div>

@stop