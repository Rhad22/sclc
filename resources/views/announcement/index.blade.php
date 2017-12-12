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
			<table class="table datatable-scroll-y" width="100%">
				<thead>
					<tr>
						<th>Author</th>
						<th>Title</th>
						<th>Status</th>
						<th>Date</th>
						<th>Comments</th>
						<th>Likes</th>
					</tr>
				</thead>
				<tbody>
					@foreach($announcements as $announcement)
					<tr>
						<td><a href="#" class="letter-icon-title text-default "><img src="{{Storage::url($announcement->profile_pic)}}" class="img-circle img-lg" alt=""> {{$announcement->firstname}} {{$announcement->lastname}}</a></td>
						<td><a href="/announcements/{{$announcement->id}}"><span class="table-inbox-subject letter-icon-title text-default">{{$announcement->title}}</span></a></td>
						<td><span class="label label-success">Active</span></td>
						<td>{{$announcement->created_at->diffForHumans()}}</td>
						<td>None</td>
						<td>None</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
    	@include('layouts.footer')
	</div>
<div>
@endsection 