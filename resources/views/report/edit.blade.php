@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
	<h3><span class="text-semibold">{{$dept[$ids]}}</span></h3>
		@include('layouts.messages')
		<div>
			<div class="page-header-content"></div>
				<div class="breadcrumb-line breadcrumb-line-component">
					<ul class="breadcrumb">
						<li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
						<li><a href="/report/dept={{$ids}}">{{$dept[$ids]}}</a></li>
						<li class="active">Update report</li>
					</ul>
					<ul class="breadcrumb-elements">
							<li>
					            <a href="/report/dept={{$ids}}/create"><i class="icon-pencil7 position-left"></i>Create report <b class="caret"></b></a>
					        </li>
					        <li class="dropdown">
					            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-calendar3 position-left"></i>Type of report <b class="caret"></b></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="/report/dept={{$ids}}/monthly">Monthly</a></li>
									<li class="dropdown-submenu dropdown-submenu-left">
										<a href="#">Quarterly</a>
										<ul class="dropdown-menu">
											<li><a href="/report/dept={{$ids}}/1st">1st quarter</a></li>
											<li><a href="/report/dept={{$ids}}/2nd">2nd quarter</a></li>
											<li><a href="/report/dept={{$ids}}/3rd">3rd quarter</a></li>
											<li><a href="/report/dept={{$ids}}/4th">4rd quarter</a></li>
										</ul>
									</li>
									<li><a href="/report/dept={{$ids}}">Yearly</a></li>
								</ul>
					        </li>
							<li>
								
							</li>
					                	
					</ul>
				</div>
			</div>

		<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Monitoring report<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
						</div>
						
						<div class="panel-body">
							<div class="table-responsive">
								{!! Form::open(['action' => ['ReportController@update', $days->dept_id, $days->id], 'method' => 'POST']) !!}
								<table class="table table-framed table-hover" style="margin-left: 0px">
								<tbody>
										@for ($x = 1; $x < $length; $x++)
										<tr>
											<td>
												{{$content[$ids][$x]}}
											</td>
											<td>{{Form::number('row'.$x, $days['row'. + $x], ['class' => 'form-control', 'required' => '', 'min' => '0', 'placeholder' => 'Input number'])}}</td>
										</tr>
										@endfor
							</tbody>
							</table>
							</div>
                            <br>
                            <div class="text-right">
							    <button type="submit" class="btn btn-primary legitRipple"><i class="icon-loop3 position-left"></i>Update report</button>
							</div>
                            {!! Form::close() !!}
						</div>
					</div>
		@include('layouts.footer')
	</div>
</div>
@endsection