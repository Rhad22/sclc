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
					{{--  @if (Auth::user()->user_postion !== 'District Pastor')  --}}
					<ul class="breadcrumb-elements">
						<li><a href="/announcements/create"><i class="icon-pencil7 position-left"></i> Create Post</a></li>
					</ul>
					{{--  @endif  --}}
				</div>
			</div>
			@if(count($announcements) > 0)
			<div class="panel panel-body">
				
				<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
					<div class="datatable-header">
						<div id="DataTables_Table_1_filter" class="dataTables_filter">
							<label><span>Search:</span> 
							<input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_1"></label>
						</div>
						<div class="dt-buttons"></div>
						<div class="dataTables_length" id="DataTables_Table_1_length"></div>
					</div>
					<div class="datatable-scroll-wrap">
						<table class="table table-condensed table-hover" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
							<thead>
								<tr role="row">
									<th>
										<strong>Title</strong>
									</th>
									<th>
										<strong>Views</strong>
									</th>
									<th>
										<strong>Comments</strong>
									</th>
									<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">
										<strong>Date posted</strong>
									</th>	
								</tr>
							</thead>
							<tbody>	
								@foreach($announcements as $announcement)
									<tr role="row" class="odd">
										<td>
											<a href="/announcements/{{$announcement->id}}">
												<div class="letter-icon-title text-default">{{$announcement->title}}</div>
											</a>
										</td>	
										<td>
											<a href="/announcements/{{$announcement->id}}">
												<div class="letter-icon-title text-default">none</div>
											</a>
										</td>
										<td>
											<a href="/announcements/{{$announcement->id}}">
												<div class="letter-icon-title text-default">none</div>
											</a>
										</td>
										<td>
											<a href="/announcements/{{$announcement->id}}">
												<div class="letter-icon-title text-default">{{$announcement->created_at->diffForHumans()}}</div>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="datatable-footer">
						<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
							{{ $announcements->links() }}
						
						</div>
							
					</div>
				</div>
				@else		
				<h4 align="center">No posts found</h4>		
				@endif
				<div>	
			</div>
			<br>
			@if (count($announcements) == 0)
				@include('layouts.footer')
			@endif
			
		</div>
		@if (count($announcements) > 0)
    	  @include('layouts.footer')
		@endif
	</div>
<div>			

@endsection 