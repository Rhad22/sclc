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
				@include('layouts.messages')
				<div style="text-align: right;">
					{!! Form::open(['action' => ['CommunicationController@monthly'], 'method' => 'GET']) !!}
                       	{{ csrf_field() }}
						<ul class="icons-list ">
							<li><label for="year">Select month:</label></li>
							<li>
								<select name="month" class="form-control">
									<option value="01">Jan</option>
									<option value="02">Feb</option>
									<option value="03">Mar</option>
									<option value="04">Apr</option>
									<option value="05">May</option>
									<option value="06">Jun</option>
									<option value="07">Jul</option>
									<option value="08">Aug</option>
									<option value="09">Sept</option>
									<option value="10">Oct</option>
									<option value="11">Nov</option>
									<option value="12">Dec</option>
								</select>
							</li>
							<li><label for="year">year:</label></li>
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
					{!! Form::close() !!} 
				</div>
			<div> 
								
		   
		</div>


		<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title data">
								South-Central Luzon Conference<br>
								Communication Department<br><br>
								<strong> {{$tmonth}} Monthly Report of {{$year}}</strong>
							</h5>
							
						</div>
						<div class="panel-body">
							<div class="row">
								
									<div class="table-responsive">
										<table class="table table-framed table-hover">
											<thead style="border: solid 1px;">
												<tr style="border: solid 1px;">
													<th class="col-md-1" style="border: solid 1px;" rowspan="2"><strong>Date</strong></th>
													<th style="border: solid 1px; text-align: center;" colspan="4"><strong>A. Reach Up With God</strong></th>
													<th style="border: solid 1px; text-align: center;" colspan="2"><strong>B. Reach Out With God</strong></th>
													
												</tr>
												<tr style="border: solid 1px;">
													<th style="border: solid 1px;"><strong>No. of members following the yearly bible reading plan.</strong></th>
													<th style="border: solid 1px;"><strong>No. of members following the 777 Program.</strong></th>
													<th style="border: solid 1px;"><strong>No of church following the hour of worship format</strong></th>
													<th style="border: solid 1px;"><strong>No. of members following the revive by his prophet initiative</strong></th>
													<th style="border: solid 1px;"><strong>No. of church with directional signs.</strong></th>
													<th style="border: solid 1px;"><strong>No. of cable head ends carrying hope channel.</strong></th>
												</tr>
												@if(count($days) > 0)
												@foreach ($days as $day)
												<tr>
													<td style="border: solid 1px;" ><a href="/communication/{{$day->id}}/edit"><div class="letter-icon-title text-default"><i data-popup="tooltip" title="" data-placement="top" id="top" data-original-title="click to edit report">{{ $day->created_at->format('M d') }}</i></div></a></td>
													<td style="border: solid 1px; text-align: right;">{{ $day->row1}}</td>
													<td style="border: solid 1px; text-align: right;">{{ $day->row2}}</td>
													<td style="border: solid 1px; text-align: right;">{{ $day->row3}}</td>
													<td style="border: solid 1px; text-align: right;">{{ $day->row4}}</td>
													<td style="border: solid 1px; text-align: right;">{{ $day->row5}}</td>
													<td style="border: solid 1px; text-align: right;">{{ $day->row6}}</td>
												</tr>
												@endforeach
												@else
													<td style="border: solid 1px;">{{ $td }}</td>
													<td style="border: solid 1px; text-align: right;">0</td>
													<td style="border: solid 1px; text-align: right;">0</td>
													<td style="border: solid 1px; text-align: right;">0</td>
													<td style="border: solid 1px; text-align: right;">0</td>
													<td style="border: solid 1px; text-align: right;">0</td>
													<td style="border: solid 1px; text-align: right;">0</td>

													<!-- <h4 align="center"><i class=" icon-database-remove" style="font-size:140px;"></i> <br>No report data found </h4> -->		
												@endif
												<tr>
													<td style="border: solid 1px;"><strong>Total</strong></td>
													<td style="border: solid 1px; text-align: right;"><strong>{{$row1}}</strong></td>
													<td style="border: solid 1px; text-align: right;"><strong>{{$row2}}</strong></td>
													<td style="border: solid 1px; text-align: right;"><strong>{{$row3}}</strong></td>
													<td style="border: solid 1px; text-align: right;"><strong>{{$row4}}</strong></td>
													<td style="border: solid 1px; text-align: right;"><strong>{{$row5}}</strong></td>
													<td style="border: solid 1px; text-align: right;"><strong>{{$row6}}</strong></td>
												</tr>
											</thead>
										</table>
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
