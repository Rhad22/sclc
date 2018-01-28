@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
			<h4>Dashboard</h4>
			
			<div style="text-align: right;">
			{!! Form::open(['action' => ['HomeController@chart', $dept_id, $row],'method' => 'GET']) !!}
            {{ csrf_field() }}
			<ul class="icons-list ">
				<li>@include('layouts.chartmenu')</li>
				<li><label>Select year:</label></li>
				<li>
					<select name="year" class="form-control">
						<script>
							var i = new Date().getFullYear();
							var l = new Date().getFullYear() - 25;
							for (var i; i >= l; i--) {
							document.write('<option value="'+i+'">'+i+'</option>');
							}
						</script>
					</select>
					<input type="hidden" name="row" value="{{$row}}">
				</li>
				<li><button type="submit">OK</button></li>
			</ul>
			{!! Form::close() !!}
		</div>
		<div class="panel panel-flat">
			<div class="panel panel-body">
				
				<div class="app">
					<center>
						<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto">
						</div>
					</center>
        		</div>
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

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: '{{$content[$dept_id][$row]}} ({{$year}})'
    },
    subtitle: {
        text: '{{$dept[$dept_id]}}'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Total: <b>{point.y:1f}</b>'
    },
    series: [{
        name: 'Population',
        data: [
            ['January', {{$value[0]}}],
            ['February', {{$value[1]}}],
            ['March', {{$value[2]}}],
            ['April', {{$value[3]}}],
            ['May', {{$value[4]}}],
            ['June', {{$value[5]}}],
            ['July', {{$value[6]}}],
            ['August', {{$value[7]}}],
            ['September', {{$value[8]}}],
            ['October', {{$value[9]}}],
            ['November', {{$value[10]}}],
            ['December', {{$value[11]}}],
        ],
        dataLabels: {
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>


@endsection
