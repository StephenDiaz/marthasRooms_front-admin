@extends('layouts.master') 
@section('content')
<section class="content-header">
    <h1>
        Reservation
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reservation</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-plus "></i> Add Reservation
                </button>
                </div>
                <div class="box-body">

                    <table id="tbl" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Check-IN</th>
                                <th>Check-OUT</th>
                                <th>Room Acquired</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if(count($reservation) > 0)
                                @foreach($reservation as $rowReserve) 
                                    <tr>
                                        <td>{{$rowReserve->guests->gLastname}}</td>
                                        <td>{{$rowReserve->guests->gFirstname}}</td>
                                        <td>{{$rowReserve->checkIn}}</td>
                                        <td>{{$rowReserve->checkOut}}</td>
                                        <td>{{$rowReserve->roomTypes->roomType}}</td>
                                        <td>{{$rowReserve->status}}</td>
                                        <td style="text-align:center">
                                            <div class="btn-group">
                                                <div class="row">

                                                    
                                                    <a href="/reservation/{{$rowReserve->id}}"><button class="btn btn-info btn-xs" ><i class="fa fa-user"></i></button></a>

                                                    @if($rowReserve->status == 'cancelled')
                                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#undo-{{$rowReserve->id}}" ><i class="fa fa-undo"></i></button>

                                                    @elseif($rowReserve->status == 'accepted')
                                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#undo-{{$rowReserve->id}}" ><i class="fa fa-undo"></i></button>

                                                    @else
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#cancel-{{$rowReserve->id}}" ><i class="fa fa-remove"></i></button>
                                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#accept-{{$rowReserve->id}}"><i class="fa fa-check"></i></button>
                                                 
                                                    @endif
                                                    
                                                    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="cancel-{{$rowReserve->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                  <h4 class="modal-title text-center" id="myModalLabel">Cancel Request</h4>
                                                </div>
                                                
                                                

                                                <div class="modal-body">
                                                    <h3 class="text-info text-center">Do you really want to cancel the request?</h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success pull-left" data-dismiss="modal">No</button>
                                                   <a href="/reservationCancel/{{{$rowReserve->id}}}" > <button type="button" class="btn btn-warning righ-left">Yes</button></a>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="accept-{{$rowReserve->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                  <h4 class="modal-title text-center" id="myModalLabel">Accept Request</h4>
                                                </div>
                                                
                                                

                                                <div class="modal-body">
                                                    <h3 class="text-info text-center">Do you really want to accept this request? </h3>

                                                        <p class="text-info text-center"><strong>Guest Name:</strong> {{$rowReserve->guests->gFirstname}} {{$rowReserve->guests->gMiddlename}} {{$rowReserve->guests->gLastname}} </p>
                                                         <p class="text-info text-center"><strong>Room Acquired: </strong>{{$rowReserve->roomTypes->roomType}} </p>
                                                        <p class="text-info text-center"><strong>Amount to be paid: </strong> </p>

                                                        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success pull-left" data-dismiss="modal">No, Back</button>
                                                   <a href="/reservationAccept/{{{$rowReserve->id}}}" > <button type="button" class="btn btn-warning righ-left">Accept</button></a>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="undo-{{$rowReserve->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                  <h4 class="modal-title text-center" id="myModalLabel">Undo Action</h4>
                                                </div>
                                                
                                                

                                                <div class="modal-body">
                                                    <h3 class="text-info text-center">Do you really want to change it back to pending status?</h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success pull-left" data-dismiss="modal">No, Back</button>
                                                   <a href="/reservationUndo/{{{$rowReserve->id}}}" > <button type="button" class="btn btn-warning righ-left">Yes, Undo</button></a>
                                                </div>
                                              
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

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Reservation</h4>
                </div>
                <form method="post" action="{{route('reservation.store')}}">
                    {{csrf_field()}}
                    <div class="modal-body">
                       <div class="form-group">
                            <label for="room">Guest</label>


                            <select class="form-control" name="name" id="name">
                                @if(count('$guest') > 0)
                                    
                                    @foreach($guest as $rowGuest) 
                                        <option value="{{$rowGuest->id}}">{{$rowGuest->gFirstname}} {{$rowGuest->gMiddlename}} {{$rowGuest->gLastname}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                       
                        <div class="form-group">
                            <div id="reserve">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="room">Type of Room</label>


                                        <select class="form-control" name="roomType" id="roomType">
                                            @if(count('$roomType') > 0)
                                        
                                            @foreach($roomType as $rowRoom) 
                                            <option value="{{$rowRoom->id}}">{{$rowRoom->roomType}}</option>
                                            @endforeach
                                            @endif
                                        </select>

                                    </div>
                                    <!-- <div class="col-sm-5">
                                        <label>Number of Rooms to Avail</label>
                                        <input type="number" class="form-control" name="rooms" id="rooms">
                                    </div>
                                     <div class="col-sm-2">
                                        <label>Action</label>
                                        <button type="button" class="btn btn-success reserve-more">Add more</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="in">Check-In</label>
									<div class="input-group">
										<input type="date" class="form-control" name="in" id="in" autocomplete="off" autofocus placeholder="Check-in Date">
										<div class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</div>
									</div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="out">Check-Out</label>
                                    <div class="input-group">
										<input type="date" class="form-control" name="out" id="out" autocomplete="off" autofocus placeholder="Check-out Date">
										<div class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</div>
									</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="adult">Number of Adult</label>
                                    <input type="number" min="0" class="form-control" name="adult" id="adult" autocomplete="off" autofocus>
                                </div>
                                <div class="col-sm-6">
                                    <label for="children">Number of Children</label>
                                    <input type="number" min="0" class="form-control" name="children" id="children" autocomplete="off" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                         @if(count($inventory) > 0)
                        <div class="col-xs-12">
                            <div class="box">
                                <table id="example1" class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%" >Quantity</th>
                                            <th>Item Name</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($inventory as $rowInventory)
                                        <tr>
											
                                            <td> 
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number btn-xs"  data-type="minus" data-field="">
                                                          <span class="glyphicon glyphicon-minus"></span>
                                                        </button>
                                                    </span>
                                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="0" min="0" max="10" >
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-right-plus btn btn-success btn-number btn-xs" data-type="plus" data-field="">
                                                            <span class="glyphicon glyphicon-plus"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>{{$rowInventory->itemName}}</td>
                                           
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                         </div>
                         @endif
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <label for="info">Additional Information</label>
                                <textarea class="form-control" name="info" id="info">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <input type="checkbox" class="form-check-input" value="yes" name="discount" id="discount">With discount for señior citizen and PWD
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Reserve</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</section>


@endsection

@section('script')
<script type="text/javascript">

    $(document).ready(function(){

        $(".reserve-more").click(function(e){

            e.preventDefault();

            $("#reserve").append('div class="row"><div class="col-sm-5"><label for="room">Type of Room</label><select class="form-control" name="roomType[]" id="roomType"> @if(count('$roomType') > 0) @foreach($roomType as $rowRoom)<option value="{{$rowRoom->id}}">{{$rowRoom->roomType}}</option> @endforeach @endif </select></div><div class="col-sm-5"><label>Number of Rooms to Avail</label><input type="number" class="form-control" name="rooms[]" id="rooms"></div><div class="col-sm-2"><label>Action</label><button type="button" class="btn btn-success reserve-more">Add Room</button></div></div>')});

</script>

@endsection

