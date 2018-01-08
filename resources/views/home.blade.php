@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
		<h3>Dashboard</h3>
		<div class="panel panel-flat">
			<div class="panel panel-body">
				<div class="app">
            	<center>{!! $chart->html() !!}</center>
        	</div>
        <!-- End Of Main Application -->
        {!! Charts::scripts() !!}
        {!! $chart->script() !!}			
			</div>	
		</div>
		

		<div class="row">
			<div class="col-lg-8 data">
					<div class="panel panel-flat">
							@if(count($announcements) > 0)
							<div class="panel panel-body">
								<h4><span class="text-semibold">Latest Announcements</span></h4>
								<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
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
							</div>	
					</div>
					<div class="panel panel-flat">
						<div class="panel panel-body">
							<h4><span class="text-semibold">Activity Log</span></h4>
						</div>	
					</div>

			</div>
			<div class="col-lg-4 data">
				<div class="panel panel-flat">
					<div class="panel panel-body">
						<h4><span class="text-semibold">Messages</span></h4>
					</div>
				</div>
			</div>
		</div>
		@include('layouts.footer')
	</div>
	
</div>


@endsection
