@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
	<h3><span class="text-semibold">Users</span></h3>
		<div>
			<div class="page-header-content"></div>
				<div class="breadcrumb-line breadcrumb-line-component">
					<ul class="breadcrumb">
						<li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
						<li><a href="/users">Users</a></li>
						<li class="active">List</li>
					</ul>
					<ul class="breadcrumb-elements">
						<li><a href="{{ route('register') }}"><i class="icon-user-plus position-left"></i> Add User</a></li>
					</ul>
				</div>
			</div>
			
			<div>
				@if (count($users)> 0)
					<div class="datatable-header">
						<div id="DataTables_Table_0_filter" class="dataTables_filter">
							<label><span>Search user:</span> <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_0"></label>
						</div>
					</div>

					<div class="row">
						@foreach($users as $user)
						<div class="col-lg-3 col-md-6">
							<div class="thumbnail no-padding">
								<div class="thumb">
									<img src="{{Storage::url($user->profile_pic)}}" alt="">
									<div class="caption-overflow">
										<span>
											<a href="assets/images/demo/images/3.png" class="btn bg-success-400 btn-icon btn-xs legitRipple" data-popup="lightbox"><i class="icon-plus2"></i></a>
											<a href="/show/{{$user->id}}" class="btn bg-success-400 btn-icon btn-xs legitRipple"><i class="icon-link"></i></a>
										</span>
									</div>
								</div>
							
						    	<div class="caption text-center">
						    		<h6 class="text-semibold no-margin">{{$user->firstname . ' '. $user->lastname}}<small class="display-block">{{$user->position}}</small></h6>
					    			
						    	</div>
					    	</div>
						</div>
						@endforeach
					</div>
						<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
							{{ $users->links() }}
						</div>
				@endif	
			</div>
			@include('layouts.footer')	
		</div>
	</div>
<div>		
@endsection