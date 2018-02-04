@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
	<h3><span class="text-semibold">Edit account</span></h3>
    @include('layouts.messages')
		<div>
			<div class="page-header-content"></div>
			<div class="breadcrumb-line breadcrumb-line-component">
				<ul class="breadcrumb">
					<li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
					<li><a href="/users">Employees</a></li>
					<li class="active">Edit account</li>
				</ul>
				<ul class="breadcrumb-elements">
					<li><a href="{{ route('register') }}"><i class="icon-user-plus position-left"></i> Add Employee</a></li>
					</ul>
			</div>
		</div>
		<div class="panel panel-flat">
			<div class="panel-heading">
					<h6 class="panel-title">Account information</h6><hr>
				</div>
			<div class="content">
				<form  method="POST" action="{{ url('updateaccount') }}">
                 {{ csrf_field() }}
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                        <label for="lastname" class="control-label">Surname</label>

                                        <div>
                                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{$user->lastname}}" required autofocus>

                                            @if ($errors->has('lastname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                             </span>
                                             @endif
                                        </div>
                                    </div>	
							</div>
							<div class="col-md-4">
								<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                        <label for="firstname" class="control-label">First name</label>

                                        <div>
                                            <input id="firstname" type="text" class="form-control" name="firstname" value="{{$user->firstname}}" required autofocus>

                                            @if ($errors->has('firstname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                             </span>
                                             @endif
                                        </div>
                                    </div>
							</div>
							<div class="col-md-4">
								<div class="form-group{{ $errors->has('middlename') ? ' has-error' : '' }}">
                                        <label for="middlename" class="control-label">Middle name</label>

                                        <div>
                                            <input id="middlename" type="text" class="form-control" name="middlename" value="{{$user->middlename}}" required autofocus>

                                            @if ($errors->has('middlename'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('middlename') }}</strong>
                                             </span>
                                             @endif
                                        </div>
                                    </div>
							</div>
						</div>
						<br><br>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                	<label for="position" class="control-label">Position</label>
                                	<div>
                                    	<select name="position">
                                        	<option value="Admin">Admin</option>
                                        	<option value="Director">Director</option>
                                        	<option value="Secretary">Secretary</option>
                                        	<option value="District Pastor">District Pastor</option>
                                    	</select>
                                    	@if ($errors->has('position'))
                                    	<span class="help-block">
                                        	<strong>{{ $errors->first('position') }}</strong>
                                    	</span>
                                    @endif
                                	</div>
                            	</div>
                            </div>
                       
                            <div class="col-md-5">
                                <div class="form-group{{ $errors->has('dept') ? ' has-error' : '' }}">
                                    <label for="dept" class="control-label">Department</label>
                                    <div>
                                        <select name="dept">
                                            <option value="0">All</option>
                                            <option value="1">Communication Department</option>
                                            <option value="2">Children's Ministries</option>
                                            <option value="3">Women's Ministries</option>
                                            <option value="4">Ministerial</option>
                                            <option value="5">Stewardship Ministries</option>
                                            <option value="6">Health Ministries</option>
                                            <option value="7">Personal Ministries</option>
                                        </select>
                                         @if ($errors->has('dept'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('dept') }}</strong>
                                            </span>
                                        @endif
                                  	</div>
                                </div>
                           	</div>
                           	<div class="col-md-3">
                                    <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                                        <label for="district" class="control-label">District</label>
                                        <div>
                                        <select name="district">
                                            <option value="All">All</option>
                                            <option value="District 1">District 1</option>
                                            <option value="District 2">District 2</option>
                                            <option value="District 3">District 3</option>
                                        </select>
                                         @if ($errors->has('district'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('district') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>
                            </div>
                        </div>
					</div>
					<div class="col-md-4">
						<div class="thumbnail ">
								<div class="thumb thumb-rounded thumb-slide">
									<img src="{{Storage::url(Auth::user()->profile_pic)}}" alt="">
									<div class="caption">
										<span>
											<a href="#" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
											<a href="#" class="btn bg-success-400 btn-icon btn-xs"><i class="icon-link"></i></a>
										</span>
									</div>
								</div>
							
						    	<div class="caption text-center">
						    		<h6 class="text-semibold no-margin">{{$user->firstname}} {{$user->middlename}} {{$user->lastname }}<small class="display-block">{{$user->position }}@if ($user->position == 'District Pastor') / {{$user->district}} @endif @if ($user->position == 'Director') / {{$dept[$profile->dept]}} @endif</small></h6>
						    	</div>
						    	<input type="hidden" name="id" value="{{$user->id}}">
					    </div>
                        <div>
                        <div class="text-right">
                        <button type="submit" class="btn bg-teal">Save <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                </div>
					</div>
				</div>
                
				</form>
			</div>
			@include('layouts.footer')	
		</div>
	</div>
<div>		
@endsection