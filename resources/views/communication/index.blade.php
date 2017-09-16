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
						</ul>
						{{--  @endif  --}}
					
				</div>
			</div>


		<div class="panel panel-flat">
						<div class="panel-heading">
							<h3 class="panel-title">Yearly monitoring report of {{$year}}<a class="heading-elements-toggle"><i class="icon-more"></i></a></h3>
							<div class="heading-elements">
								<form class="form-horizontal" role="form" action="{{ route('communication.index') }}" method="GET">
                       			 {{ csrf_field() }}
								<ul class="icons-list">
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
						</div>

						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-framed table-hover">
									<thead>
										<tr>
											<th><strong>A. Reach Up With God</strong></th>
											<th><strong>1st Qrtr.</strong></th>
											<th><strong>2nd Qrtr.</strong></th>
											<th><strong>3rd Qrtr.</strong></th>
											<th><strong>4th Qrtr.</strong></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;1. No. of members following the yearly bible reading plan.</td>
											<td>{{$bible}}</td>
											<td>{{$bible2}}</td>
											<td>{{$bible3}}</td>
											<td>{{$bible4}}</td>
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;2. No. of members following the 777 Program.</td>
											<td>{{$seven}}</td>
											<td>{{$seven2}}</td>
											<td>{{$seven3}}</td>
											<td>{{$seven4}}</td>
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;3. No of church following the hour of worship format</td>
											<td>{{$worship}}</td>
											<td>{{$worship2}}</td>
											<td>{{$worship3}}</td>
											<td>{{$worship4}}</td>
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;4. No. of members following the revive by his prophet initiative</td>
											<td>{{$prophet}}</td>
											<td>{{$prophet2}}</td>
											<td>{{$prophet3}}</td>
											<td>{{$prophet4}}</td>
										</tr>
									</tbody>
									<thead>
										<tr>
											<th><strong>B. Reach Out With God</strong></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;1. No. of church with directional signs.</td>
											<td>{{$signs}}</td>
											<td>{{$signs2}}</td>
											<td>{{$signs3}}</td>
											<td>{{$signs4}}</td>
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;2. No. of cable head ends carrying hope channel.</td>
											<td>{{$hope}}</td>
											<td>{{$hope2}}</td>
											<td>{{$hope3}}</td>
											<td>{{$hope4}}</td>
										</tr>
									<tbody>
								</table>
							</div>
						</div>
					</div>
		@include('layouts.footer')
	</div>
</div>
		
@endsection
