@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
	<h3><span class="text-semibold">{{$content[$id][0]}}</span></h3>
		<div>
			<div class="page-header-content"></div>
				
				<div class="breadcrumb-line breadcrumb-line-component">
					<ul class="breadcrumb">
						<li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
						<li><a href="/report/dept={{$id}}">{{$content[$id][0]}}</a></li>
						<li class="active">List</li>
					</ul>
					{{--  @if (Auth::user()->user_postion == 'District Pastor')  --}}
					<ul class="breadcrumb-elements">
							<li><a href="/report/dept={{$id}}/create"><i class="icon-pencil7 position-left"></i>Create report</a>
					        </li>
					        <li class="dropdown">
					            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-calendar3 position-left"></i>Type of report <b class="caret"></b></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#">Monthly</a></li>
									<li class="dropdown-submenu dropdown-submenu-left">
										<a href="#">Quarterly</a>
										<ul class="dropdown-menu">
											<li><a href="/report/dept={{$id}}/1st">1st quarter</a></li>
											<li><a href="/report/dept={{$id}}/2nd">2nd quarter</a></li>
											<li><a href="/report/dept={{$id}}/3rd">3rd quarter</a></li>
											<li><a href="/report/dept={{$id}}/4th">4rd quarter</a></li>
										</ul>
									</li>
									<li><a href="/report/dept={{$id}}">Yearly</a></li>
								</ul>
					        </li>
							<li>
								
							</li>
					                	
					</ul>
						{{--  @endif  --}}
				
					
				</div>
				@include('layouts.messages')
				<div style="text-align: right;">
					{!! Form::open(['action' => ['ReportController@first', $id], 'method' => 'GET']) !!}
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
					{!! Form::close() !!}
				</div>
			<div> 
								
		   
		</div>


		<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title data">
								South-Central Luzon Conference<br>
								{{$content[$id][0]}}<br><br>
								<strong>2st Quarter Report {{$year}}</strong>
							</h5>
							
						</div>

						<div class="panel-body">
							<div class="table-responsive ">
								
								<table class="table table-framed table-hover">
									<thead>
										<tr>
											<th></th>
											<th class="data"><strong>Apr.</strong></th>
											<th class="data"><strong>May.</strong></th>
											<th class="data"><strong>Jun.</strong></th>
											<th class="data"><strong>Total</strong></th>
									</thead>
									<tbody>
										@for ($x = 1; $x < $length; $x++)
										<tr>
											<td>
												{{$content[$id][$x]}}
											</td>
											<td class="data">{{$m1->sum('row'.$x)}}</td>
											<td class="data">{{$m2->sum('row'.$x)}}</td>
											<td class="data">{{$m3->sum('row'.$x)}}</td>
											<td class="data"><strong>{{$mt->sum('row'.$x)}}</strong></td>
											
										</tr>
										@endfor
									</tbody>
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
