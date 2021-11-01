@extends('layouts.onlyme')


@section('content')

<h1>User Roles Config</h1>
<hr>
<div class="row">
<div class="col-sm-6">
	{!! Form::open(['method'=>'POST', 'action'=>'RoleController@store']) !!}
		<div class="form-group">
			{!! Form::label('id', 'ID: ') !!}
			{!! Form::text('id', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('name', 'User Role: ') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Create Role', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
</div>

<div class="col-sm-6">
	@if($roles)
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>User Role</th>
			</tr>
		</thead>
		<tbody>
			@foreach($roles as $role)
				<tr>
					<td>{{$role->id}}</td>
					<td><a href="{{route('roles.edit', $role->id)}}">{{$role->name}}</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
  	@endif
</div>
</div>

@stop