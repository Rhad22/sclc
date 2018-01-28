@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
	<h3><span class="text-semibold">{{$dept[$ids]}}</span></h3>
		<div class="page-header-content"></div>
		<div class="breadcrumb-line breadcrumb-line-component">
			<ul class="breadcrumb">
				<li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
				<li><a href="/report/dept={{$ids}}">{{$dept[$ids]}}</a></li>
				<li class="active">Single Report</li>
			</ul>
			
			<ul class="breadcrumb-elements">
				@if (Auth::user()->position == 'District Pastor')
				<li><a href="/report/dept={{$ids}}/create"><i class="icon-pencil7 position-left"></i>Create report</a>
				</li>
				@endif
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-calendar3 position-left"></i>Type of report <b class="caret"></b></a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="/report/dept={{$ids}}">Monthly</a></li>
						<li class="dropdown-submenu dropdown-submenu-left">
							<a href="#">Quarterly</a>
							<ul class="dropdown-menu">
								<li><a href="/report/dept={{$ids}}/1st">1st quarter</a></li>
								<li><a href="/report/dept={{$ids}}/2nd">2nd quarter</a></li>
								<li><a href="/report/dept={{$ids}}/3rd">3rd quarter</a></li>
								<li><a href="/report/dept={{$ids}}/4th">4rd quarter</a></li>
							</ul>
						</li>
						<li><a href="/report/dept={{$ids}}/yearly">Yearly</a></li>
					</ul>
				</li>      	
			</ul>
			
		</div>
		@include('layouts.messages')
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title data">
					South-Central Luzon Conference<br>
					{{$dept[$ids]}}
					<br><br>
					<strong>Report of {{$user->firstname}} {{$user->lastname}}</strong> <br> {{$user->created_at->format('M. d Y')}}
				</h5>
			</div>
			<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-framed table-hover" style="margin-left: 0px">
								<tbody>
										@for ($x = 1; $x < $length; $x++)
										<tr>
											<td>
												{{$content[$ids][$x]}}
											</td>
											<td>{{$days['row'. + $x]}}</td>
										</tr>
										@endfor
							</tbody>
							</table>
							</div>
                            <br>
						</div>	
						
		</div>
		@include('layouts.footer')
	</div>
</div>
@endsection