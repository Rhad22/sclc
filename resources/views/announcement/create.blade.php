@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
	<h3><span class="text-semibold"> Announcements</span></h3>
	@include('layouts.messages')
		<div>
			<div class="page-header-content"></div>
				<div class="breadcrumb-line breadcrumb-line-component">
					<ul class="breadcrumb">
						<li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
						<li><a href="/announcements">Announcements</a></li>
						<li class="active">List</li>
					</ul>
					{{--  @if (Auth::user()->user_postion !== 'District Pastor')  --}}
					<ul class="breadcrumb-elements">
						<li><a href="/announcements/create"><i class="icon-pencil7 position-left"></i> Create Post</a></li>
					</ul>
					{{--  @endif  --}}
				</div>
			</div>
			<div class="container-detached">
				<div class="content-detached">
					<div class="panel panel-white">
						<div class="panel panel-flat">	
							<div class="panel-body">
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<br>
										<form class="form-horizontal" role="form" method="POST" action="{{ route('announcements.index')}}">
                        				{{ csrf_field() }}
											<div class="form-group">
												<label>Enter the title:</label>
												<input type="text" class="form-control" placeholder="Title here" id="title" name="title">
											</div>
											<div class="form-group" >
													<label>Message content:</label>
													<textarea rows="5" cols="5" id="article-ckeditor" class="form-control" placeholder="Enter your message here" id="body" name="content"></textarea>
											</div>
											<div class="text-right">
													<button type="submit" class="btn btn-primary"><i class="icon-paperplane position-left"></i>post </button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('layouts.footer')
		</div>
	</div>
</div>
@endsection 