@extends('layouts.master') 
@section('content')
<section class="content-header">
    <h1>
        Confirmed
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Confirmed</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
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
                            @if(count($confirmation) > 0)
                            
                                @foreach($confirmation as $rowReserve)
            
                                    
                                        <tr>
                                            <td>{{$rowReserve->guest->gLastname}}</td>
                                            <td>{{$rowReserve->guest->gFirstname}}</td>
                                            <td>{{$rowReserve->reserve->checkIn}}</td>
                                            <td>{{$rowReserve->reserve->checkOut}}</td>
                                            <td>{{$rowReserve->reserve->roomTypes->roomType}}</td>
                                            <td>{{$rowReserve->status}}</td>
                                            <td style="text-align:center">
                                                @if($rowReserve->status == "pending")
                                                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#in-{{$rowReserve->id}}">Check In
                                                    </button>
                                                @elseif($rowReserve->status == "checkIn")
                                                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#out-{{$rowReserve->id}}">Check Out
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="in-{{$rowReserve->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title text-center" id="myModalLabel">Check In</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3 class="text-info text-center">Do you really want to check-in {{$rowReserve->guest->gFirstname}} {{$rowReserve->guest->gLastname}}? </h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success pull-left" data-dismiss="modal">No</button>
                                                       <a href="/checkIn/{{$rowReserve->id}}" > <button type="button" class="btn btn-warning righ-left">Yes</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="out-{{$rowReserve->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title text-center" id="myModalLabel">Check Out</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3 class="text-info text-center">Do you really want to check-out {{$rowReserve->guest->gFirstname}} {{$rowReserve->guest->gLastname}}?</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success pull-left" data-dismiss="modal">No</button>
                                                       <a href="/checkOut/{{$rowReserve->id}}" > <button type="button" class="btn btn-warning righ-left">Yes</button></a>
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

</section>
@stop