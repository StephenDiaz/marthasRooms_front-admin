@extends('layouts.master') 
@section('content')
<section class="content-header">
  <h1>
    User Management
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">User Management</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-default">
        <div class="box-header with-border">
          
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">
              <i class="fa fa-plus "></i> Add User
          </button>

          <button type="button" onclick="addForm()" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-report">
              <i class="fa fa-print "> </i> Generate Report
          </button>
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
                <th>Name</th>
                <th>Email Address</th>
                <th>Role</th>
                <th>Account Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($user) > 0) 
                @foreach($user as $row)
                  <tr>
                    <td>{{$row['name']}}</td>
                    <td>{{$row['email']}}</td>
                    <td>{{$row['role']}}</td>
                    <td> {{$row['acctStat']}}</td>
                    <td style="text-align:center">
                       <a href="{{ URL::to('user/' . $row['id'] . '/edit') }}"><button class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button></a> 
                      <button class="btn btn-danger btn-xs" data-id="{{$row->id}}" data-toggle="modal" data-target="#delete"><i class="fa fa-remove"></i></button>
                    </td>
                  </tr>
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
          <h4 class="modal-title">Add User</h4>
        </div>
        <form method="post" action="{{route('user.store')}}">
          {{csrf_field()}}
          <div class="modal-body">
            @include('admin.userForm')
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
  
  
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add User</h4>
      </div>
      <form method="post" action="{{route('user.store')}}">
         
          {{csrf_field()}}
        <div class="modal-body">
          @include('admin.userForm')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Add User</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('user.destroy','test1')}}" method="post">
          {{method_field('delete')}}
          {{csrf_field()}}
        <div class="modal-body">
        <h3>
          <p class="text-center">
          Are you sure you want to delete this?
                  </p>
                </h3>
            <input type="hidden" name="user_id" id="user_id" value= " ">

        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-success pull-left" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-warning">Yes, Delete</button>
        </div>
      </form>
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
            <a href="{{route('user.export')}}"><button type="button" class="btn btn-success pull-right">Yes</button></a>
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