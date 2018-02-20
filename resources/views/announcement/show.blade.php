@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
	<h3><span class="text-semibold"> Announcements</span></h3>
	@include('layouts.messages')
		<div>
			<div class="page-header-content"></div>
				<div class="breadcrumb-line breadcrumb-line-component">
					<ul class="breadcrumb">
						<li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
						<li><a href="/announcements">Announcements</a></li>
						<li class="active">List</li>
					</ul>
					@if (Auth::user()->position !== 'District Pastor')
					<ul class="breadcrumb-elements">
						<li><a href="/announcements/create"><i class="icon-pencil7 position-left"></i> Create Post</a></li>
					</ul>
					@endif
				</div>
			</div>
    	<div class="panel panel-white">
			<div class="media stack-media-on-mobile mail-details-read">
				<a href="#" class="media-left">
					<img src="{{Storage::url($user->profile_pic)}}" class="img-circle img-lg" alt="">
				</a>
				<div class="media-body">
					<h6 class="media-heading">{{$user->position}}</h6>
					<div class="letter-icon-title text-semibold">{{$user->firstname}} {{ $user->lastname }}<a href="/myprofile/{{$user->email}}"> &lt;{{$user->email}}&gt;</a></div>
				</div>
			</div>
            <div class="media stack-media-on-mobile mail-details-read">
                <h4>Title: {{$announcements->title}}</h4>
                <div>{!!$announcements->content!!}</div>
                <hr>
                <small>Written on {{$announcements->created_at->format('F d Y, g:i a')}}</small>			
			</div>
			<div class="panel-toolbar panel-toolbar-inbox">
				<div class="navbar navbar-default">
					<ul class="nav navbar-nav visible-xs-block no-border">
						<li>
							<a class="text-center collapsed legitRipple" data-toggle="collapse" data-target="#inbox-toolbar-toggle-single">
								<i class="icon-circle-down2"></i>
							</a>
						</li>
					</ul>

					<form class="form-horizontal" role="form" method="POST" action=""/announcements/{{ $announcements->id }}"">
					<div class="navbar-collapse collapse" id="inbox-toolbar-toggle-single">
						<div class="text-right">
							@if (Auth::user()->id == $announcements->user_id)
							<a href="/announcements/{{$announcements->id}}/edit" class="btn bg-teal legitRipple"><i class="icon-pencil"></i> <span class="hidden-xs position-right">Edit</span></a>
    							
							@endif
						</div>
					</div>
					</form>
				</div>
			</div>
			{{--  /  --}}

			</div>
			@include('layouts.footer')
		</div>
	</div>
</div>

@endsection 