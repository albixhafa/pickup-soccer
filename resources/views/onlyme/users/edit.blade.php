@extends('layouts.onlyme')

@section('content')

<h1>Edit User</h1>
<hr>

<div class="row">
	<div class="col-sm-3">
		<img src="{{$user->photo ? $user->photo->path : 'http://via.placeholder.com/350x350'}}" alt="" class="img-fluid">
	</div>

	<div class="col-sm-9">

	{!! Form::model($user, ['method'=>'PATCH', 'action'=>['UserController@update', $user->id], 'files'=>true]) !!}

		<div class="form-group">
			{!! Form::label('username', 'Username: ') !!}
			{!! Form::text('username', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'E-mail / Usernam: ') !!}
			{!! Form::email('email', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password: ') !!}
			{!! Form::password('password', ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('role_id', 'Role: ') !!}
			{!! Form::select('role_id', $role, null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('status_id', 'Status: ') !!}
			{!! Form::select('status_id', $status, null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('gender_id', 'Gender: ') !!}
			{!! Form::select('gender_id', $gender, null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('photo_id', 'Profile Photo: ') !!}
			{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Update', ['class'=>'btn btn-primary col-sm-2 pull-left']) !!}
		</div>
		{!! Form::close() !!}

		{!! Form::open(['method'=>'DELETE', 'action'=>['UserController@destroy', $user->id]]) !!}
			<div class="form-group">
				{!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-2']) !!}
			</div>
		{!! Form::close() !!}
	</div>
</div>

<br>

<div class="row">
	<div class="col-sm-3">		
	</div>
	<div class="col-sm-9">
		@include('includes.errors')
	</div>
</div>


@stop