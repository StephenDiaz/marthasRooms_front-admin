@extends('layouts.master')

@section('content')
<section class="content-header">
  <h1>
	Edit Room Type
  </h1>
  <ol class="breadcrumb">
	<li><a href="{{url('room')}}"><i class="fa fa-dashboard"></i> Rooms</a></li>
	<li class="active">Edit Room Type</li>
  </ol>
</section>
<section class="content">
	<div class="box">
		<div class="box-body"> 
			<div class="row">
				{{ Form::model($roomType, array('route' => array('room.update', $roomType->id), 'method' => 'PUT')) }}
			
			
					<div class="form-group">
						<div class="col-md-12">
						    {{ Form::label('roomType', 'Room Type') }}
						    {{ Form::text('roomType', null, array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							{{ Form::label('location', 'Location') }}
        					{{ Form::select('location', array('Montinola' => 'Montinola', 'North Cambridge' => 'North Cambridge'), null, array('class' => 'form-control')) }}
						</div>   
					</div>
					<div class="form-group">
						<div class="col-md-12">
							{{ Form::label('roomCapacity', 'Room Capacity') }}
						    {{ Form::text('roomCapacity', null, array('class' => 'form-control')) }}
						</div>
					    
					</div>
					<div class="form-group">
						<div class="col-md-12">
							{{ Form::label('excess', 'Excess Charges') }}
					   	 	{{ Form::text('excess', null, array('class' => 'form-control')) }}
						</div>
					    
					</div>
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							<a href="{{url('room')}}">{{ Form::button('Back', array('class' => 'btn btn-warning pull-left')) }}</a>
							{{ Form::submit('Save Changes', array('class' => 'btn btn-success pull-right')) }}
						</div>
					</div>
				</div>	
					
		  		{{ Form::close() }} 
			


		</div>
	</div>

</section>

@endsection