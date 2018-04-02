@extends('layouts.master') 
@section('content')
<section class="content-header">
    <h1>
        Guest Information
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Reservation</a></li>
        <li class="active"> Guest Information</li>
    </ol>
</section>
<section class="content">
	<div class="box">
		<div class="box-body">
			@foreach($reservation as $rowInfo)
		

				@if($rowInfo->id == $reservationId)
					<div class="row">
						<div class="col-xs-12">
							<h4 class="text-info">Guest Information</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							
							<div class="col-xs-1">
								<strong>Fullname: </strong> 
							</div>
							<div class="col-xs-10">
								  {{$rowInfo->guests->gFirstname}} {{$rowInfo->guests->gMiddlename}} {{$rowInfo->guests->gLastname}}
							</div>
							
						</div>

					</div>
					<div class="row">
						<div class="col-xs-12">
							
							<div class="col-xs-1">
								<strong>Address: </strong> 
							</div>
							<div class="col-xs-10">
								 {{$rowInfo->guests->address}}
							</div>
							
						</div>

					</div>

					<div class="row">
						<div class="col-xs-12">
							
							<div class="col-xs-2">
								<strong>Contact Number: </strong> 
							</div>
							<div class="col-xs-2">
								 {{$rowInfo->guests->gContactNumber}}
							</div>
							<div class="col-xs-2">
								<strong>Email Address: </strong> 
							</div>
							<div class="col-xs-2">
								 {{$rowInfo->guests->gEmail}}
							</div>
							
						</div>

					</div>

					<div class="row">
						<div class="col-xs-12">
							<h4 class="text-info">Reservation Information</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							
							<div class="col-xs-2">
								<strong>Check-In Date: </strong> 
							</div>
							<div class="col-xs-2">
								 {{$rowInfo->checkIn}}
							</div>
							<div class="col-xs-2">
								<strong>Check-Out Date: </strong> 
							</div>
							<div class="col-xs-2">
								 {{$rowInfo->checkOut}}
							</div>
							<div class="col-xs-2">
								<strong>Room Acquired: </strong> 
							</div>
							<div class="col-xs-2">
								 {{$rowInfo->roomTypes->roomType}}
							</div>
							
						</div>

					</div>

					<div class="row">
						<div class="col-xs-12">
							<div class="col-xs-2">
								<strong>Number of Pax: </strong>
							</div>
							<div class="col-xs-1">
								<strong>Adults: </strong> 
							</div>
							<div class="col-xs-1">
								 {{$rowInfo->noOfAdults}}
							</div>
							<div class="col-xs-1">
								<strong>Children: </strong> 
							</div>
							<div class="col-xs-1">
								 {{$rowInfo->noOfChildren}}
							</div>
							
						</div>

					</div>

					

					@if($rowInfo->additionalInfo =! null)
						<div class="row">
							<div class="col-xs-12">
								<h4 class="text-info">Additional Information</h4>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								
							</div>
						</div>
					@endif

					<div class="row">
							<div class="col-xs-12">
								<h4 class="text-info">Billing Information</h4>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								
							</div>
						</div>
					</div>
				@endif
						
			@endforeach
		</div>
   	</div>
	


</section>


@endsection
