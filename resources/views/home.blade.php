@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content container-fluid">
    <div class="box box-info">
       @if(Auth::user()->role == 'frontDesk')
         <div class="row">
            <div class="box-body">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            
                                <h3>{{$countDate}}</h3>
                                <p>Incoming Guest</p>
                            
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$countDate}}</h3>
                            <p>Reservation Request</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-o"></i>
                        </div>
                        <a href="{{url('reservation')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$northCambridge}}</h3>
                            <p>North Cambridge</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-building"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$montinola}}</h3>
                            <p>Montinola</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-building"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">

                        <div class="panel-heading">Bar Graphs</div>
                
                            <div class="panel-body">
                                <div class="col-md-6">
                                    {!! Charts::styles() !!}
                                    {!! $home->html() !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Charts::styles() !!}
                                    {!! $reservation_chart->html() !!}
                                 </div>
                                
                                </div>
                            <div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">

                        <div class="panel-heading">Pie Graph</div>
                
                            <div class="panel-body">
                                <div class="col-md-3"></div>
                                 <div class="col-md-6">
                                    {!! Charts::styles() !!}
                                    {!! $confirmed_piechart->html() !!}
                                 </div>
                                 <div class="col-md-3"></div>
                                </div>
                            <div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Charts::scripts() !!}
            {!! $home->script() !!}
            {!! $reservation_chart->script !!}
            {!! $confirmed_piechart->script !!}
        @endif
    
</section>

@endsection
