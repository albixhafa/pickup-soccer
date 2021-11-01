@extends('layouts.main')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="map_canvas roundedcorners"></div>
	</div>
</div>
<h3><b>Profile : </b></h3>
<hr>
<div class="row">
	<div class="col-md-6 vl">
		<form>
			<div class="form-group">
				<label for="Location">Current : {{$user->formatted_address}}</label>
				<input class="form-control input-lg" id="geocomplete" type="text" placeholder="Set Your Local Area" value="">
			</div>
		</form>
	@include('includes.errors')

	</div>

  	<div class="col-md-6">
	{!! Form::model($user, ['method'=>'PATCH', 'action'=>['UserProfileController@update', $user->id], 'files'=>true]) !!}

		<div class="form-group">
			{!! Form::label('email', 'E-mail: ') !!}
			{!! Form::email('email', null, ['class'=>'form-control input-lg']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password: ') !!}
			{!! Form::password('password', ['class'=>'form-control input-lg']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('username', 'Username: ') !!}
			{!! Form::text('username', null, ['class'=>'form-control input-lg']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('gender_id', 'Gender: ') !!}
			{!! Form::select('gender_id', $gender, null, ['class'=>'form-control input-lg']) !!}
		</div>

		<div class="form-group">
            {!! Form::hidden('formatted_address', null, ['class'=>'form-control input-lg', 'autocomplete'=>'off']) !!}
        </div>

		<div class="form-group">
			{!! Form::hidden('lat', null, ['class'=>'form-control input-lg']) !!}
		</div>

		<div class="form-group">
			{!! Form::hidden('lng', null, ['class'=>'form-control input-lg']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('photo_id', 'Profile Photo: ') !!}
			{!! Form::file('photo_id', null, ['class'=>'form-control input-lg']) !!}
		</div>

		<img width="100px" height="100px" class="img-rounded" src="{{$user->photo ? $user->photo->path : 'https://pickupsoccer.net/images/user.png'}}" alt="">
		<br>
		<br>
		<div class="form-group">
			{!! Form::submit('Update Profile', ['class'=>'btn btn-lg btn-primary']) !!}
		</div>
		{!! Form::close() !!}
		
		<div class="form-group">
			{!! Form::open(['method'=>'DELETE', 'action'=>['UserProfileController@destroy', $user->id]]) !!}
			{!! Form::submit('Delete Profile?', ['class'=>'delete_link btn btn-lg btn-danger']) !!}
			{!! Form::close() !!}
		</div>
		
	</div>
</div>
<hr>
<div class="row">
    <div class="col-md">
    <br>
        <center><p class="smx">© Copyright 2017-2020 PickupSoccer.net</p></center>
        <center><p class="smx">Powered by <a class ="smx" href="https://baffledjet.com" target="_blank">BAFFLEDJET.COM</a></p></center>
    </div>
</div>
@include('includes.jsprofile')
@stop