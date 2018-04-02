@extends('layouts.master')
@section('content')
<section class="content-header">
	<ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Guest</a></li>
	    <li class="active">Guest Profile</li>
	</ol>
</section>
<section class="content ontainer-fluid">
	<h3 class="text-info">{{$guest->gLastname}}'s Profile</h3>
	<div class="box box-info">
		<div class="box-body">
			
				{{ Form::model($guest, array('route' => array('guest.update', $guest->id), 'method' => 'PUT')) }}

				    <div class="form-group">
				        {{ Form::label('gFirstname', 'Firstname') }}
				        {{ Form::text('gFirstname', null, array('class' => 'form-control')) }}
				    </div>
				     <div class="form-group">
				        {{ Form::label('middlename', 'Middlename') }}
				        {{ Form::text('gMiddlename', null, array('class' => 'form-control')) }}
				    </div>
				     <div class="form-group">
				        {{ Form::label('gLastname', 'Lastname') }}
				        {{ Form::text('gLastname', null, array('class' => 'form-control')) }}
				    </div>
				    <div class="form-group">
				        {{ Form::label('address', 'Address') }}
				        {{ Form::text('address', null, array('class' => 'form-control')) }}
				    </div>
				     <div class="form-group">
				        {{ Form::label('gContactNumber', 'Contact Number') }}
				        {{ Form::number('gContactNumber', null, array('class' => 'form-control')) }}
				    </div>
				    <div class="form-group">
				        {{ Form::label('gEmail', 'Email') }}
				        {{ Form::email('gEmail', null, array('class' => 'form-control')) }}
				    </div>

				    <div class="form-group">
				       
				    </div>
				    <a href="{{url('guest')}}">{{ Form::button('Back', array('class' => 'btn btn-warning pull-left')) }}</a>
				    {{ Form::submit('Save Changes', array('class' => 'btn btn-success pull-right')) }}

				{{ Form::close() }}
			
		</div>
	</div>
</section>
@endsection