@extends('layouts.main')
@section('content')

<div class="row">
	<div class="col-md-12">
          <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCHxRb6dudEmAaydcc8FS54Lw-KVGiAGdE&q={{$post->lat}},{{$post->lng}}" width="100%" height="200" frameborder="0" style="border:0" class="roundedcorners"></iframe>
	</div>
</div>
<h3><b>Details : </b></h3>
<hr/>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"><b>Date & Time : </b>{{ Carbon\Carbon::parse($post->time)->toDayDateTimeString() }}</b></h3>
			</div>
			<ul class="list-group">
				<li class="list-group-item"><b>Organizer : </b> {{$post->user->username}}</li>
				<li class="list-group-item"><b>Location : </b> <a href="http://google.com/maps/place/{{$post->lat}},{{$post->lng}}">Click Here</a></li>
				<li class="list-group-item"><b>Number of Teams : </b> {{$post->teamNumber->numberofteams}}</li>
				<li class="list-group-item"><b>Team Size : </b> {{$post->size->versus}}</li>
				<li class="list-group-item"><b>Game Format : </b> {{$post->format->name}}</li>
				<li class="list-group-item"><b>Gender Group : </b>{{$post->teamGender->name}}</li>
				<li class="list-group-item"><b>Game Notes : </b> {{$post->note}}</li>
			</ul>
		</div>
	</div>
</div>
<h3><b>Joined Players ( {{App\Player::where('post_id', $post->id)->count()}} )</b></h3>
<hr>
<div class="row">
	<div class="col-md-6">
		{!! Form::open(['method'=>'POST', 'action'=>['MainpageController@play', $post->id]]) !!}
		{!! Form::submit('Join', ['class'=>'btn btn-lg btn-block btn-success']) !!}
		{!! Form::close() !!}
	</div>
	<div class="col-md-6">
		{!! Form::open(['method'=>'POST', 'action'=>['MainpageController@unplay', $post->id]]) !!}
		{!! Form::submit('Unjoin', ['class'=>'btn btn-lg btn-block btn-danger']) !!}
		{!! Form::close() !!}
	</div>

	<div class="col-md-12">
	<br>
		@if($players)
			@foreach($players as $player)
				<span>
					<img class="img-circle" width="40" height="40" src="{{$player->user->photo ? $player->user->photo->path : 'https://pickupsoccer.net/images/user.png'}}" alt="">
					{{$player->user ? $player->user->username : 'inactive user'}}
				</span>
				<br>
				<br>
			@endforeach
		@endif
	</div>
</div>


<div class="row">
	<div class="col-md-12">
		<div>
			<hr>
			<h3><b>Send Message</b></h3>
			{!! Form::open(['method'=>'POST', 'action'=>'UserCommentController@store']) !!}
				<div class="form-group">
					{!! Form::hidden('post_id', $post->id, ['class'=>'form-control input-lg']) !!}
				</div>
				<div class="form-group">
					{!! Form::hidden('user_id', Auth::id(), ['class'=>'form-control input-lg']) !!}
				</div>
				<div class="form-group">
					{!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=> 2]) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Submit', ['class'=>'btn btn-lg btn-block btn-primary']) !!}
				</div>
			{!! Form::close() !!}
			<hr>
			@if(count($comments) > 0) 
				@foreach($comments as $comment)
				<img class="img-circle" width="40" height="40" src="{{$comment->user->photo ? $comment->user->photo->path : 'https://pickupsoccer.net/images/user.png'}}" alt=""> 
				<br>
				<span><b>{{$comment->user->username}}</b> - {{$comment->created_at->diffForhumans()}}</span>
					<br>
					<span><p>{{$comment->body}}</p></span>
					@if(Auth::user() && (Auth::user()->id == $comment->user_id))

						{!! Form::open(['method'=>'DELETE', 'action'=>['UserCommentController@destroy', $comment->id]]) !!}
						<div class="form-group">
							{!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger']) !!}
						</div>
					{!! Form::close() !!}
					@endif
					<hr>
				@endforeach
			@endif
			{{ $comments->links('vendor.pagination.simple-bootstrap-4') }}
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md">
    <br>
        <center><p class="smx">© Copyright 2017-2020 PickupSoccer.net</p></center>
        <center><p class="smx">Powered by <a class ="smx" href="https://baffledjet.com" target="_blank">BAFFLEDJET.COM</a></p></center>
    </div>
</div>
@include('includes.jsitem')
@stop

