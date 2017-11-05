@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
	<h3><span class="text-semibold">Communication Department</span></h3>
		<div>
			<div class="page-header-content"></div>
				
				<div class="breadcrumb-line breadcrumb-line-component">
					<ul class="breadcrumb">
						<li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
						<li><a href="/communication">Communication Department</a></li>
						<li class="active">List</li>
					</ul>
					{{--  @if (Auth::user()->user_postion == 'District Pastor')  --}}
					<ul class="breadcrumb-elements">
							<li><a href="/communication/create"><i class="icon-pencil7 position-left"></i> Create report</a></li>
					        <li class="dropdown">
					            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-calendar3 position-left"></i>Type of report <b class="caret"></b></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="/communication.monthly">Monthly</a></li>
									<li class="dropdown-submenu dropdown-submenu-left">
										<a href="#">Quarterly</a>
										<ul class="dropdown-menu">
											<li><a href="/communication.1st">1st quarter</a></li>
											<li><a href="/communication.2nd">2nd quarter</a></li>
											<li><a href="/communication.3rd">3rd quarter</a></li>
											<li><a href="/communication.4th">4rd quarter</a></li>
										</ul>
									</li>
									<li><a href="/communication">Yearly</a></li>
								</ul>
					        </li>
							<li>
								
							</li>
					                	
					</ul>
						{{--  @endif  --}}
				
					
				</div>
				<div style="text-align: right;">
					<form class="form-horizontal" role="form" action="{{ route('communication.index') }}" method="GET">
                       	{{ csrf_field() }}
						<ul class="icons-list ">
							<li><label>Select year:</label></li>
							<li>
								<select name="year" class="form-control">
									<script>
										var i = new Date().getFullYear();
										for (var i; i >= 1970; i--) {
											document.write('<option value="'+i+'">'+i+'</option>');
										}
									</script>
								</select>
							</li>
							<li><button type="submit">OK</button></li>
			            </ul>
					</form>
				</div>
			<div> 
								
		   
		</div>


		<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title data">
								South-Central Luzon Conference<br>
								Communication Department<br><br>
								<strong>{{$year}} Yearly Report</strong>
							</h5>
							
						</div>

						<div class="panel-body">
							<div class="table-responsive ">
								
								<table class="table table-framed table-hover">
									<thead>
										<tr>
											<th><strong>A. Reach Up With God</strong></th>
											<th class="data">1st Qr.</th>
											<th class="data">2nd Qr.</th>
											<th class="data">3rd Qr.</th>
											<th class="data">4th Qr.</th>
											<th class="data"><strong>Total</strong></th>
									</thead>
									<tbody>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;1. No. of members following the yearly bible reading plan.</td>
											<td class="data">{{$bible}}</td>
											<td class="data">{{$bible2}}</td>
											<td class="data">{{$bible3}}</td>
											<td class="data">{{$bible4}}</td>
											<td class="data"><strong>{{$tbible}}</strong></td>
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;2. No. of members following the 777 Program.</td>
											<td class="data">{{$seven}}</td>
											<td class="data">{{$seven2}}</td>
											<td class="data">{{$seven3}}</td>
											<td class="data">{{$seven4}}</td>
											<td class="data"><strong>{{$tseven}}</strong></td>
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;3. No of church following the hour of worship format</td>
											<td class="data">{{$worship}}</td>
											<td class="data">{{$worship2}}</td>
											<td class="data">{{$worship3}}</td>
											<td class="data">{{$worship4}}</td>
											<td class="data"><strong>{{$tworship}}</strong></td>
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;4. No. of members following the revive by his prophet initiative</td>
											<td class="data">{{$prophet}}</td>
											<td class="data">{{$prophet2}}</td>
											<td class="data">{{$prophet3}}</td>
											<td class="data">{{$prophet4}}</td>
											<td class="data"><strong>{{$tprophet}}</strong></td>
									</tbody>
									<thead>
										<tr>
											<th><strong>B. Reach Out With God</strong></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;1. No. of church with directional signs.</td>
											<td class="data">{{$signs}}</td>
											<td class="data">{{$signs2}}</td>
											<td class="data">{{$signs3}}</td>
											<td class="data">{{$signs4}}</td>
											<td class="data"><strong>{{$tsigns}}</strong></td>
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;2. No. of cable head ends carrying hope channel.</td>
											<td class="data">{{$hope}}</td>
											<td class="data">{{$hope2}}</td>
											<td class="data">{{$hope3}}</td>
											<td class="data">{{$hope4}}</td>
											<td class="data"><strong>{{$thope}}</strong></td>
										</tr>
									<tbody>
								</table>
							</div>
						</div>
					</div>
					<div style="text-align: right;">
						<a href="#" class="btn btn-primary legitRipple"><i class="icon-printer"></i> <span class="hidden-xs position-right">Print</span></a>
					</div>
		@include('layouts.footer')
	</div>
</div>
		
@endsection
