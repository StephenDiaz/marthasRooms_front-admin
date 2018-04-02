@extends('layouts.master')
@section('content')
<section class="content-header">
	<ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Profile</li>
	</ol>
</section>
<section class="content ontainer-fluid">
	<h3 class="text-info">{{$user->name}}'s Profile</h3>
	<div class="box box-info">
		<div class="box-body">
			
				
				{{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT', 'files' => true)) }}
					<div class="form-group">
						@if($user->image == null)
							<img src="{{asset('/userImage/temporary.png')}}"  class="rounded" alt="user image" style="width: 150px; height: 150px; border-radius: 50%">
							<div class="form-group">
							    <input type="file" name="image" id="image">
							</div>

						@else
						  	<img src="/userImage/{{$user->image}}"  class="img-circle" alt="user image" style="width: 150px; height: 150px; border-radius: 50%">

							<div class="form-group">
							    <input type="file" name="image" id="image">
							</div>
						@endif
					</div>
				    <div class="form-group">
				        {{ Form::label('name', 'Name') }}
				        {{ Form::text('name', null, array('class' => 'form-control')) }}
				    </div>

				    <div class="form-group">
				        {{ Form::label('email', 'Email') }}
				        {{ Form::email('email', null, array('class' => 'form-control')) }}
				    </div>

				    <div class="form-group">
				      	<a href="/home">{{ Form::button('Back', array('class' => 'btn btn-warning pull-left')) }}</a>
				    	{{ Form::submit('Save Changes', array('class' => 'btn btn-success pull-right')) }}

				    </div>
				    
				{{ Form::close() }}
			
		</div>
	</div>
</section>
@endsection