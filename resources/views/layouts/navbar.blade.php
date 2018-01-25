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
                            <i class="icon-bell2"></i>
                            <span class="visible-xs-inline-block position-right">Announcements</span>
                            @if (count($notifies)> 0)
                            <span class="status-mark border-pink-300"></span>
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
                                @foreach ($notifies as $notify)
                                <li class="media">
                                    <div class="media-left">
                                        <img src="{{Storage::url($notify->profile_pic)}}" class="img-circle img-lg" alt="">
                                    </div>

                                    <div class="media-body">
                                        <a class="table-inbox-subject letter-icon-title text-default" @if ($notify->type == 0)
                                                href="/report/dept={{$notify->dept_id}}/{{$notify->link_id}}"
                                            @else
                                                href="/announcements/{{$notify->link_id}}"
                                            @endif
                                        >{{$notify->firstname}} {{$notify->lastname}} {{$notify->content}}
                                        <div class="media-annotation">{{$notify->created_at->diffForHumans()}}</div></a>
                                    </div>
                                </li> 
                                @endforeach
                                       
                            </ul>

                            <div class="dropdown-content-footer">
                                <a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
                            </div>
                        </div>
                        </li>
                        
                        {{--  Messages  --}}
                        <li class="dropdown">
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