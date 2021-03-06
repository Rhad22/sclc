<!-- Main navbar -->
    <div class="navbar navbar-default navbar-static-top header-highlight">
        <div class="navbar-header">
            <a class="navbar-brand" href="/home"><img src="{{asset('images/adventist.png')}}" alt=""></a>

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
                
                <ul class="nav navbar-nav">             
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <i class="icon-bell2 @if (count($notifies)> 0) text-danger @endif "></i>
                            <span class="visible-xs-inline-block position-right">Announcements</span>
                            @if (count($notifies)> 0)
                            <span class="status-mark border-danger"></span>
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-content">
                            <div class="dropdown-content-heading">
                                Notifications
                                <ul class="icons-list">
                                    <li><a href="#"><i class="icon-sync"></i></a></li>
                                </ul>
                            </div>
                            
                            <ul class="media-list dropdown-content-body width-350">
                                @if (count($notifies) > 0) 
                                @foreach ($notifies as $notify)
                                @if ($notify->sender !== Auth::user()->id)

                                <li class="media">
                                    <div class="media-left">
                                        <img src="{{Storage::url($notify->profile_pic)}}" class="img-circle img-lg" alt="">
                                    </div>

                                    <div class="media-body">
                                        <a class="table-inbox-subject letter-icon-title text-default" @if ($notify->type < 1)
                                                href="/report/dept={{$notify->dept_id}}/{{$notify->link_id}}/{{$notify->id}}"
                                            @elseif ($notify->type < 2) 
                                                href="/announcements/{{$notify->link_id}}/{{$notify->id}}"
                                            @else
                                                href="/myprofile/{{$notify->link_id}}/{{$notify->id}}"
                                            @endif
                                        >{{$notify->firstname}} {{$notify->lastname}} {{$notify->content}}
                                        <div class="media-annotation">@if ($notify->type < 1)
                                                <i class=" icon-file-plus text-warning"></i> @elseif ($notify->type < 2)<i class="icon-paperplane text-primary"></i> @else <i class="icon-profile text-success"></i> @endif{{$notify->created_at->diffForHumans()}} ...</div></a>
                                    </div>
                                </li>
                                @endif 
                                @endforeach
                                @else
                                <p><center>no further notification</center></p>
                                @endif
                                       
                            </ul>

                            <div class="dropdown-content-footer">
                                <a href="/notif" data-popup="tooltip" title="See All"><i class="icon-menu display-block"></i></a>
                            </div>
                        </div>
                        </li>
                        
                        {{--  Messages  --}}
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-bubble8"></i>
                                <span class="visible-xs-inline-block position-right">Messages</span>
                                
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
                        </li>  -->                  
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
                                            <a href="/myprofile/{{ Auth::user()->email }}"><img src="{{Storage::url(Auth::user()->profile_pic)}}" class="img-circle img-lg" alt=""></a>
                                        </div>
                                        <div class="media-body">
                                            <span class="media-heading text-semibold">{{ Auth::user()->firstname .' '. Auth::user()->lastname  }}</span>
                                            <div class="text-size-mini text-muted">
                                            <i class="icon-user-tie"></i> &nbsp; {{ Auth::user()->position }}

                                            @if (Auth::user()->position == 'Director')
                                            @foreach ($sidebar as $side) / {{$dept[$side->dept]}} @endforeach
                                            @endif

                                            @if (Auth::user()->position == 'Secretary')
                                            @foreach ($sidebar as $side) / {{$dept[$side->dept]}}@endforeach
                                            @endif

                                            @if (Auth::user()->position == 'District Pastor')
                                                @if (Auth::user()->district !== 'All') 
                                                    / {{Auth::user()->district}}
                                                @endif
                                            @endif
                                            
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
                                    @if ( auth()->user()->position !== 'District Pastor' )
                                    @if (auth()->user()->position !== 'Admin' )
                                    <li><a href="/home/{{$sidebar[0]->dept}}/1"><i class="icon-stats-dots"></i> <span>Dashboard</span></a></li>
                                    @else
                                    <li><a href="/home/1/1"><i class="icon-stats-dots"></i> <span>Dashboard</span></a></li>
                                    @endif
                                    @endif

                                    @if (Auth::user()->position == 'Admin')
                                    <li><a href="/users"><i class="icon-users4"></i> <span>Employee</span></a></li>
                                    @endif
                                    <li>
                                        <a href="/announcements"><i class="icon-newspaper"></i> <span>Announcements 
                                        {{--  @if ($unread > 0)<span class="label bg-green-400">{{$unread}}</span> @endif  --}}
                                        </span></a>
                                    </li>
                                    <li>
                                        <a><i class="icon-stack2"></i> <span>Department and Ministries</span></a>
                                        <ul>
                                            @if (Auth::user()->position == 'Admin')
                                                <li><a href="/report/dept=1">{{$dept[1]}}</a></li>
                                                <li><a href="/report/dept=2">{{$dept[2]}}</a></li>
                                                <li><a href="/report/dept=3">{{$dept[3]}}</a></li>
                                                <li><a href="/report/dept=4">{{$dept[4]}}</a></li>
                                                <li><a href="/report/dept=5">{{$dept[5]}}</a></li>
                                                <li><a href="/report/dept=6">{{$dept[6]}}</a></li>
                                                <li><a href="/report/dept=7">{{$dept[7]}}</a></li>
                                                <li><a href="/report/dept=8">{{$dept[8]}}</a></li>
                                                <li><a href="/report/dept=9">{{$dept[9]}}</a></li>
                                                <li><a href="/report/dept=10">{{$dept[10]}}</a></li>
                                            @endif
                                            @if (Auth::user()->position == 'District Pastor')
                                                <li><a href="/report/dept=1">{{$dept[1]}}</a></li>
                                                <li><a href="/report/dept=2">{{$dept[2]}}</a></li>
                                                <li><a href="/report/dept=3">{{$dept[3]}}</a></li>
                                                <li><a href="/report/dept=4">{{$dept[4]}}</a></li>
                                                <li><a href="/report/dept=5">{{$dept[5]}}</a></li>
                                                <li><a href="/report/dept=6">{{$dept[6]}}</a></li>
                                                <li><a href="/report/dept=7">{{$dept[7]}}</a></li>
                                                <li><a href="/report/dept=8">{{$dept[8]}}</a></li>
                                                <li><a href="/report/dept=9">{{$dept[9]}}</a></li>
                                                <li><a href="/report/dept=10">{{$dept[10]}}</a></li>
                                            @endif
                                            @if (Auth::user()->position == 'Director')
                                            @foreach ($sidebar as $side)
                                            <li><a href="/report/dept={{$side->dept}}">{{$dept[$side->dept]}}
                                             </a></li>
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->position == 'Secretary')
                                            @foreach ($sidebar as $side)
                                            <li><a href="/report/dept={{$side->dept}}">{{$dept[$side->dept]}}
                                             </a></li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/chat"><i class="icon-comment-discussion"></i> <span>Chatroom</a>
                                    </li>
                                    <li>
                                        <a href="/notif"><i class="icon-bell2"></i> <span>Notifications<span class="label bg-danger">@if (count($notifies) > 0){{count($notifies)}} @endif</span></span></a> 

                                    </li>
                                    <!-- /main -->
                                </ul>
                            </div>
                        </div>
                        <!-- /main navigation -->
                    </div>
                </div>