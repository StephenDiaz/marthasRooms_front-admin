@extends('layouts.master')
@section('content')
<section class="content-header">
	<ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Guest</a></li>
	    <li class="active">User Profile</li>
	</ol>
</section>
<section class="content ontainer-fluid">
	<h3 class="text-info">{{$user->name}}'s Profile</h3>
	<div class="box box-info">
		<div class="box-body">
			
				{{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) }}
					<div class="form-group">
						<div class="col-md-12">
							<div class="col-md-10">
								@if($user->image == null)
									<img src="{{asset('userImage/temporary.png')}}"  class="rounded" alt="user image"/>
									<div class="form-group">
									    <input type="file" name="image" id="image">
									</div>

								@else
								  	<img src="{{asset('userImage/{$user->image}')}}"  class="rounded" alt="user image"/>

									<div class="form-group">
									    <input type="file" name="image" id="image">
									</div>
								@endif
							</div>
							<div class="col-md-2">
								 <div class="form-group">
							       	{{ Form::label('acctStat', 'Account Status') }}
			        				{{ Form::select('acctStat', array('enabled' => 'Enable', 'disabled' => 'Disable'), null, array('class' => 'form-control')) }}
							    </div>
							</div>
							
						</div>
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
				       	{{ Form::label('role', 'Role') }}
        				{{ Form::select('role', array('0' => 'Select a role', 'admin' => 'Admin', 'frontDesk' => 'Front Desk'), null, array('class' => 'form-control')) }}
				    </div>

				    
				    <a href="{{url('user')}}">{{ Form::button('Back', array('class' => 'btn btn-warning pull-left')) }}</a>
				    {{ Form::submit('Save Changes', array('class' => 'btn btn-success pull-right')) }}

				{{ Form::close() }}
			
		</div>
	</div>
</section>
@endsection