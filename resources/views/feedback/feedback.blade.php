@extends('layouts.master') 
@section('content')
<section class="content-header">
  <h1>
    Feedback
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Feedback</li>
  </ol>
</section>
<section class="content container-">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-default">
        <div class="box-body">
        <button type="button" onclick="addForm()" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-report">
            <i class="fa fa-print "> </i> Generate Report
        </button>
        <div class="box-body">
        </div>
          @if(session('info'))

          <div class="alert alert-success">

            {{session('info')}}
          </div>
          @endif
          <table id="tbl" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($feedbackQuery) > 0) 
                @foreach($feedbackQuery as $row)
                  @if($row->status == 'enabled')
                    <tr class="table-dark">
                      <td>{{$row->name}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->subject}}</td>
                      <td>{{$row->message}}</td>
                      <td style="text-align:center">
                       
                       <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#enable-{{$row->id}}"><i class="fa fa-check "></i></button>
                      </td>
                    </tr>
                  @elseif($row->status == 'disabled')
                    <tr>
                      <td>{{$row->name}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->subject}}</td>
                      <td>{{$row->message}}</td>
                      <td style="text-align:center">
                       
                       <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#disable-{{$row->id}}"><i class="fa fa-remove "></i></button>
                      </td>
                    </tr>
                  @endif


                <div class="modal fade" id="disable-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
                            </div>
                            <div class="modal-body">
                                <h3 class="text-info text-center">Do you really want to disable this feedback record?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success pull-left" data-dismiss="modal">No, Back</button>
                               <a href="/feedbackEnable/{{$row->id}}" > <button type="button" class="btn btn-warning righ-left">Yes, Delete</button></a>
                            </div>
                          
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="enable-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
                            </div>
                            <div class="modal-body">
                                <h3 class="text-info text-center">Do you really want to disable this feedback record?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success pull-left" data-dismiss="modal">No, Back</button>
                               <a href="/feedbackDisable/{{$row->id}}" > <button type="button" class="btn btn-warning righ-left">Yes, Delete</button></a>
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

<div class="modal fade" id="modal-report">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Export Report</h4>
        </div>
       
          {{csrf_field()}}
          <div class="modal-body">
           <h3 class="text-center text-info">Do you really want to generate report?</h3>
          </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">No</button>
            <a href="{{route('feedback.export')}}"><button type="button" class="btn btn-success pull-right">Yes</button></a>
          </div>
        
      </div>  
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

</section>

@endsection

@section('script')
  <script>
    function addForm(){
      $('#modal-exim').modal('show');
      $('#modal-exim form')[0].reset();
    }
    </script>
@endsection