
	<table class="table">
								<thead>
									<tr>
										<th>Author</th>
										<th>Title</th>
										<th>Status</th>
										<th>Comments</th>
										<th>Likes</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									@foreach($announcements as $announcement)
									<tr>
										<td><a href="#" class="letter-icon-title text-default "><img src="{{Storage::url($announcement->profile_pic)}}" class="img-circle img-lg" alt=""> {{$announcement->firstname}} {{$announcement->lastname}}</a></td>
										<td><a href="/announcements/{{$announcement->id}}"><span class="table-inbox-subject letter-icon-title text-default">{{$announcement->title}}</span></a></td>
										<td><span class="label label-success">Active</span></td>
										<td>None</td>
										<td>None</td>
										<td>{{$announcement->created_at->diffForHumans()}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>

