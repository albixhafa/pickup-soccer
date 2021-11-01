@extends('layouts.main')

@section('content')

<div class="row">
<div class="col-md-12">
		<div class="map_canvas roundedcorners"></div>
	</div>
</div>
<h3><b>Create Game : </b></h3>
<hr>
<div class="row">

<div class="col-md-6">

	@include('includes.errors')

	{!! Form::open(['method'=>'POST', 'action'=>'UserPostController@store']) !!}

		<div class="form-group">
			<label for="Location">Location :</label>
			<input class="form-control input-lg" id="geocomplete" type="text" placeholder="Set Game Location" value="">
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

		{{--  <div class="form-group">
			{!! Form::label('time', 'Date & Time: ') !!}
			{!! Form::text('time', null, ['class'=>'large form-control input-lg']) !!}
		</div>  --}}
		
		<div class="form-group">
			<label for="time">Date & Time:</label>
			<div class='input-group date' id='datetimepicker1'>
				<input name='time' type='text' class="form-control input-lg" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('format_id', 'Game Format: ') !!}
			{!! Form::select('format_id', [''=>'Choose Game Format'] + $teamformats, null, ['class'=>'form-control input-lg']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('team_number_id', 'Number of Teams: ') !!}
			{!! Form::select('team_number_id', [''=>'Choose Number of Teams'] + $numberofteams, null, ['class'=>'form-control input-lg']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('size_id', 'Team Size: ') !!}
			{!! Form::select('size_id', [''=>'Choose Team Size'] + $teamsizes, null, ['class'=>'form-control input-lg']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('team_gender_id', 'Gender Group: ') !!}
			{!! Form::select('team_gender_id', [''=>'Choose Gender group'] + $gendergroups, null, ['class'=>'form-control input-lg']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('note', 'Notes: ') !!}
			{!! Form::textarea('note', null, ['class'=>'form-control input-lg', 'rows'=> 2]) !!}
		</div>
		<br>
		<div class="form-group">
			{!! Form::submit('Create Post', ['class'=>'btn btn-lg btn-block btn-success']) !!}
		</div>

	{!! Form::close() !!}

</div>

<div class="col-md-6">
<div class="table-responsive">
<table class="table">
	<thead>
	  <tr>
		<th><i class="fa fa-calendar" aria-hidden="true"></i></th>
		<th>Posted</th>
		<th>Delete ?</th>
	  </tr>
	</thead>
	<tbody>  
		@if($posts)
			@foreach($posts as $post)
				<tr>
					<td>{{str_limit(Carbon\Carbon::parse($post->time)->toDayDateTimeString(), 11)}}</td>
					<td>
					<a class="btn btn-lg btn-info" href="item/{{$post->id}}">Details</a>
					</td>
					<td>
					{!! Form::open(['method'=>'DELETE', 'action'=>['UserPostController@destroy', $post->id]]) !!}
						<div class="form-group">
							{!! Form::submit('Delete', ['class'=>'delete_link btn btn-lg btn-danger']) !!}
						</div>
					{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		@endif
	</tbody>
  </table>
  </div>
  {{ $posts->links('vendor.pagination.simple-bootstrap-4') }}
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

@include('includes.jspost')
@stop