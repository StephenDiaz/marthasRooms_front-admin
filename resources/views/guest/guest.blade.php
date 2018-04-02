@extends('layouts.master') 
@section('content')
<section class="content-header">
  <h1>
    Guest Information
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Guest</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-default">
        <div class="box-header with-border">
          @if(Auth::user()->role == 'frontDesk')
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
              <i class="fa fa-plus "></i> Add Guest
          </button>
          @else
           <button type="button" onclick="addForm()" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-report">
              <i class="fa fa-print "> </i> Generate Report
          </button>
          @endif


        </div>
        <div class="box-body">
          @if(session('info'))

          <div class="alert alert-success">

            {{session('info')}}
          </div>
          @endif
          <table id="tbl" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Email Address</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tbody>
              @if(count($guestQuery) > 0) 
                @foreach($guestQuery as $row)
                  <tr>
                    <td>{{$row->gLastname}}</td>
                    <td>{{$row->gFirstname}}</td>
                    <td>{{$row->gMiddlename}}</td>
                    <td>{{$row->address}}</td>
                    <td>{{$row->gContactNumber}}</td>
                    <td>{{$row->gEmail}}</td>
                    <td style="text-align:center">
                      <a href="/guestProfile/{{$row->id}}"><button class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button></a> |

                     <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#disable-{{$row->id}}"><i class="fa fa-remove "></i></button>
                    </td>
                  </tr>


                <div class="modal fade" id="disable-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
                            </div>
                            <div class="modal-body">
                                <h3 class="text-info text-center">Do you really want to remove this guest record in the list?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success pull-left" data-dismiss="modal">No, Back</button>
                               <a href="/guestDisable/{{$row->id}}" > <button type="button" class="btn btn-warning righ-left">Yes, Delete</button></a>
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
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Guest</h4>
        </div>
        <form method="post" action="{{route('guest.store')}}">
          {{csrf_field()}}
          <div class="modal-body">
            @include('guest.guestForm')
          </div>
        
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
            <a href="{{route('guest.export')}}"><button type="button" class="btn btn-success pull-right">Yes</button></a>
          </div>
        
      </div>  
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <script>  
    function addForm(){
      $('#modal-exim').modal('show');
      $('#modal-exim form')[0].reset();
    }
  </script>
</section>

@stop