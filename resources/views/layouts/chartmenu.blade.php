			
						<button class="dropdown-toggle" data-toggle="dropdown">Department <i class="caret"></i></button>
			                <ul class="dropdown-menu dropdown-menu-left">
			                @if ($profile->dept < 1)
								@include('layouts.listchart.com')
								@include('layouts.listchart.child')
								@include('layouts.listchart.women')
								@include('layouts.listchart.min')
								@include('layouts.listchart.steward')
								@include('layouts.listchart.health')
								@include('layouts.listchart.personal')
							@elseif ($profile->dept < 2)
								@include('layouts.listchart.com')
							@elseif ($profile->dept < 3)
								@include('layouts.listchart.child')
							@elseif ($profile->dept < 4)
								@include('layouts.listchart.women')
							@elseif ($profile->dept < 5 )
								@include('layouts.listchart.min')
							@elseif ($profile->dept < 6 )
								@include('layouts.listchart.steward')
							@elseif ($profile->dept < 7)
								@include('layouts.listchart.health')
							@else
								@include('layouts.listchart.personal')
							@endif
							</ul>
				