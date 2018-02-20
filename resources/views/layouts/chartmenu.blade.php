	<button class="dropdown-toggle" data-toggle="dropdown">Department <i class="caret"></i></button>
		<ul class="dropdown-menu dropdown-menu-right" style="height:400px; overflow-y: scroll; width: 440px;">
		@if (Auth::user()->position == 'Admin')

			@for ($y = 1; $y < 11; $y++)
				<li class="dropdown-header bg-teal">{{$dept[$y]}}<li>
					
						@for ($x = 1; $x < count($content[$y]); $x++)
							<li><a href="/home/{{$y}}/{{$x}}">{{$content[$y][$x]}}</a></li>
						@endfor
					
			@endfor
		@endif

		@if (Auth::user()->position == 'Director')
			@foreach ($sidebar as $side)
				<li class="dropdown-header bg-teal">{{$dept[$side->dept]}}</li>
					
						@for ($x = 1; $x < count($content[$side->dept]); $x++)
							<li><a href="/home/{{$side->dept}}/{{$x}}">{{$content[$side->dept][$x]}}</a></li>
						@endfor
					
			@endforeach
		@endif

		@if (Auth::user()->position == 'Secretary')
			@foreach ($sidebar as $side)
				<li class="dropdown-header bg-teal">{{$dept[$side->dept]}}</li>
					
						@for ($x = 1; $x < count($content[$side->dept]); $x++)
							<li><a href="/home/{{$side->dept}}/{{$x}}">{{$content[$side->dept][$x]}}</a></li>
						@endfor
					
			@endforeach
		@endif
		</ul>
							
                          

                            
							

					