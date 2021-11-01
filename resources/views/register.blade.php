@extends('layouts.app')

@section('content')


<div class="container">
<br>
    <center><img height="160" src="/images/logo.png" alt=""></center>
    <br>
	<center><h2><b>REGISTRATION PAGE</b></h2></center>
	<br>
	<div class="row">
		
		<div class="col-md-8 col-md-offset-2">
				<div class="panel-body">
					<div class="map_canvas roundedcorners"></div>
				</div>
			<div>
			@include('includes.errors')
				<div class="panel-body">
					<form>
						<div class="form-group">
							<label for="Location">Your Location (City):</label>
								<input class="form-control input-lg" id="geocomplete" type="text" placeholder="Set Your Location" value="">
						</div>
					</form>

					{!! Form::open(['method'=>'POST', 'action'=>'Auth\RegisterController@register', 'files'=>true]) !!}

					<div class="form-group">
							{!! Form::label('username', 'Username: ') !!}
							{!! Form::text('username', null, ['class'=>'form-control input-lg']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('email', 'E-mail: ') !!}
							{!! Form::email('email', null, ['class'=>'form-control input-lg']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('password', 'Password: ') !!}
							{!! Form::password('password', ['class'=>'form-control input-lg']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('password_confirmation', 'Confirm Password: ') !!}
							{!! Form::password('password_confirmation', ['class'=>'form-control input-lg']) !!}
						</div>

						<div class="form-group">
							{!! Form::hidden('formatted_address', null, ['class'=>'form-control input-lg']) !!}
						</div>

						<div class="form-group">
							{!! Form::hidden('lat', null, ['class'=>'form-control input-lg']) !!}
						</div>

						<div class="form-group">
							{!! Form::hidden('lng', null, ['class'=>'form-control input-lg']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('gender_id', 'Gender: ') !!}
							{!! Form::select('gender_id', $gender, null, ['class'=>'form-control input-lg']) !!}
						</div>

						<div class="form-group">
							<br>
							{!! Form::submit('Create User', ['class'=>'btn btn-lg btn-block btn-primary']) !!}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
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

@endsection
