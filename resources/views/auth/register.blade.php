@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
	<h3><span class="text-semibold"> Users</span></h3>
    @include('layouts.messages')
		<div>
			<div class="page-header-content"></div>
				<div class="breadcrumb-line breadcrumb-line-component">
					<ul class="breadcrumb">
						<li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
						<li><a href="/users">Users</a></li>
						<li class="active">Add user</li>
					</ul>
				</div>
			</div>

            <div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title">User information</h6>
					<div class="heading-elements">
						<ul class="icons-list">
							<li><a data-action="collapse"></a></li>
						</ul>
					</div>
				</div>						
			

            <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                        <label for="lastname" class="col-md-4 control-label">Surname</label>

                                        <div class="col-md-12">
                                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('surname') }}" required autofocus>

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
                                        <label for="firstname" class="col-md-4 control-label">First name</label>

                                        <div class="col-md-12">
                                            <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

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
                                        <label for="middlename" class="col-md-4 control-label">Middle name</label>

                                        <div class="col-md-12">
                                            <input id="middlename" type="text" class="form-control" name="middlename" value="{{ old('middlename') }}" required autofocus>

                                            @if ($errors->has('middlename'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('middlename') }}</strong>
                                             </span>
                                             @endif
                                        </div>
                                    </div>
								</div>
							</div>
						</div>

                        <div class="form-group">
							<div class="row">
								<div class="col-md-4">
                                    <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
							            <label for="position" class="col-md-5 control-label">Position</label>
                                        <div class="col-md-8">
                                        <select name="position">
								            <option value="Admin">Admin</option>
								            <option value="Director">Director</option>
                                            <option value="District Pastor">Secretary</option>
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

                                <div class="col-md-4">
                                     <div class="form-group{{ $errors->has('dept') ? ' has-error' : '' }}">
							            <label for="dept" class="col-md-4 control-label">Department</label>
                                            <div class="col-md-9">
                                                <label>
                                                    <input type="checkbox" name="dept" value="0">  All<br>
                                                    <input type="checkbox" name="dept" value="1">  Children's Ministries<br>
                                                    <input type="checkbox" name="dept" value="2">  Communication Department<br>
                                                    <input type="checkbox" name="dept" value="3">  Women's Ministries<br>
                                                    <input type="checkbox" name="dept" value="4">  Ministerial<br>
                                                    <input type="checkbox" name="dept" value="5">  Stewardship Ministries<br>
                                                    <input type="checkbox" name="dept" value="6">  Health Ministries<br>
                                                    <input type="checkbox" name="dept" value="7">  Personal Ministries<br>
                                                </label>
                                                 @if ($errors->has('dept'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('dept') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
						            </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-2 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-2 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
			
			
		</div>
		@include('layouts.footer')
	</div>
<div>



   
</div>
                
           

@endsection
