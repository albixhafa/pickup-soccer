@extends('layouts.onlyme')


@section('content')
<br>
<center><h1>All Users</h1></center>
<br>

	{{--  @if(Session::has('userchanges'))
		<p class="bg-danger">{{session('userchanges')}}</p>
	@endif  --}}

	<table class="table">
	<thead>
	  <tr>
		<th>ID</th>
		<th>Edit User</th>
		<th>Gender</th>
		<th>Role</th>
		<th>Status</th>
		<th>E-Mail</th>
		<th>Created</th>
		<th>Updated</th>
	  </tr>
	</thead>
	<tbody>
	@if($users)
		@foreach($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td><a href="{{route('users.edit', $user->id)}}">{{$user->username}}</a></td>
				<td>{{$user->gender->name}}</td>
				<td>{{$user->role->name}}</td>
				<td>{{$user->status->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->created_at}}</td>
				<td>{{$user->updated_at}}</td>
			</tr>
		@endforeach
	@endif
	</tbody>
  </table>

@stop