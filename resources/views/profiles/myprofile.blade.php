@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
		<div class="page-title">
			<h4><span class="text-semibold">@if (Auth::user()->id == $user->id) My account @else {{$user->firstname}} {{$user->lastname}} @endif</span> - Profile</h4>
			<ul class="breadcrumb position-right">
				<li><a href="/home">Home</a></li>
				<li><a href="/myprofile/{{ Auth::user()->email }}">My account</a></li>
				<li class="active">Profile</li>
			</ul>
		</div>
				
		@include('layouts.messages')
		<div>
			<div class="navbar navbar-default navbar-component navbar-xs">
						<ul class="nav navbar-nav visible-xs-block">
							<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
						</ul>

						<div class="navbar-collapse collapse" id="navbar-filter">
							<ul class="nav navbar-nav">
								<li class="@if (Request::segment(3) != 'settings') {{'active'}} @endif"><a href="#activity" data-toggle="tab"><i class="icon-menu7 text-primary position-left"></i> Activity Log</a></li>
								<li><a href="#schedule" data-toggle="tab"><i class="  icon-profile text-success position-left"></i> About <span class="badge badge-success badge-inline position-right"></span></a></li>
								@if (Auth::user()->id == $user->id)
								<li class="@if (Request::segment(3) == 'settings') {{'active'}}  @endif"><a href="#settings" data-toggle="tab"><i class="icon-cog3 text-warning position-left"></i> Settings</a></li>
								@endif
							</ul>
						</div>
					</div>
					<div class="content">

					<!-- User profile -->
					<div class="row">
						<div class="col-lg-9">
							<div class="tabbable">
								<div class="tab-content">
									@foreach ($activities as $activity)
									<div class="tab-pane @if (Request::segment(3) == 'settings')) {{'fade in'}} 	@else {{'active in'}} @endif" id="activity">
										<div class="timeline timeline-left content-group">
											<div class="timeline-container">
												<div class="timeline-row">
													<div class="timeline-icon">
														<img src="{{Storage::url($activity->profile_pic)}}" alt="">
													</div>
													<div class="panel panel-flat timeline-content">
														<div class="panel-body">
															<a class="table-inbox-subject letter-icon-title text-default" @if ($activity->type < 1)
                                                href="/report/dept={{$activity->dept_id}}/{{$activity->link_id}}/{{$activity->id}}"
                                            @elseif ($activity->type < 2) 
                                                href="/announcements/{{$activity->link_id}}/{{$activity->id}}"
                                            @else
                                                href="/myprofile/{{$activity->link_id}}/{{$activity->id}}"
                                            @endif >
																{{$activity->firstname}} {{$activity->lastname}} {{$activity->content}}
																	<div class="media-annotation">@if ($activity->type < 1)
                                                <i class=" icon-file-plus text-warning"></i> @elseif ($activity->type < 2)<i class="icon-paperplane text-primary"></i> @else <i class="icon-profile text-success"></i> @endif{{$activity->created_at->diffForHumans()}} ...</div>

															</a>
														</div>
													</div>
												</div>
											</div>
									    </div>
									</div>
									@endforeach

									<div class="tab-pane fade" id="schedule">

										<!-- Available hours -->
										<div class="panel panel-flat">
											<div class="panel-heading">
												<h6 class="panel-title">Contact information</h6><hr>
											</div>

											<div class="panel-body">
													<div class="form-group">
														<div class="row">
															<div class="col-md-11 col-md-offset-1">
																<label class="media-annotation"><i class="icon-location3 position-left"></i>Address: </label>@if ($profile->address == '') None @else {{ $profile->address}} @endif<br>
																<label class="media-annotation"> <i class="icon-phone2 position-left"></i>Mobile phone: </label>@if ($profile->mobilenumber == '') None @else  {{ $profile->mobilenumber}} @endif<br>
																<label class="media-annotation"> <i class="icon-envelop3 position-left"></i>Email address: </label>{{ $user->email}}<br>
															</div>
														</div>
													</div>
											</div>

											<div class="panel-heading">
												<h6 class="panel-title">Basic information</h6><hr>
											</div>

											<div class="panel-body">
													<div class="form-group">
														<div class="row">
															<div class="col-md-11 col-md-offset-1">
																<label class="media-annotation"><i class="icon-heart6 position-left"></i>Civil status:</label>@if ($profile->status == '') None @else {{$profile->status}} @endif<br>
																<label class="media-annotation"><i class=" icon-calendar2 position-left"></i>Birth Date: </label>@if ($profile->birthday == '') None @else {{$profile->birthday}} @endif<br>
																<label class="media-annotation"><i class=" icon-circle position-left"></i>Gender: </label>@if ($profile->gender == '') None @elseif ($profile->gender < 2 ) Male @else Female @endif<br>
															</div>
														</div>
													</div>
											</div>


											
										</div>
										<!-- /available hours -->
										

									</div>
									<div class="tab-pane @if (Request::segment(3) == 'settings') {{'active in'}} @endif" id="settings">

										<!-- Profile info -->
										<div class="panel panel-flat">
											<div class="panel-heading">
												<h6 class="panel-title">Profile information</h6>
												<div class="heading-elements">
													<ul class="icons-list">
								                		<li><a data-action="collapse"></a></li>
								                	</ul>
							                	</div>
											</div>

											
											<div class="panel-body">
												
      											<form action="{{ route('profile') }}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
													<div class="form-group">
														<div class="row">
															<div class="col-md-4">
																<label>Surname</label>
																<input type="text" value="{{ $user->lastname}}" readonly="readonly" class="form-control">
															</div>
															<div class="col-md-4">
																<label>First name</label>
																<input type="text" value="{{ $user->firstname }}" readonly="readonly" name class="form-control">
															</div>
															<div class="col-md-4">
																<label>Middle name</label>
																<input type="text" value="{{ $user->middlename }}" readonly="readonly" class="form-control">
															</div>
															
															
															
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-md-5">
																<label>Birthday</label>
																<input type="date" value="{{ $profile->birthday }}" name="birthday" class="form-control">
															</div>
															<div class="col-md-7">
																<label>Address</label>
																<input type="text" name="address" value="{{ $profile->address }}" class="form-control">
															</div>
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-md-4">
																<label>Phone #</label>
																<input type="number" value="{{ $profile->mobilenumber }}" class="form-control" name="phone">
															</div>

															<div class="col-md-4 form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                        						<label for="status" class="col-md-7 control-label">Civil Status</label>
                                        						<div class="col-md-12">
                                        							<select name="status">
                                            							<option value="Single">Single</option>
                                            							<option value="Married">Married</option>
                                            							<option value="Seperated">Seperated</option>
                                            							<option value="Widowed">Widowed</option>
                                        							</select>
                                         							@if ($errors->has('status'))
                                            						<span class="help-block">
                                                						<strong>{{ $errors->first('status') }}</strong>
                                            						</span>
                                       								 @endif
                                        						</div>
                                    						</div>

															<div class="col-md-4 form-group">
																<label class="display-block">Gender:</label>

																<label >
																	<input type="radio" name="gender" value="1" @if ($profile->gender == 1) checked @endif>
																		Male
																</label>

																<label >
																	<input type="radio" name="gender" value="2" @if ($profile->gender == 2) checked @endif>
																		Female
																</label>
															</div>
															
														</div>
													</div>

							                        <div class="form-group">
							                        	<div class="row">
															<div class="col-md-6">
																<label class="display-block">Update your Profile Image</label>
							                                    <input type="file" class="file-styled" name="profilepicture" accept="image/">
							                                    <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
															</div>
							                        	</div>
							                        </div>	
							                        <div class="text-right">
							                        	<button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
							                        </div>
                                                </form>
											</div>
											
										</div>
										<!-- /profile info -->


										<!-- Account settings -->
										<div class="panel panel-flat">
											<div class="panel-heading">
												<h6 class="panel-title">Change Password</h6>
												<div class="heading-elements">
													<ul class="icons-list">
								                		<li><a data-action="collapse"></a></li>>
								                	</ul>
							                	</div>
											</div>

											<form method="POST" action="{{ url('change/password') }}">
												{{ csrf_field() }}
											<div class="panel-body">
													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group{{ $errors->has('passwordold') ? ' has-error' : '' }}">
                            										<label for="password" class="control-label">Old Password</label>

                            										<div>
                                										<input id="password" type="password" class="form-control" name="passwordold" required>

                                										@if ($errors->has('passwordold'))
                                    									<span class="help-block">
                                        									<strong>{{ $errors->first('passwordold') }}</strong>
                                    									</span>
                                										@endif
                            										</div>
                       											</div>
															</div>
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            										<label for="password" class="control-label">New Password</label>

                            										<div>
                                										<input id="password" type="password" class="form-control" name="password" required>

                                										@if ($errors->has('password'))
                                    									<span class="help-block">
                                        								<strong>{{ $errors->first('password') }}</strong>
                                    									</span>
                                										@endif
                            										</div>
                        										</div>
															</div>

															<div class="col-md-6">
																<div class="form-group">
                            										<label for="password-confirm" class="control-label">Confirm Password</label>

                            										<div>
                                										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            										</div>
                        										</div>
															</div>
														</div>
													</div>


							                        <div class="text-right">
							                        	<button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
							                        </div>
						            
											</div>
											</form>
										</div>
										<!-- /account settings -->

									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3">

							<!-- User thumbnail -->
							<div class="thumbnail ">
								<div class="thumb thumb-rounded thumb-slide">
									<img src="{{Storage::url(Auth::user()->profile_pic)}}" alt="">
									<div class="caption">
										<span>
											<a href="#" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
											<a href="user_pages_profile.html" class="btn bg-success-400 btn-icon btn-xs"><i class="icon-link"></i></a>
										</span>
									</div>
								</div>
							
						    	<div class="caption text-center">
						    		<h6 class="text-semibold no-margin">{{$user->firstname}} {{$user->middlename}} {{$user->lastname }}<small class="display-block">{{$user->position }}@if ($user->position == 'District Pastor') / {{$user->district}} @endif</small></h6>
						    	</div>
					    	</div>
					    	<!-- /user thumbnail -->

							

						</div>
					</div>
					<!-- /user profile -->
				</div>
				<!-- /content area -->

		@include('layouts.footer')
		</div>
	</div>
</div>
<script type="text/javascript" src="{{asset('js/pages/user_pages_profile.js')}}"></script>
@endsection
