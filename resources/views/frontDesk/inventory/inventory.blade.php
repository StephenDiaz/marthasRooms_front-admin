@extends('layouts.master') 
@section('content')
<section class="content-header">
  <h1>
    Inventory
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Inventory</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-plus "></i> Add Item
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
                <th>Item Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($inventory) > 0) 
                @foreach($inventory->all() as $row)
                  <tr>
                    <td>{{$row['itemName']}}</td>
                    <td>{{$row['description']}}</td>
                    <td>{{$row['quantity']}}</td>
                    <td style="text-align:center">
                      <button class="btn btn-info" data-mytitle="{{$row->itemName}}" data-mydescription="{{$row->description}}" data-quantity="{{$row->quantity}}" data-id="{{$row->id}}" data-toggle="modal" data-target="#edit">Edit</button> |
                      <button class="btn btn-danger" data-id="{{$row->id}}" data-toggle="modal" data-target="#delete">Delete</button>
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
          <h4 class="modal-title">Add Item</h4>
        </div>
        <form method="post" action="{{route('inventory.store')}}">
          {{csrf_field()}}
          <div class="modal-body">
            @include('frontDesk.inventory.itemForm')
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
  
  
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
      </div>
      <form action="{{route('inventory.update','itemId')}}" method="post">
      		{{method_field('patch')}}
      		{{csrf_field()}}
	      <div class="modal-body">
	      		<input type="hidden" name="inventory_id" id="inventory_id" value= " ">
				  @include('frontDesk.inventory.itemForm')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success">Save Changes</button>
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
      <form action="{{route('inventory.destroy','itemId')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<h3>
                  <p class="text-center">
					Are you sure you want to delete this?
                  </p>
                </h3>
	      		<input type="hidden" name="inventory_id" id="inventory_id" value= " ">

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
@stop