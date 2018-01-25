<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Global stylesheets -->
	<link href="{{asset('css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/colors.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{asset('js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/core/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/pages/chat_layouts.js')}}"></script>

	<script type="text/javascript" src="{{asset('js/plugins/ui/ripple.min.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body class="sidebar-xs">

	
			<!-- Main navbar -->
	<div class="navbar navbar-default navbar-static-top header-highlight">
		<div class="navbar-header">
			<a class="navbar-brand" href="/home"><img src="{{asset('images/adventist.png')}}" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
				<li><a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
				<li><a class="sidebar-control sidebar-secondary-hide hidden-xs"><i class="icon-transmission"></i></a></li>
			</ul>

			<div class="navbar-right">
				<p class="navbar-text">Welcome, {{ Auth::user()->firstname }}</p>
				<p class="navbar-text"><span class="label bg-success">Online</span></p>
				
				<ul class="nav navbar-nav">				
					<li class="dropdown">
    					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    						<i class="icon-puzzle3"></i>
    						<span class="visible-xs-inline-block position-right">Announcements</span>
    						{{--  @if (count($reportnotifications) > 0) <span class="status-mark border-pink-300"></span> @endif   --}}
    					</a>

    					<div class="dropdown-menu dropdown-content">
    						<div class="dropdown-content-heading">
    							Announcements
    							<ul class="icons-list">
    								<li><a href="#"><i class="icon-sync"></i></a></li>
    							</ul>
    						</div>
							
    						<ul class="media-list dropdown-content-body width-350">
    							{{--  @if (count($reportnotifications) > 0)
								@foreach ($reportnotifications as $reportnotification)
                                    @if ($reportnotification->to == 'all')
                                        @if (Auth::user()->id !== $reportnotification->user_id)
    								        <li class="media">
                                                <div @include('layouts.reportnotification')>
    									            <div class="media-left">
    										            <a href="#" ><img src="{{asset('images/demo/users/face23.jpg')}}" class="img-circle img-lg" alt=""></a>
    									            </div>
    									            <div class="media-body" >
    										        <a href="#">{{$reportnotification->from}}</a> posted an announcement
    										        <div class="media-annotation">{{$reportnotification->created_at}}</div>
    									            </div>
                                                </div> 
    								        </li> 
                                        @endif
                                    @endif
								@endforeach
								@endif  --}}
    						</ul>

    						<div class="dropdown-content-footer">
    							<a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
    						</div>
    					</div>
    				    </li>
                        {{--  @if (Auth::user()->user_postion !== 'District Pastor')
    					<li class="dropdown">
    						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    							<i class="icon-bell2"></i>
    							<span class="visible-xs-inline-block position-right">Notification</span>
    							@if (count($reportnotifications) > 0)<span class="status-mark border-pink-300"></span> @endif
    						</a>
    						<div class="dropdown-menu dropdown-content">
    							<div class="dropdown-content-heading">
    								Notification
    								<ul class="icons-list">
    									<li data-popup="tooltip" data-placement="left" id="left" data-original-title="Mark all as read"><a href="#"><i class=" icon-folder-check"></i></a></li>
    								</ul>
    							</div>
    							<ul class="media-list dropdown-content-body width-350">
									@if (count($reportnotifications) > 0)
									    @foreach ($reportnotifications as $reportnotification)
                                            @if (Auth::user()->user_postion !== 'District Pastor')
                                                @if ($reportnotification->to !== 'all')
                                                    @if (Auth::user()->department == $reportnotification->to)
    								                        <li class="media">
                                                                <div @include('layouts.reportnotification')>
    									                            <div class="media-left">
    										                            <a href="#" ><img src="{{asset('images/demo/users/face23.jpg')}}" class="img-circle img-lg" alt=""></a>
    									                            </div>
    									                            <div class="media-body" >
    										                            <a href="#">{{$reportnotification->from}}</a> sent a report 
    										                            <div class="media-annotation">{{$reportnotification->created_at->diffForHumans()}}</div>
    									                            </div>
                                                                </div> 
    								                        </li>
                                                    @elseif (Auth::user()->user_postion == 'Admin')
                                                        <li class="media">
                                                            <div @include('layouts.reportnotification')>
    									                        <div class="media-left">
    										                        <a href="#" ><img src="{{asset('images/demo/users/face23.jpg')}}" class="img-circle img-lg" alt=""></a>
    									                        </div>
    									                        <div class="media-body" >
    										                        <a href="#">{{$reportnotification->from}}</a> sent a report in {{$reportnotification->department}}
    										                        <div class="media-annotation">{{$reportnotification->created_at->diffForHumans()}}</div>
    									                        </div>
                                                            </div> 
    								                    </li> 
                                                        
                                                    @endif
                                                @endif
                                            @endif
										@endforeach
									@endif   
    							</ul>
                                <div class="dropdown-content-footer">
    							    <a href="#" data-popup="tooltip" title="" data-original-title="See all"><i class="icon-menu display-block"></i></a>
    						    </div>
    						</div>
    					</li>
						@endif  --}}
						{{--  Messages  --}}
    					<li class="dropdown">
    						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    							<i class="icon-bubble8"></i>
    							<span class="visible-xs-inline-block position-right">Messages</span>
    							<span class="status-mark border-pink-300"></span>
    						</a>

    						<div class="dropdown-menu dropdown-content width-350">
    							<div class="dropdown-content-heading">
    								Messages
    								<ul class="icons-list">
    									<li><a href="#"><i class="icon-compose"></i></a></li>
    								</ul>
    							</div>

    							<ul class="media-list dropdown-content-body">
    								
    							</ul>

    							<div class="dropdown-content-footer">
    								<a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
    							</div>
    						</div>
    					</li>					
				</ul>
			</div>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
    			<div class="sidebar sidebar-main">
                    <div class="sidebar-content">

                        <!-- User menu -->
                        

                        <div class="sidebar-user-material">
                            <div class="category-content">
                                <div class="sidebar-user-material-content">
                                    <div class="media-left">
                                            <a href="/myprofile"><img src="{{Storage::url(Auth::user()->profile_pic)}}" class="img-circle img-lg" alt=""></a>
                                        </div>
                                        <div class="media-body">
                                            <span class="media-heading text-semibold">{{ Auth::user()->firstname .' '. Auth::user()->lastname  }}</span>
                                            <div class="text-size-mini text-muted">
                                            <i class="icon-price-tag2"></i> &nbsp; {{ Auth::user()->position }}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="sidebar-user-material-menu">
                                    <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                                </div>
                            </div>

                            <div class="navigation-wrapper collapse" id="user-nav">
                                <ul class="navigation">
                                    <li><a href="/myprofile/{{ Auth::user()->email }}"><i class="icon-user"></i> <span>My profile</span></a></li>
                                    <li class="divider"></li>
                                    <li><a href="/myprofile/{{ Auth::user()->email }}/settings"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> <span>
                                            Logout</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /user menu -->


                        <!-- Main navigation -->
                        <div class="sidebar-category sidebar-category-visible">
                            <div class="category-content no-padding">
                                <ul class="navigation navigation-main navigation-accordion">

                                    <!-- Main -->
                                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                                    <li><a href="/"><i class="icon-stats-dots"></i> <span>Dashboard</span></a></li>
                                    @if (Auth::user()->position == 'Admin')
                                    <li><a href="/users"><i class="icon-users4"></i> <span>Employee</span></a></li>
                                    @endif
                                    <li>
                                        <a href="/announcements"><i class="icon-newspaper"></i> <span>Announcements 
                                        {{--  @if ($unread > 0)<span class="label bg-green-400">{{$unread}}</span> @endif  --}}
                                        </span></a>
                                    </li>
                                    
                                    @if (Auth::user()->position == 'Admin')
                                    <li>
                                        <a><i class="icon-stack2"></i> <span>Department and Ministries</span></a>
                                        <ul>
                                            <li><a href="/report/dept=1">Communication Department</a></li>
                                            <li><a href="/report/dept=2">Children's Ministries</a></li>
                                            <li><a href="/report/dept=3">Women's Ministries</a></li>
                                            <li><a href="/report/dept=4">Ministerial</a></li>
                                            <li><a href="/report/dept=5">Stewardship Ministries</a></li>
                                            <li><a href="/report/dept=6">Health Ministries</a></li>
                                            <li><a href="/report/dept=7">Personal Ministries</a></li>
                                        </ul>
                                    </li>
                                    @elseif (Auth::user()->position == 'District Pastor')
                                    <li>
                                        <a><i class="icon-stack2"></i> <span>Department and Ministries</span></a>
                                        <ul>
                                            <li><a href="/report/dept=1">Communication Department</a></li>
                                            <li><a href="/report/dept=2">Children's Ministries</a></li>
                                            <li><a href="/report/dept=3">Women's Ministries</a></li>
                                            <li><a href="/report/dept=4">Ministerial</a></li>
                                            <li><a href="/report/dept=5">Stewardship Ministries</a></li>
                                            <li><a href="/report/dept=6">Health Ministries</a></li>
                                            <li><a href="/report/dept=7">Personal Ministries</a></li>
                                        </ul>
                                    </li>    
                                    @else
                                         @for ($i = 0; $i < 8; $i++)
                                        @if (Auth::user()->position == 'Director of '.$dept[$i] )
                                    <li><a href="/report/dept={{$sidebar}}"><i class="icon-stack2"></i> <span>{{$dept[$sidebar]}}</span></a></li>
                                        @endif  
                                    @endfor
                                    @endif
                                    <li>
                                        <a href="/messenger.chatbox"><i class="icon-comment-discussion"></i> <span>Messages<span class="label bg-blue-400">8</span></span></a>
                                    </li>
                                    <li>
                                        <a href="/notif"><i class="icon-bell2"></i> <span>Notifications<span class="label bg-orange-400">15</span></span></a> 
                                    </li>
                                    <!-- /main -->
                                </ul>
                            </div>
                        </div>
                        <!-- /main navigation -->
                    </div>
                </div>
			<!-- /main sidebar -->


			<!-- Secondary sidebar -->
			<div class="sidebar sidebar-secondary sidebar-default">
				<div class="sidebar-content">

					<!-- Actions -->
					<div class="sidebar-category">
						<div class="category-title">
							<span>Actions</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content">
							<a href="#" class="btn bg-teal-400 btn-rounded btn-block btn-xs">New message</a>
						</div>
					</div>
					<!-- /actions -->

					<!-- Latest messages -->
					<div class="sidebar-category">
						<div class="category-title">
							<span>Latest messages</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content no-padding">
							<ul class="media-list media-list-linked">
								<li class="media">
									<a href="#" class="media-link">
										<div class="media-left"><img src="{{asset('images/default.jpg')}}" class="img-circle" alt=""></div>
										<div class="media-body">
											<span class="media-heading text-semibold">Will Samuel</span>
											<span class="text-muted">And he looked over at the alarm clock, ticking..</span>
										</div>
									</a>
								</li>

								<li class="media">
									<a href="#" class="media-link">
										<div class="media-left"><img src="{{asset('images/default.jpg')}}" class="img-circle" alt=""></div>
										<div class="media-body">
											<span class="media-heading text-semibold">Margo Baker</span>
											<span class="text-muted">However hard he threw himself onto..</span>
										</div>
									</a>
								</li>

								<li class="media">
									<a href="#" class="media-link">
										<div class="media-left"><img src="{{asset('images/default.jpg')}}" class="img-circle" alt=""></div>
										<div class="media-body">
											<span class="media-heading text-semibold">Monica Smith</span>
											<span class="text-muted">Yes, but was it spanossible to quietly sleep through..</span>
										</div>
									</a>
								</li>

								<li class="media">
									<a href="#" class="media-link">
										<div class="media-left"><img src="{{asset('images/default.jpg')}}" class="img-circle" alt=""></div>
										<div class="media-body">
											<span class="media-heading text-semibold">Jordana Mills</span>
											<span class="text-muted">What should he do now? The next train went at..</span>
										</div>
									</a>
								</li>

								<li class="media">
									<a href="#" class="media-link">
										<div class="media-left"><img src="{{asset('images/default.jpg')}}" class="img-circle" alt=""></div>
										<div class="media-body">
											<span class="media-heading text-semibold">John Craving</span>
											<span class="text-muted">Gregor then turned to look out the window..</span>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /latest messages -->

				</div>
			</div>
			<!-- /secondary sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h3><span class="text-semibold">Messenger</span></h3>
						</div>
					</div>

					<div class="breadcrumb-line breadcrumb-line-component">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Conversation</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic layout -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h6 class="panel-title">User name</h6>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="reload"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							<ul class="media-list chat-list content-group">
								<li class="media date-step">
									<span>Monday, Feb 10</span>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="assets/images/demo/images/3.png">
											<img src="{{asset('images/default.jpg')}}" class="img-circle" alt="">
										</a>
									</div>

									<div class="media-body">
										<div class="media-content">Below mounted advantageous spread yikes bat stubbornly crud a and a excepting</div>
										<span class="media-annotation display-block mt-10">Mon, 9:54 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
									</div>
								</li>

								<li class="media reversed">
									<div class="media-body">
										<div class="media-content">Far squid and that hello fidgeted and when. As this oh darn but slapped casually husky sheared that cardinal hugely one and some unnecessary factiously hedgehog a feeling one rudely much but one owing sympathetic regardless more astonishing evasive tasteful much.</div>
										<span class="media-annotation display-block mt-10">Mon, 10:24 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
									</div>

									<div class="media-right">
										<a href="assets/images/demo/images/3.png">
											<img src="{{Storage::url(Auth::user()->profile_pic)}}" class="img-circle" alt="">
										</a>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="assets/images/demo/images/3.png">
											<img src="{{asset('images/default.jpg')}}" class="img-circle" alt="">
										</a>
									</div>

									<div class="media-body">
										<div class="media-content">Darn over sour then cynically less roadrunner up some cast buoyant. Macaw krill when and upon less contrary warthog jeez some koala less since therefore minimal.</div>
										<span class="media-annotation display-block mt-10">Mon, 10:56 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
									</div>
								</li>

								<li class="media reversed">
									<div class="media-body">
										<div class="media-content">Some upset impious a and submissive when far crane the belched coquettishly. More the puerile dove wherever</div>
										<span class="media-annotation display-block mt-10">Mon, 11:29 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
									</div>

									<div class="media-right">
										<a href="assets/images/demo/images/3.png">
											<img src="{{Storage::url(Auth::user()->profile_pic)}}" class="img-circle" alt="">
										</a>
									</div>
								</li>

								<li class="media date-step">
									<span>Yesterday</span>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="assets/images/demo/images/3.png">
											<img src="{{asset('images/default.jpg')}}" class="img-circle" alt="">
										</a>
									</div>

									<div class="media-body">
										<div class="media-content">Regardless equitably hello heron glum cassowary jocosely before reliably a jeepers wholehearted shuddered more that some where far by koala.</div>
										<span class="media-annotation display-block mt-10">Tue, 6:40 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="assets/images/demo/images/3.png">
											<img src="{{asset('images/default.jpg')}}" class="img-circle" alt="">
										</a>
									</div>

									<div class="media-body">
										<div class="media-content">Crud reran and while much withdrew ardent much crab hugely met dizzily that more jeez gent equivalent unsafely far one hesitant so therefore.</div>
										<span class="media-annotation display-block mt-10">Tue, 10:28 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
									</div>
								</li>

								<li class="media reversed">
									<div class="media-body">
										<div class="media-content">Thus superb the tapir the wallaby blank frog execrably much since dalmatian by in hot. Uninspiringly arose mounted stared one curt safe</div>
										<span class="media-annotation display-block mt-10">Tue, 8:12 am <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
									</div>

									<div class="media-right">
										<a href="assets/images/demo/images/3.png">
											<img src="{{Storage::url(Auth::user()->profile_pic)}}" class="img-circle" alt="">
										</a>
									</div>
								</li>

								<li class="media date-step">
									<span>Today</span>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="assets/images/demo/images/3.png">
											<img src="{{asset('images/default.jpg')}}" class="img-circle" alt="">
										</a>
									</div>

									<div class="media-body">
										<div class="media-content">Tolerantly some understood this stubbornly after snarlingly frog far added insect into snorted more auspiciously heedless drunkenly jeez foolhardy oh.</div>
										<span class="media-annotation display-block mt-10">Wed, 4:20 pm <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
									</div>
								</li>

								<li class="media reversed">
									<div class="media-body">
										<div class="media-content">Satisfactorily strenuously while sleazily dear frustratingly insect menially some shook far sardonic badger telepathic much jeepers immature much hey.</div>
										<span class="media-annotation display-block mt-10">2 hours ago <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
									</div>

									<div class="media-right">
										<a href="assets/images/demo/images/3.png">
											<img src="{{Storage::url(Auth::user()->profile_pic)}}" class="img-circle" alt="">
										</a>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="assets/images/demo/images/3.png">
											<img src="{{asset('images/default.jpg')}}" class="img-circle" alt="">
										</a>
									</div>

									<div class="media-body">
										<div class="media-content">Grunted smirked and grew less but rewound much despite and impressive via alongside out and gosh easy manatee dear ineffective yikes.</div>
										<span class="media-annotation display-block mt-10">13 minutes ago <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
									</div>
								</li>

								<li class="media reversed">
									<div class="media-body">
										<div class="media-content"><i class="icon-menu display-block"></i></div>
									</div>

									<div class="media-right">
										<a href="assets/images/demo/images/3.png">
											<img src="{{Storage::url(Auth::user()->profile_pic)}}" class="img-circle" alt="">
										</a>
									</div>
								</li>
							</ul>

	                    	<textarea name="enter-message" class="form-control content-group" rows="3" cols="1" placeholder="Enter your message..."></textarea>

	                    	<div class="row">
	                    		<div class="col-xs-6">
		                        	<ul class="icons-list icons-list-extended mt-10">
		                                <li><a href="#" data-popup="tooltip" title="Send photo" data-container="body"><i class="icon-file-picture"></i></a></li>
		                            	<li><a href="#" data-popup="tooltip" title="Send video" data-container="body"><i class="icon-file-video"></i></a></li>
		                                <li><a href="#" data-popup="tooltip" title="Send file" data-container="body"><i class="icon-file-plus"></i></a></li>
		                            </ul>
	                    		</div>

	                    		<div class="col-xs-6 text-right">
		                            <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-circle-right2"></i></b> Send</button>
	                    		</div>
	                    	</div>
						</div>
					</div>
					<!-- /basic layout -->

					@include('layouts.footer')
					
				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>

<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/chat_layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Mar 2017 06:14:56 GMT -->
</html>
