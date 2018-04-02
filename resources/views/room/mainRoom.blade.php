@extends('layouts.master')
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
		<div class="box">
			<div class="box-header">
				<span class="pull-left">
					<span class="label label-primary">North Cambrige</span>
					<!-- <span class="label label-warning">Under Maintenance</span> -->
					<span class="label label-info">Montinola</span>
				</span>
				@if(Auth::user()->role == 'frontDesk')
					<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addRoom">
	                  	<i class="fa fa-plus "></i> Add Room Type
	                </button>
				@endif
			</div>

			<div class="box-body">
				@if(count($rmType) > 0 )
					@foreach($rmType as $rowType)

						@if($rowType->location == 'Montinola')

							<div class="col-lg-3 col-xs-6">
								<div class="small-box bg-info">

									<div class="inner">

										 <h3>
										</h3>
										<p>{{$rowType->roomType}}</p>
									</div>

									<div class="icon">
										<i class="fa fa-home"></i>

									</div>
		
										<a href="/rooms/{{$rowType->id}}"><button type="button" class="btn btn-info btn-block"><i class="fa fa-arrow-circle-right"></i> View More</button></a>
								</div>
							</div>

						@else
							<div class="col-lg-3 col-xs-6">
								<div class="small-box bg-primary">

									<div class="inner">

										 <h3>
										 	<span class="label label-danger"></span>
					
											<span class="label label-success"></span>
										</h3>
										<p>{{$rowType->roomType}}</p>
									</div>

									<div class="icon">
										<i class="fa fa-home"></i>

									</div>
		
										<a href="/rooms/{{$rowType->id}}"><button type="button" class="btn btn-primary btn-block"><i class="fa fa-arrow-circle-right"></i> View More</button></a>
								</div>
							</div>

						@endif
					@endforeach
				@endif
			</div>
			
		</div>


		<div class="modal fade" id="addRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center" id="myModalLabel">Add Room Type</h4>
		      </div>
		      <form action="{{route('room.store')}}" method="post" enctype="multipart/form-data">
		      	{{csrf_field()}}
				<div class="modal-body">
					@include('room.roomTypeForm')
					<div class="form-group">
						<label>Special Room Price</label>
						<div class="row">
						 		<div class="col-xs-7">
									<label >Date Range</label>
								</div>
								<div class="col-xs-2">
									<label >Number of Person</label>
								</div>
								<div class="col-xs-3">
									<label >Amount</label>
								</div>
							</div>
						<div id="field">
							<div class="row">
						 		<div class="col-xs-3">
						 			 <div class="input-group">
										<input class="input form-control" id="inputStart" name="inputStart[]" type="date">
										<div class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="input-group">
										<input class="input form-control" id="inputEnd" name="inputEnd[]" type="date">
										<div class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</div>
									</div>
								</div>
								<div class="col-xs-1"></div>
								<div class="col-xs-2">
									<div class="input-group">
										<input class="input form-control" id="person" name="person[]" type="number">
										<div class="input-group-addon">
											<span class="fa fa-users"></span>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="input-group">
										<div class="input-group-addon">
											<span>₱</span>
										</div>
										<input class="input form-control" id="amt" name="amt[]" type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2"></div>
							<div class="col-xs-8">
								<button type="button" class="btn btn-success btn-block add-more">Add more</button>
							</div>
							<div class="col-xs-2"></div>
						</div>
					</div>
			    </div>
			      <div class="modal-footer">
		          
			        <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancel</button>
			        <button type="submit" class="btn btn-success pull-right">Add Room</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>
	</section>

@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$(".add-more").click(function(e){
			e.preventDefault();
			$("#field").append('<div class="row"><div class="col-xs-3"><div class="input-group"><input class="input form-control" id="inputStart" name="inputStart[]" type="date"><div class="input-group-addon"><span class="fa fa-calendar"></span></div></div></div><div class="col-xs-3"><div class="input-group"><input class="input form-control" id="inputEnd" name="inputEnd[]" type="date"><div class="input-group-addon"><span class="fa fa-calendar"></span></div></div></div><div class="col-xs-1"></div><div class="col-xs-2"><div class="input-group"><input class="input form-control" min="1" max="20" id="person" name="person[]" type="number"><div class="input-group-addon"><span class="fa fa-users"></span></div></div></div><div class="col-xs-3"><div class="input-group"><div class="input-group-addon"><span>₱</span></div><input class="input form-control" id="amt" name="amt[]" type="text"></div></div></div>')});

		$(".add-price").click(function(e){
			e.preventDefault();
			$("#price").append('<div class="row"><div class="col-md-3"><div class="input-group"><div class="input-group-addon"><span class="fa fa-users"></span></div><input class="input form-control" name="personD[]" type="number"></div></div><div class="col-md-3"><div class="input-group"><div class="input-group-addon"><span>₱</span></div><input class="input form-control" name="priceD[]" type="number"></div></div><div class="col-md-2"><select name="type[]" class="form-control" id="type" autocomplete="off"><option value ="website"> Website </option><option value ="walkIn"> Walk In </option></select></div></div>')});

	});
</script>
@endsection


