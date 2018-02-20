<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style >
	table {
    	border-collapse: collapse;
	}

	table {
		width: 100%;
	}
	table, th, td {
		
    	border: 1px solid black;
    	padding: 1px 5px 1px 5px;
	}
	.data {
		text-align: center;
	}
</style>
<div>
	<center>
		<span>
			South-Central Luzon Conference<br>
			{{$dept[$id]}}
			<br>
			<br>
		</span>
			<strong>Monthly Report of {{$hmonth}} {{$year}}</strong>
			<br>
	</center>
	<br><br><br>
</div>
<table >
	<tr>
		<th class="data">Content</th>
		@for ($i=0; $i < $days ; $i++) 
		<th class="data">{{$i + 1}}</th>
		@endfor
		<th class="data">Total</th>
	</tr>
					
	@for ($x = 1; $x < $length; $x++)
	<tr>
		<td>{{$content[$id][$x]}}</td>
		@for ($i=0; $i < $days ; $i++)
		<td class="data">{{$data[$x][$i]}}</td>
		@endfor
		<td class="data"><strong>{{$total[$x]}}</strong></td>
	</tr>
	@endfor				
</table>
<small style="margin-left: 5px">
	@if (Auth::user()->position !== 'District Pastor')
		Summary report of 
		@foreach ($names as $name)
			<u>{{$name->firstname}} {{$name->lastname}}</u>,
		@endforeach	
	@endif
</small><br>
<small style="margin-left: 5px">source: <u>{{$url}}</u></small>

