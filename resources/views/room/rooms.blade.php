@extends('layouts.master') 
@section('stylesheet')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

@endsection

@section('content')
<section class="content-header">
  <h1>
	Room Information
  </h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Room</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="row">
	<div class="col-xs-12">
	  <div class="box box-default">
		<div class="box-header with-border">
		  <span class="pull-left">
		   <h4><strong>{{$roomType->roomType}}<a href="{{ URL::to('room/' . $roomType->id . '/edit') }}"> <button type="button" class="btn btn-danger btn-xs" ><i class="fa fa-edit"></i></button></a></strong></h4>
		  </span>
		  <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
			  <i class="fa fa-plus "></i> Add Room
		  </button>
		</div>
		<div class="box-body">
			<!-- Nav tabs -->
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
			<a class="nav-link active" id="calendar-tab" data-toggle="tab" href="#calendar" role="tab" aria-controls="calendar" aria-selected="true">Calendar</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" id="listRooms-tab" data-toggle="tab" href="#listRooms" role="tab" aria-controls="listRooms" aria-selected="false">List of Rooms</a>
		  </li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
		  <div class="tab-pane active" id="calendar" role="tabpanel" aria-labelledby="calendar-tab">
		  	{!! Form::open(array('route'=>'reservation.store' ,'method'=>'POST','files'=>'true')) !!}
                    <div class="row">
                       <div class="col-xs-12 col-sm-12 col-xs-12">
                          @if (Session::has('success'))
                             <div class="alert alert-success">{{ Session::get('success') }}</div>
                          @elseif (Session::has('warnning'))
                              <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                          @endif
 
                    	</div>
 
                    
                        <div class="form-group"> 
                        	<div class="col-xs-3">
                        		<label for="room">Guest</label>
	                            <select class="form-control input-sm" name="name" id="name">
	                                @if(count('$guest') > 0)
	                                        <option value="0">Select guest name</option>
	                                    	
	                                    @foreach($guest as $rowGuest) 
	                                        <option value="{{$rowGuest->id}}">{{$rowGuest->gFirstname}} {{$rowGuest->gMiddlename}} {{$rowGuest->gLastname}}</option>
	                                    @endforeach
	                                @endif
	                            </select>
                        	</div>
                        	 <div class="form-group">
	                            <input type="hidden" value="{{$roomType->id}}" name="roomType" id="roomType">
	                        </div>
                        	
                        	<div class="col-sm-2">
                                <label for="in">Check-In</label>
								<input type="date" class="form-control input-sm" name="in" id="in" autocomplete="off" autofocus placeholder="Check-in Date">
                           	</div>
                            <div class="col-sm-2">
                                <label for="out">Check-Out</label>
                                <input type="date" class="form-control input-sm" name="out" id="out" autocomplete="off" autofocus placeholder="Check-out Date">
                            </div>
                            <div class="col-sm-2">
                                    <label for="adult">No. of Adult</label>
                                    <input type="number" min="0" class="form-control input-sm" name="adult" id="adult" autocomplete="off" autofocus>
                            </div>
                            <div class="col-sm-2">
                                    <label for="children">No. of Children</label>
                                    <input type="number" min="0" class="form-control input-sm" name="children" id="children" autocomplete="off" autofocus>
                           </div>
                           <div class="col-xs-1"><br/>
		                      {!! Form::submit('Add',['class'=>'btn btn-success ']) !!}
		                    </div>
		         
                        </div>   
 
                    </div>
             {!! Form::close() !!}
		  	<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-10">
					<div class="panel panel-info">
						<div class="panel-body fixed-panel" style="max-height: 10%;">
							{!! $calendar_details->calendar() !!}				
						</div>
					</div>
				</div>
			</div>
			</div>
		 
		  <div class="tab-pane" id="listRooms" role="tabpanel" aria-labelledby="listRooms-tab">
				@if(session('info'))

					<div class="alert alert-success">

						{{session('info')}}
					</div>
				@endif
				<table id="tbl" class="table table-bordered table-striped">
					<thead>
					  <tr>
						<th>Room Number</th>
						<th>Room Building / Location</th>
						<th>Room Status</th>
						<th>Action</th>
					  </tr>
					</thead>
					<tbody>
					  @if(count($room) > 0) 
						@foreach($room as $row)
						  <tr>
							<td style="text-align:center">{{$row['roomNumber']}}</td>
							<td style="text-align:center">{{$row['roomBuilding']}}-{{$roomType->location}}</td>
							<td style="text-align:center">{{$row['roomStatus']}}</td>
							<td style="text-align:center">
							  <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit-{{$row['id']}}"><i class="fa fa-edit"></i></button> |
							  <button class="btn btn-danger btn-xs" data-id="{{$row->id}}" data-toggle="modal" data-target="#delete"><i class="fa fa-remove"></i></button>
							</td>
						  </tr>
						  <div class="modal fade" id="edit-{{$row['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Edit Room Information</h4>
								  </div>
								  	{{ Form::model($row, array('route' => array('room.update', $row->id), 'method' => 'PUT')) }}
									 	<div class="modal-body">
											<div class="row">
												<div class="form-group">
													<div class="col-xs-12">
													    {{ Form::label('roomNumber', 'Room Number') }}
													    {{ Form::text('roomNumber', null, array('class' => 'form-control')) }}
													</div>
												</div>
												<div class="form-group">
													<div class="col-xs-12">
														{{ Form::label('roomBuilding', 'Room Building ') }}
        												{{ Form::select('roomBuilding', array('Harvard' => 'Harvard', 'Princeton' => 'Princeton', 'Wharton' => 'Wharton'), null, array('class' => 'form-control')) }}
													</div>
												</div>
												<div class="form-group">
													<div class="col-xs-12">
														{{ Form::label('roomStatus', 'Room Status ') }}
        												{{ Form::select('roomStatus', array('Available' => 'Available', 'Not Available' => 'Not Available', 'Maintenance' => 'Maintenance'), null, array('class' => 'form-control')) }}
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-success pull-right">Save Changes</button>
										</div>
								 	{{ Form::close() }}
								</div>
							  </div>
							</div>
						@endforeach 
					  @endif
					</tbody>
				</table>
			</div>
		</div>
		</div>
	  </div>
	</div>
  </div>

	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span></button>
			  <h4 class="modal-title">Add Room</h4>
			</div>
			<form method="post" action="{{route('rooms.store')}}">
			  {{csrf_field()}}
				@if($roomType->location == 'North Cambridge')
				 <div class="modal-body">
						<div class="form-group">
						  <label for="Room Number">Room Number</label>
						  <input type="text" class="form-control" name="roomNumber" id="roomNumber" autocomplete="off">
					  </div>

					  <div class="form-group">
						  <input type="hidden" class="form-control" name="roomType" id="roomType" value="{{ $roomType->id }}" autocomplete="off">
					  </div>

					  <div class="form-group">
						  <label for="Room Building">Room Location</label>
						  <select name = "roomBuilding" class="form-control" id="roomBuilding" autocomplete="off">
							  <option value ="Harvard"> Harvard </option>
							  <option value ="Princeton"> Princeton </option>
							  <option value ="Wharton"> Wharton </option>
						  </select>
					  </div>

					  <div class="form-group">
						  <label for="Room Status">Room Status</label>
						  <select name = "roomStatus" class="form-control" id="roomStatus" autocomplete="off">
							  <option value ="Available"> Available </option>
							  <option value ="Unavailable"> Unavailable </option>
						  </select>
					  </div>

				 </div>

				@elseif($roomType->location == 'Montinola')

					<div class="modal-body">
						<div class="form-group">
					   
						  <input type="hidden" class="form-control" name="roomNumber" id="roomNumber" value="n/a">
					  </div>

					  <div class="form-group">
						  <input type="hidden" class="form-control" name="roomType" id="roomType" value="{{ $roomType->id }}" autocomplete="off">
					  </div>

					  <div class="form-group">
						 
						  <input type="hidden" class="form-control" name="roomBuilding" id="roomBuilding" value="none">
					  </div>

					  <div class="form-group">
						  <label for="Room Status">Room Status</label>
						  <select name = "roomStatus" class="form-control" id="roomStatus" autocomplete="off">
							  <option value ="Available"> Available </option>
							  <option value ="Unavailable"> Unavailable </option>
						  </select>
					  </div>
					</div>
				@endif
			
			  <div class="modal-footer">
				<button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success">Save changes</button>
			  </div>
			</form>
		  </div>  
		  <!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	 </div>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
	  </div>
	  <form action="{{route('rooms.destroy','test')}}" method="post">
			{{method_field('delete')}}
			{{csrf_field()}}
		  <div class="modal-body">
				<h3>
				  <p class="text-center">
					Are you sure you want to delete this?
				  </p>
				</h3>
				<input type="hidden" name="room_id" id="room_id" value= " ">

		  </div>
		  <div class="modal-footer">
		  
			<button type="button" class="btn btn-success pull-left" data-dismiss="modal">No, Cancel</button>
			<button type="submit" class="btn btn-warning">Yes, Delete</button>
		  </div>
	  </form>
	</div>
  </div>
</div>



</section>

@endsection
@section('script')
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

    {!! $calendar_details->script() !!}
    
@endsection

