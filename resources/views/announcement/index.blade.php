@extends('layouts.app')

@section('pagescript')
    <script type="text/javascript" src="{{asset('js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/selects/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/pages/datatables_basic.js')}}"></script>
@stop

@section('content')
<div class="content-wrapper">
	<div class="content">
		<h3><span class="text-semibold"> Announcements</span></h3>
		@include('layouts.messages')
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


		<div class="panel panel-flat">
								<div class="table-responsive">
									<table class="table text-nowrap">
										<thead>
											<tr>
												<th><i class="icon-watch2 text-warning position-left"></i>Posted</th>
												<th><i style="margin-left: 7px" class=" icon-user text-success position-left"></i>Author</th>
												<th><i class=" icon-envelop5 text-primary position-left"></i>Content</th>
												
											</tr>
										</thead>
										<tbody>
											@foreach($announcements as $announcement)
											<tr>
												<td class="text-center">
													@if ($announcement->created_at->format('y m d') < date('y m d')) {{$announcement->created_at->format(' M d')}} @else {{$announcement->created_at->format(' g:i a')}} @endif
												</td>
												<td>
												<div class="media-left media-middle">
														<a href="/myprofile/{{$announcement->email}}" >
															<img src="{{Storage::url($announcement->profile_pic)}}" class="img-circle img-xs" alt="">
														</a>
													</div>

													<div class="media-body">
														<a href="/myprofile/{{$announcement->email}}" class="display-inline-block text-default text-semibold letter-icon-title" data-popup="tooltip" title="View Profile">{{$announcement->firstname}} {{$announcement->lastname}}</a>
														<div class="text-muted text-size-small"><span class="status-mark border-success position-left"></span> {{$announcement->position}}</div>
													</div>
												</td>
												<td>
													<a href="/announcements/{{$announcement->id}}" data-popup="tooltip" title="View Content" class="text-default display-inline-block">
														<span class="text-semibold">{!!substr("$announcement->title",0,120)!!}</span>
														<span class="display-block text-muted">{!!substr("$announcement->content",3,120)!!}</span>
													</a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>

		<!-- Single line -->
					
					<div style="text-align: right;">{{ $announcements->links() }}</div>
    	@include('layouts.footer')
	</div>
<div>
@endsection 