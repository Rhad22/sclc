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
							<li><label for="year">Select year:</label></li>
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
								<strong>November 2017 Monthly Report</strong>
							</h5>
							
						</div>

						<div class="panel-body">
							
							<div class="row">
							<div class="col-md-6 col-xs-9">
								<div class="table-responsive">
								<table class="table table-framed table-hover">
									<thead>
										<tr>
											<th><strong>A. Reach Up With God</strong></th>
									</thead>
									<tbody>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;1. No. of members following the yearly bible reading plan. {{$bible4}} {{$bible5}} {{$from4}}</td>
											
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;2. No. of members following the 777 Program.</td>
											
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;3. No of church following the hour of worship format</td>
											
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;4. No. of members following the revive by his prophet initiative</td>
											
										</tr>
									</tbody>
									<thead>
										<tr>
											<th><strong>B. Reach Out With God</strong></th>
											
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;1. No. of church with directional signs.</td>
											
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;2. No. of cable head ends carrying hope channel.</td>
											
										</tr>
									<tbody>
								</table>
								</div>
							</div>
							<div class="col-md-6 col-xs-3" style="margin-left: -22px">
								<div class="table-responsive">
								<table class="table table-framed table-hover">
									<thead>
										<tr>
											
                                            <script>
										        var i = 1
										        for (var i; i <= 31; i++) {
											    document.write('<th class="data">'+i+'</th>');
										    }
									        </script>
                                            <td class="data"><strong>0</strong></td>
											<td class="data"><strong>0&#37;</strong></td>
									</thead>
									<tbody>
										<tr>
											
											<script>
										        var i = 1
										        for (var i; i <= 31; i++) {
											    document.write('<th class="data">0</th>');
										    }
									        </script>
											<td class="data"><strong>0</strong></td>
											<td class="data"><strong>0&#37;</strong></td>
										</tr>
										<tr>
											
											<script>
										        var i = 1
										        for (var i; i <= 31; i++) {
											    document.write('<th class="data">0</th>');
										    }
									        </script>
											<td class="data"><strong>0</strong></td>
											<td class="data"><strong>0&#37;</strong></td>
										</tr>
										<tr>
											
											<script>
										        var i = 1
										        for (var i; i <= 31; i++) {
											    document.write('<th class="data">0</th>');
										    }
									        </script>
											<td class="data"><strong>0</strong></td>
											<td class="data"><strong>0&#37;</strong></td>
										</tr>
										<tr>
											
											<script>
										        var i = 1
										        for (var i; i <= 31; i++) {
											    document.write('<th class="data">0</th>');
										    }
									        </script>
											<td class="data"><strong>0</strong></td>
											<td class="data"><strong>0&#37;</strong></td>
										</tr>
									</tbody>
									<thead>
										<tr>
											
											<script>
										        var i = 1
										        for (var i; i <= 31; i++) {
											    document.write('<th class="data"></th>');
										    }
									        </script>
											<th><br></th>
											<th><br></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											
											<script>
										        var i = 1
										        for (var i; i <= 31; i++) {
											    document.write('<th class="data">0</th>');
										    }
									        </script>
											<td class="data"><strong>0</strong></td>
											<td class="data"><strong>0&#37;</strong></td>
										</tr>
										<tr>
											
											<script>
										        var i = 1
										        for (var i; i <= 31; i++) {
											    document.write('<th class="data">0</th>');
										    }
									        </script>
											<td class="data"><strong>0</strong></td>
											<td class="data"><strong>0&#37;</strong></td>
										</tr>
									<tbody>
								</table>
								</div>
							</div>
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
