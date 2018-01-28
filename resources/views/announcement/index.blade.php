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

		<!-- Single line -->
					<div class="panel panel-white">
						
						<div class="table-responsive">
							<table class="table table-inbox">
								<tbody data-link="row" class="rowlink">
									@foreach($announcements as $announcement)
									<tr>
										<td class="table-inbox-image">
											<img src="{{Storage::url($announcement->profile_pic)}}" class="img-circle img-xs" alt="">
										</td>
										<td class="table-inbox-name">
											<a href="/myprofile/{{$announcement->email}}">
												<div class="letter-icon-title text-default">&nbsp;&nbsp;&nbsp;{{$announcement->firstname}} {{$announcement->lastname}}</div>
											</a>
										</td>
										<td class="table-inbox-message">
											<a class="table-inbox-subject letter-icon-title text-default" href="/announcements/{{$announcement->id}}">
											<span class="table-inbox-subject">{{$announcement->title}} &nbsp;-&nbsp;</span>
											<span class="table-inbox-preview">
												{!!substr("$announcement->content",3,200)!!}</span></a>
										</td>
										<td class="table-inbox-time"> @if ($announcement->created_at->format('y m d') < date('y m d')) {{$announcement->created_at->format(' M d')}} @else {{$announcement->created_at->format(' g:i a')}} @endif
										</td>
										@endforeach
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div style="text-align: right;">{{ $announcements->links() }}</div>
    	@include('layouts.footer')
	</div>
<div>
@endsection 