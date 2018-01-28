@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
		<h3><span class="text-semibold">Notifications</span></h3>
		<div>
			<div class="page-header-content"></div>
				<div class="breadcrumb-line breadcrumb-line-component">
					<ul class="breadcrumb">
						<li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
						<li><a href="/users">Notification</a></li>
						<li class="active">List</li>
					</ul>
				</div>
		</div>

		<div class="panel panel-flat">
			
				<table class="table">
					<tbody>
						@foreach ($allnotify as $notify)
						@if ($notify->sender !== Auth::user()->id)
						<tr>
							<td @if ($notify->read == 0) style="background: #edf2fa; " @endif ><a class="table-inbox-subject letter-icon-title text-default" @if ($notify->type < 1)
                                                href="/report/dept={{$notify->dept_id}}/{{$notify->link_id}}/{{$notify->id}}"
                                            @elseif ($notify->type < 2) 
                                                href="/announcements/{{$notify->link_id}}/{{$notify->id}}"
                                            @else
                                                href="/myprofile/{{$notify->link_id}}/{{$notify->id}}"
                                            @endif><div class="col-md-1 col-xs-2"><img src="{{Storage::url($notify->profile_pic)}}" class="img-circle img-lg" alt=""></div>  <div class="col-md-11 col-xs-10"><b>{{$notify->firstname}} {{$notify->lastname}}</b> {{$notify->content}} <br> <span class="media-annotation">@if ($notify->type == 0)
                                            	<i class=" icon-file-plus"></i> @else <i class="icon-paperplane"></i> @endif  {{$notify->created_at->diffForHumans()}} ...</span> </div></a></td>

						</tr>
						@endif 
						@endforeach
					</tbody>
				</table>
			</div>
		
    	@include('layouts.footer')
	</div>
</div>
@endsection 