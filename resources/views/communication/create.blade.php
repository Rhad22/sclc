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
				</div>
			</div>

		<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Monitoring report<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							<div class="table-responsive">
                            {!! Form::open(['action' => 'CommunicationController@store', 'method' => 'POST']) !!}
								<table class="table table-framed">
									<thead>
										<tr>
											<th>A. Reach Up With God</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;1. No. of members following the yearly bible reading plan.</td>
											<td>Input number:{{Form::number('bible', '', ['class' => 'form-control', 'placeholder' => '0'])}}</td>
											
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;2. No. of members following the 777 Program.</td>
											<td>Input number:{{Form::number('seven', '', ['class' => 'form-control', 'placeholder' => '0'])}}</td>
											
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;3. No of church following the hour of worship format</td>
											<td>Input number:{{Form::number('worship', '', ['class' => 'form-control', 'placeholder' => '0'])}}</td>
											
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;4. No. of members following the revive by his prophet initiative</td>
											<td>Input number:{{Form::number('prophet', '', ['class' => 'form-control', 'placeholder' => '0'])}}</td>
											
										</tr>
									</tbody>
									<thead>
										<tr>
											<th>B. Reach Out With God</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;1. No. of church with directional signs.</td>
											<td>Input number:{{Form::number('signs', '', ['class' => 'form-control', 'placeholder' => '0'])}}</td>
											
										</tr>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;2. No. of cable head ends carrying hope channel.</td>
											<td>Input number:{{Form::number('hope', '', ['class' => 'form-control', 'placeholder' => '0'])}}</td>
											
										</tr>
									<tbody>
								</table>
                            
							</div>
                            <br>
                            <div class="text-right">
							    <button type="submit" class="btn btn-primary legitRipple"><i class="icon-paperplane position-left"></i>Send report</button>
							</div>
                            {!! Form::close() !!}
						</div>
					</div>
		@include('layouts.footer')
	</div>
</div>
@endsection