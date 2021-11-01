@extends('layouts.onlyme')

@section('content')
<br>
<center><h1>All Posts</h1></center>
<br>

<br>

<table class="table">
	<thead>
	  <tr>
	  		<th>Post ID</th>
	  		<th>Organizer</th>
			<th>Location</th>
			<th>Date & Time</th>
			<th>Format</th>
			<th># Teams</th>
			<th>Team Size</th>
			<th>Notes</th>
			<th>Gender</th>
			<th>Link</th>
			<th>Delete?</th>
	  </tr>
	</thead>
	<tbody>  
		@if($posts)
			@foreach($posts as $post)
				<tr>
					<td>{{$post->id}}</td>
					<td>{{$post->user->username}}</td>
					<td>{{$post->formatted_address}}</td>
					<td>{{$post->time}}</td>
					<td>{{$post->format->name}}</td>
					<td>{{$post->teamNumber->numberofteams}}</td>
					<td>{{$post->size->teamsize}}</td>
					<td>{{$post->teamGender->name}}</td>
					<td>{{$post->note}}</td>
					<td><a href="item/{{$post->id}}">Click Here</a></td>
					<td>		
					{!! Form::open(['method'=>'DELETE', 'action'=>['PostController@destroy', $post->id]]) !!}
						<div class="form-group">
							{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
						</div>
					{!! Form::close() !!}</td>	
				</tr>
			@endforeach
		@endif
	</tbody>
  </table>
	{{--  {{ $posts->links('vendor.pagination.bootstrap-4') }}  --}}

@stop