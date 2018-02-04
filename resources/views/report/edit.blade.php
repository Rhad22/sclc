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
							    <button type="submit" class="btn bg-teal legitRipple"><i class="icon-loop3 position-left"></i>Update report</button>
							</div>
                            {!! Form::close() !!}
						</div>
					</div>
		@include('layouts.footer')
	</div>
</div>
@endsection