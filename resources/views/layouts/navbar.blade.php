<div class="navbar navbar-default header-highlight">
    <div class="navbar-header">
    	<a class="navbar-brand" href="/home"><img src="{{asset('images/adventist.png')}}" alt=""></a>
			{{-- dark green  #004d40  --}}
    	<ul class="nav navbar-nav visible-xs-block">
    		<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
    		<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
    	</ul>
    </div>
    <div class="navbar-collapse collapse" id="navbar-mobile">
    	<ul class="nav navbar-nav">
    		<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
    	</ul>
    	<div class="navbar-right">
    		<p class="navbar-text">Welcome, {{ Auth::user()->firstname }}</p>
    		<p class="navbar-text"><span class="label bg-success">Online</span></p>
			{{--  Notifications  --}}
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
    								<li class="media">
    									<div class="media-left">
    										<img src="public/images/demo/users/face10.jpg" class="img-circle img-sm" alt="">
    										<span class="badge bg-danger-400 media-badge">5</span>
    									</div>

    									<div class="media-body">
    										<a href="#" class="media-heading">
    											<span class="text-semibold">James Alexander</span>
    											<span class="media-annotation pull-right">04:58</span>
    										</a>

    										<span class="text-muted">who knows, maybe that would be the best thing for me...</span>
    									</div>
    								</li>
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
									<li><a href="/users"><i class="icon-users4"></i> <span>Users</span></a></li>
									<li>
    									<a href="/announcements"><i class="icon-newspaper"></i> <span>Announcements 
										{{--  @if ($unread > 0)<span class="label bg-green-400">{{$unread}}</span> @endif  --}}
										</span></a>
    								</li>
    								<li>
    									<a href="/reports"><i class="icon-stack2"></i> <span>Department and Ministries</span></a>
    									<ul>
											<li><a href="/communication">Communication Department</a></li>
											<li><a href="/">Children's Ministries</a></li>
    										<li><a href="#">Women's Ministries</a></li>
    										<li><a href="#">Ministerial</a></li>
    										<li><a href="#">Stewardship Ministries</a></li>
    										<li><a href="#">Health Ministries</a></li>
    										<li><a href="#">Personal Ministries</a></li>
    									</ul>
    								</li>
									<li>
    									<a href="/messages"><i class="icon-comment-discussion"></i> <span>Messages<span class="label bg-blue-400">8</span></span></a>
    								</li>
    								<li>
    									<a href="/reportnotifications"><i class="icon-bell2"></i> <span>Notifications<span class="label bg-orange-400">15</span></span></a>	
    								</li>
    								<!-- /main -->
    							</ul>
    						</div>
    					</div>
    					<!-- /main navigation -->
    				</div>
    			</div>
