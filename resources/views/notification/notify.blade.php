@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
		<h3><span class="text-semibold">Notification</span></h3>
		<div>
			<div class="page-header-content"></div>
				<div class="breadcrumb-line breadcrumb-line-component">
					<ul class="breadcrumb">
						<li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
						<li><a href="/users">Notification</a></li>
						<li class="active">List</li>
					</ul>
				</div>
		</div>

		<div class="timeline timeline-center">
						<div class="timeline-container">
							<!-- Blog post -->
							@foreach ($notifies as $notify)
							<div class="timeline-row @if($notify->created_at->format('d') %2 == 0) post-even @endif">
								<div class="timeline-icon ">
									<img src="{{Storage::url($notify->profile_pic)}}" alt="">
								</div>
								<div class="panel panel-flat timeline-content">
									<div class="panel-body">
										<a href="#" class="display-block content-group">
											<img src="assets/images/demo/cover3.jpg" class="img-responsive content-group" alt="">
										</a>

										<h6 class="content-group">
											<a href="#">{{$notify->firstname}} {{$notify->lastname}}</a> {{$notify->content}}<div class="media-annotation">{{$notify->created_at->diffForHumans()}}</div></a>
										</h6>
									</div>

									<div class="panel-footer panel-footer-transparent">
										<div class="heading-elements">
											<span class="heading-btn pull-right">
												<a @if ($notify->type == 0)
                                                href="/report/dept={{$notify->dept_id}}/{{$notify->link_id}}"
                                            @else
                                                href="/announcements/{{$notify->link_id}}"
                                            @endif class="btn btn-link">Read<i class="icon-arrow-right14 position-right"></i></a>
											</span>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
							<!-- /blog post -->
    	@include('layouts.footer')
	</div>
</div>
@endsection 