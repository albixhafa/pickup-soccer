@extends('layouts.main')

@section('content')

<div id="map" class="map_canvas roundedcorners"></div>
<h3><b>Scheduled Pickup Games :</b></h3>
<hr/>
<div class="row">

	@if($posts)
		@foreach($posts as $post)
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">{{Carbon\Carbon::parse($post->time)->toDayDateTimeString()}} ----- Players Joined <b>({{App\Player::where('post_id', $post->id)->count()}})</b></h3>
				</div>
				<div class="panel-body">
					<div class="media">
						<div class="media-left">
							{{-- <b>organizer</b> : {{$post->user->username}}<br/> --}}
							<img class="img-circle" width="48" height="48" src="{{$post->user->photo ? $post->user->photo->path : 'https://pickupsoccer.net/images/user.png'}}" data-holder-rendered="true">
						</div>
						<div class="media-body">
							
							<div class="btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
								<a class="btn btn-default" href="item/{{$post->id}}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Details</a>
								<a class="btn btn-success" href="http://google.com/maps/place/{{$post->lat}},{{$post->lng}}"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Directions</a>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		@endforeach
	@endif

</div>

<div class="row">
	<div class="col-12">
		{{--  {{ $posts->links('vendor.pagination.simple-bootstrap-4') }}  --}}
	</div>
</div>

<div class="row">
    <div class="col-md">
        <center><p class="smx">© Copyright 2017-2020 PickupSoccer.net</p></center>
        <center><p class="smx">Powered by <a class ="smx" href="https://baffledjet.com" target="_blank">BAFFLEDJET.COM</a></p></center>
    </div>
</div>
@include('includes.jsmainpage')
@stop