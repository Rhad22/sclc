@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
		{{--  <div class="page-title">  --}}
			<h4><span class="text-semibold">My account</span> - Profile</h4>
			<ul class="breadcrumb position-right">
				<li><a href="/home">Home</a></li>
				<li><a href="/myprofile">My account</a></li>
				<li class="active">Profile</li>
			</ul>
		{{--  </div>  --}}
				
		@include('layouts.messages')
		<div>
			<div class="navbar navbar-default navbar-component navbar-xs">
						<ul class="nav navbar-nav visible-xs-block">
							<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
						</ul>

						<div class="navbar-collapse collapse" id="navbar-filter">
							<ul class="nav navbar-nav">
								<li class="@if (Request::segment(1) == 'myprofile')) {{'active'}} @endif"><a href="#activity" data-toggle="tab"><i class="icon-menu7 position-left"></i> Activity</a></li>
								<li><a href="#schedule" data-toggle="tab"><i class="icon-calendar3 position-left"></i> About <span class="badge badge-success badge-inline position-right">32</span></a></li>
								<li class="@if (Request::segment(3) == 'settings') {{'active'}}  @endif"><a href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i> Settings</a></li>
							</ul>
						</div>
					</div>

					{{--  /  --}}
					<div class="content">

					<!-- User profile -->
					<div class="row">
						<div class="col-lg-9">
							<div class="tabbable">
								<div class="tab-content">
									<div class="tab-pane @if (Request::segment(3) == 'settings')) {{'fade in'}} @else {{'active in'}} @endif" id="activity">

										<!-- Timeline -->
										<div class="timeline timeline-left content-group">
											<div class="timeline-container">

												<!-- Sales stats -->
												<div class="timeline-row">
													<div class="timeline-icon">
														<a href="#"><img src="{{Storage::url(Auth::user()->profile_pic)}}"></a>
													</div>

													<div class="panel panel-flat timeline-content">
														<div class="panel-heading">
															<h6 class="panel-title">Daily statistics</h6>
															<div class="heading-elements">
																<span class="heading-text"><i class="icon-history position-left text-success"></i> Updated 3 hours ago</span>

																<ul class="icons-list">
											                		<li><a data-action="reload"></a></li>
											                	</ul>
										                	</div>
														</div>

														<div class="panel-body">
															<div class="chart-container">
																<div class="chart has-fixed-height" id="sales"></div>
															</div>
														</div>
													</div>
												</div>
												<!-- /sales stats -->
											</div>
									    </div>
									    <!-- /timeline -->

									</div>


									<div class="tab-pane fade" id="schedule">

										<!-- Available hours -->
										<div class="panel panel-flat">
											<div class="panel-heading">
												<h6 class="panel-title">Available hours</h6>
												<div class="heading-elements">
													<ul class="icons-list">
								                		<li><a data-action="collapse"></a></li>
								                		<li><a data-action="reload"></a></li>
								                		<li><a data-action="close"></a></li>
								                	</ul>
							                	</div>
											</div>

											<div class="panel-body">
												<div class="chart-container">
													<div class="chart has-fixed-height" id="plans"></div>
												</div>
											</div>
										</div>
										<!-- /available hours -->


										<!-- Calendar -->
										<div class="panel panel-flat">
											<div class="panel-heading">
												<h6 class="panel-title">My schedule</h6>
												<div class="heading-elements">
													<ul class="icons-list">
								                		<li><a data-action="collapse"></a></li>
								                		<li><a data-action="reload"></a></li>
								                		<li><a data-action="close"></a></li>
								                	</ul>
							                	</div>
											</div>

											<div class="panel-body">
												<div class="schedule"></div>
											</div>
										</div>
										<!-- /calendar -->

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
												
      											
													<div class="form-group">
														<div class="row">
															<div class="col-md-4">
																<label>Surname</label>
																<input type="text" value="{{ $user->lastname}}" class="form-control">
															</div>
															<div class="col-md-4">
																<label>First name</label>
																<input type="text" value="{{ $user->firstname }}" name class="form-control">
															</div>
															<div class="col-md-4">
																<label>Middle name</label>
																<input type="text" value="{{ $user->middlename }}" class="form-control">
															</div>
															
															
															
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-md-5">
																<label>Birthday</label>
																<input type="date" value="{{ $profile->birthday }}" class="form-control">
															</div>
															<div class="col-md-7">
																<label>Address</label>
																<input type="text" name="address" value="{{ $profile->address }}" class="form-control">
															</div>
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<label>Phone #</label>
																<input type="number" value="{{ $profile->mobilenumber }}" class="form-control">
															</div>

															<div class="form-group">
																<label class="display-block">Gender:</label>

																<label >
																	<input type="radio" name="gender" @if ($profile->gender == 1) checked @endif>
																		Male
																</label>

																<label >
																	<input type="radio" name="gender" @if ($profile->gender == 2) checked @endif>
																		Female
																</label>
															</div>
															
														</div>
													</div>

							                        <div class="form-group">
							                        	<div class="row">
															<div class="col-md-6">
																<label class="display-block">Upload profile image</label>
							                                    <input type="file" class="file-styled" accept="image/*">
							                                    <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
															</div>
							                        	</div>
							                        </div>	
							                        <div class="text-right">
							                        	<button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
							                        </div>
												
											</div>
											
										</div>
										<!-- /profile info -->


										<!-- Account settings -->
										<div class="panel panel-flat">
											<div class="panel-heading">
												<h6 class="panel-title">Account settings</h6>
												<div class="heading-elements">
													<ul class="icons-list">
								                		<li><a data-action="collapse"></a></li>>
								                	</ul>
							                	</div>
											</div>

											<div class="panel-body">
												<form action="#">
													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<label>Email</label>
																<input type="text" value="{{ Auth::user()->email }}" readonly="readonly" class="form-control">
															</div>

														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<label>New password</label>
																<input type="password" placeholder="Enter new password" class="form-control">
															</div>

															<div class="col-md-6">
																<label>Repeat password</label>
																<input type="password" placeholder="Repeat new password" class="form-control">
															</div>
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<label>Notifications</label>

																<div class="checkbox">
																	<label>
																		<input type="checkbox" class="styled" checked="checked">
																		New message notification
																	</label>
																</div>
																<div class="checkbox">
																	<label>
																		<input type="checkbox" class="styled" checked="checked">
																		New task notification
																	</label>
																</div>
															</div>
														</div>
													</div>

							                        <div class="text-right">
							                        	<button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
							                        </div>
						                        </form>
											</div>
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
						    		<h6 class="text-semibold no-margin">{{ Auth::user()->firstname .' '. Auth::user()->lastname }}<small class="display-block">{{ Auth::user()->position }}</small></h6>
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
