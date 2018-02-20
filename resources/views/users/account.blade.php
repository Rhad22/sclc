@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
	<h3><span class="text-semibold">Employees</span></h3>
		<div>
			<div class="page-header-content"></div>
				<div class="breadcrumb-line breadcrumb-line-component">
					<ul class="breadcrumb">
						<li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
						<li><a href="/users">Employees</a></li>
						<li class="active">List</li>
					</ul>
					<ul class="breadcrumb-elements">
						<li><a href="{{ route('register') }}"><i class="icon-user-plus position-left"></i> Add Employee</a></li>
					</ul>
				</div>
			</div>

				<div class="row">
					@foreach($users as $user)
					<div class="col-lg-4 col-md-4">
						<div class="panel panel-body">
							<div class="media">
								<div class="media-left">
									<a href="/myprofile/{{$user->email}}" data-popup="lightbox">
										<img src="{{Storage::url($user->profile_pic)}}" class="img-circle img-lg" alt="">
									</a>
								</div>

								<div class="media-body">
									<h6 class="media-heading">{{$user->firstname . ' '. $user->lastname}} @if ($user->isBan == 1) <span class="label label-danger">Deactivated</span> @endif</h6>
									<span class="text-muted">{{$user->position}} 
									</span>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="/edituser/{{$user->id}}" data-popup="tooltip" title="Edit Profile">
												<i class="icon-menu7"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
				{{ $users->links() }}
				</div>

	
<div>		
@endsection