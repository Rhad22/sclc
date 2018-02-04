@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
<<<<<<< HEAD
		<h3><span class="text-semibold">Notifications</span></h3>
=======
		<h3><span class="text-semibold">Notification</span></h3>
>>>>>>> eed94e903716173a1687c4e9ffb846aa5d71c1f3
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

<<<<<<< HEAD
		<div class="panel panel-flat">
			
				<table class="table">
					<tbody>
						@foreach ($allnotify as $notify)
						@if ($notify->sender !== Auth::user()->id)
						<tr>
							<td @if ($notify->read == 0) style="background: #edf2fa; " @endif ><a class="table-inbox-subject letter-icon-title text-default" @if ($notify->type < 1)
                                                href="/report/dept={{$notify->dept_id}}/{{$notify->link_id}}/{{$notify->id}}"
                                            @elseif ($notify->type < 2) 
                                                href="/announcements/{{$notify->link_id}}/{{$notify->id}}"
                                            @else
                                                href="/myprofile/{{$notify->link_id}}/{{$notify->id}}"
                                            @endif><div class="col-md-1 col-xs-2"><img src="{{Storage::url($notify->profile_pic)}}" class="img-circle img-lg" alt=""></div>  <div class="col-md-11 col-xs-10"><b>{{$notify->firstname}} {{$notify->lastname}}</b> {{$notify->content}} <br> <span class="media-annotation">@if ($notify->type < 1)
                                                <i class=" icon-file-plus text-warning"></i> @elseif ($notify->type < 2)<i class="icon-paperplane text-primary"></i> @else <i class="icon-profile text-success"></i> @endif{{$notify->created_at->diffForHumans()}} ...</span> </div></a></td>

						</tr>
						@endif 
						@endforeach
					</tbody>
				</table>
			</div>
		
=======
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
>>>>>>> eed94e903716173a1687c4e9ffb846aa5d71c1f3
    	@include('layouts.footer')
	</div>
</div>
@endsection 