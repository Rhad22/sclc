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
										{!! Form::open(['action' => ['AnnouncementController@update', $announcements->id], 'method' => 'POST']) !!}
      									{{Form::hidden('_method', 'PUT')}}
											<div class="form-group">
												<label>Enter the title:</label>
												{{Form::text('title', $announcements->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
											</div>
											<div class="form-group" >
												<label>Message content:</label>
												{{Form::textarea('content', $announcements->content, ['class' => 'form-control', 'placeholder' => 'body', 'id' => 'article-ckeditor'])}}
											</div>
											<div class="text-right">
												<button type="submit" class="btn bg-teal">Save <i class=" icon-arrow-right14 position-right"></i></button>
											</div>
										{!! Form::close() !!} 
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