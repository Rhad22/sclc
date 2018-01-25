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

<body>

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
                
            </div>
        </div>
    </div>

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
                                        <a href="#"><i class="icon-bell2"></i> <span>Notifications<span class="label bg-orange-400">15</span></span></a> 
                                    </li>
                                    <!-- /main -->
                                </ul>
                            </div>
                        </div>
                        <!-- /main navigation -->
                    </div>
                </div>
    
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
                                            <option value="Director of Communication Department">Director of Communication Department</option>
                                            <option value="Director of Children s Ministries">Director of Children s Ministries</option>
                                            <option value="Director of Women s Ministries">Director of Women s Ministries</option>
                                            <option value="Director of Ministerial">Director of Ministerial</option>
                                            <option value="Director of Stewardship Ministries">Director of Stewardship Ministries</option>
                                            <option value="Director of Health Ministries">Director of Health Ministries</option>
                                            <option value="Director of Personal Ministries">Director of Personal Ministries</option>
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
                                                    <input type="checkbox" name="dept" value="1">  Communication Department<br>
                                                    <input type="checkbox" name="dept" value="2">  Children's Ministries<br>
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
</body>

                
           


