@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content"> 
@if ( auth()->user()->position !== 'District Pastor' )
		
			<div class="panel panel-body">
			
				<div class="app">
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
					<center>
						<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto">
						</div>
					</center>
        		</div>
        	</div>
        	
			</div>
		
		<div class="row">
			<div class="col-lg-8">
				<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title"><i class="icon-newspaper text-success position-left"></i> Announcements</h5>
									<div class="heading-elements" style="padding-top: 10px">
										<span >
											<i class="icon-history text-warning position-left"></i> <span></span> {{date("M j, g:i")}}
										</span>
				                	</div>
								</div>

								<div class="table-responsive">
									<table class="table text-nowrap">
										<thead>
											<tr>
												<th><i class="icon-watch2 text-warning position-left"></i>Posted</th>
												<th><i style="margin-left: 7px" class=" icon-user text-success position-left"></i>User</th>
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
														<span class="text-semibold">{!!substr("$announcement->title",0,50)!!}</span>
														<span class="display-block text-muted">{!!substr("$announcement->content",3,50)!!}</span>
													</a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
			</div>
			<div class="col-lg-4">
				<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title"><i class="icon-clipboard3 text-success position-left"></i> Activity Log</h6>
									
								</div>

								<!-- Numbers -->
								<div class="container-fluid">
									<div class="row text-center">
										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-clipboard3 position-left text-warning"></i> {{$week}}</h6>
												<span class="text-muted text-size-small">this week</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-warning"></i>{{$buwan}}</h6>
												<span class="text-muted text-size-small">this month</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-comments position-left text-warning"></i>{{$all}}</h6>
												<span class="text-muted text-size-small">all activity</span>
											</div>
										</div>
									</div>
									
								</div>
								<!-- /numbers -->
								<hr>

								<!-- Area chart -->
								<div id="messages-stats"></div>
								<!-- /area chart -->



								<!-- Tabs content -->
								<div class="tab-content">
									<div style="padding-left: 13px">
										<ul class="media-list" style="height:400px; overflow-y: scroll;">
											@foreach($allactivity as $activity)
											<li class="media table-inbox-subject letter-icon-title text-default">
												<div class="media-left">
													<img src="{{Storage::url($activity->profile_pic)}}" class="img-circle img-xs" alt="">
													<span class="badge label-rounded "><i class="icon-envelop5"></i></span>
												</div>

												<div class="media-body" style="padding-right:10px">
													<a @if ($activity->type < 1)
                                                href="/report/dept={{$activity->dept_id}}/{{$activity->link_id}}/{{$activity->id}}"
                                            @elseif ($activity->type < 2) 
                                                href="/announcements/{{$activity->link_id}}/{{$activity->id}}"
                                            @else
                                                href="/myprofile/{{$activity->link_id}}/{{$activity->id}}"
                                            @endif>
														{{$activity->firstname}} {{$activity->lastname}}
														<span class="media-annotation pull-right">@if ($activity->created_at->format('y m d') < date('y m d')) {{$activity->created_at->format(' M d')}} @else {{$activity->created_at->format(' g:i a')}} @endif</span>
													
													<span class="display-block text-muted">@if ($activity->type < 1)
                                                <i class=" icon-file-plus text-warning"></i> @elseif ($activity->type < 2)<i class="icon-paperplane text-primary"></i> @else <i class="icon-profile text-success"></i> @endif{{$activity->content}}</span>
													</a>
												</div>
											</li>
											@endforeach
										</ul>
									</div>
								</div>
								<!-- /tabs content -->

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
            rotation: 0,
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
            ['Jan', {{$value[0]}}],
            ['Feb', {{$value[1]}}],
            ['Mar', {{$value[2]}}],
            ['Apr', {{$value[3]}}],
            ['May', {{$value[4]}}],
            ['Jun', {{$value[5]}}],
            ['Jul', {{$value[6]}}],
            ['Aug', {{$value[7]}}],
            ['Sept', {{$value[8]}}],
            ['Oct', {{$value[9]}}],
            ['Nov', {{$value[10]}}],
            ['Dec', {{$value[11]}}],
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
@else

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
					<div style="text-align: right;">{{ $announcements->links() }}</div>
    	@include('layouts.footer')
    	@endif
	</div>
<div>
@endsection
