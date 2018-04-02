
@extends('layouts.master')
@section('stylesheet')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

@endsection

@section('content')
<section class="content-header">
    <h1>
        Booking Calendar
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Booking Calendar</li>
    </ol>
</section>

<section class="content container-fluid">
    <div class="col-sm-12">
        <div class="col-sm-8"> 
            <div class="panel panel-info">

                <div class="panel-body">

                    {!! $calendar_details->calendar() !!}
                    
                    
                </div>
            </div>
        </div> 
        <div class="col-sm-4">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title text-center">Ongoing Booking</h3>
                    @foreach($events as $rowReserve)
                       <div class="row">
                            <div class="col-sm-12">
                                 <p><strong>Name:</strong> {{$rowReserve->guests->gFirstname}} {{$rowReserve->guests->gMiddlename}} {{$rowReserve->guests->gLastname}}</p>
                                 <p><strong>Date:</strong> {{$rowReserve->checkIn}} to {{$rowReserve->checkOut}}</p>
                                 <p><strong>Room Acquired:</strong> {{$rowReserve->roomTypes->roomType}}</p>
                             </div>
                       </div> 
                       <br>          
                    @endforeach
                </div>
                <div class="box-body">
                  <div class="row">
                    
                  </div>
                </div>
                <!-- /.box-body -->
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