@extends('layouts.app')

@section('pagescript')
    <script type="text/javascript" src="{{asset('js/pages/datatables_extension_fixed_columns.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/tables/datatables/extensions/fixed_columns.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content')
<div class="content-wrapper">
	<div class="content">
		<h3><span class="text-semibold">{{$dept[$id]}}</span></h3>
		<div>
			<div class="page-header-content"></div>
			<div class="breadcrumb-line breadcrumb-line-component">
				<ul class="breadcrumb">
					<li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
					<li><a href="/report/dept={{$id}}">{{$dept[$id]}}</a></li>
					<li class="active">List</li>
				</ul>

				{{--  @if (Auth::user()->user_postion == 'District Pastor')  --}}

				<ul class="breadcrumb-elements">
					<li><a href="/report/dept={{$id}}/create"><i class="icon-pencil7 position-left"></i>Create report</a>
					        </li>
					        <li class="dropdown">
					            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-calendar3 position-left"></i>Type of report <b class="caret"></b></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="/report/dept={{$id}}/monthly">Monthly</a></li>
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
				{!! Form::open(['action' => ['ReportController@monthly', $id], 'method' => 'GET']) !!}
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

			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title data">
						South-Central Luzon Conference<br>
						{{$dept[$id]}}<br><br>
						<strong>Monthly Report of {{$hmonth}} {{$year}}</strong>
					</h5>	
				</div>
				@if (Auth::user()->position == 'District Pastor')
					<table class="table datatable-fixed-left" width="100%">
						<thead>
							<th></th>
							@foreach ($sdata as $data)
							<th>{{$data['created_at']}} <a href="/report/dept={{$id}}/edit/{{$data->id}}"><div class="letter-icon-title text-default"><i data-popup="tooltip" title="" data-placement="top" id="top" data-original-title="click to edit report">edit</i></div></a></th>
							@endforeach
						</thead>
						<tbody>
							@for ($x = 1; $x < $length; $x++)
							<tr>
								<td>{{$content[$id][$x]}}</td>
								@foreach ($sdata as $data)
								<td>{{$data['row'. + $x]}}</td>
								@endforeach

							</tr>
							@endfor
						</tbody>
					</table>

				@else
				<table class="table datatable-fixed-left" width="100%">
							<thead>
								<th ></th>
								@for ($i=0; $i < $days ; $i++) 
								<th>{{$i + 1}}</th>
								@endfor
								<th>Total</th>
							</thead>
							<tbody>
								@for ($x = 1; $x < $length; $x++)
								<tr>
									<td >{{$content[$id][$x]}}</td>
									@for ($i=0; $i < $days ; $i++)
									<td >{{$data[$x][$i]}}</td>
									@endfor
									<td>{{$total[$x]}}</td>
								</tr>
								@endfor
							</tbody>
						</table>
				@endif


										<!-- <a href="/communication/edit"><div class="letter-icon-title text-default"><i data-popup="tooltip" title="" data-placement="top" id="top" data-original-title="click to edit report">awe</i></div></a> -->
											
					
			</div>
				<div style="text-align: right;">
					<a href="#" class="btn btn-primary legitRipple"><i class="icon-printer"></i> <span class="hidden-xs position-right">Print</span></a>
				</div>

		@include('layouts.footer')
		</div>
	</div>
</div>
		
@endsection
