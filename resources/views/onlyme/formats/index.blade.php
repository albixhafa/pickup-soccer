@extends('layouts.onlyme')


@section('content')

<h1>Game Format Config</h1>
<hr>
<div class="row">
<div class="col-sm-6">
	{!! Form::open(['method'=>'POST', 'action'=>'FormatController@store']) !!}
		<div class="form-group">
			{!! Form::label('id', 'ID: ') !!}
			{!! Form::text('id', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('name', 'Format: ') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Create Format', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
</div>

<div class="col-sm-6">
	@if($formats)
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Format</th>
			</tr>
		</thead>
		<tbody>
			@foreach($formats as $format)
				<tr>
					<td>{{$format->id}}</td>
					<td><a href="{{route('formats.edit', $format->id)}}">{{$format->name}}</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
  	@endif
</div>
</div>

@stop