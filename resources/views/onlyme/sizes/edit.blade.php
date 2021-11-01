@extends('layouts.onlyme')


@section('content')

<h1>Edit Team Size</h1>
<hr>
<div class="row">
	<div class="col-sm-6">
		{!! Form::model($size, ['method'=>'PATCH', 'action'=>['SizeController@update', $size->id]]) !!}
			<div class="form-group">
				{!! Form::label('id', 'ID: ') !!}
				{!! Form::text('id', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('teamsize', 'Size: ') !!}
				{!! Form::text('teamsize', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Update', ['class'=>'btn btn-primary col-sm-3 pull-left']) !!}
			</div>
		{!! Form::close() !!}

		{!! Form::open(['method'=>'DELETE', 'action'=>['SizeController@destroy', $size->id]]) !!}
		<div class="form-group">
			{!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-3 pull-left']) !!}
		</div>
		{!! Form::close() !!}
	</div>

	<div class="col-sm-6">
	</div>
	
</div>

@stop