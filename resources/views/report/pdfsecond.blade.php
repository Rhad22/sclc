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
<div class="panel-heading">
	<center>
		<span>
			South-Central Luzon Conference<br>
			{{$content[$id][0]}}
			<br>
			<br>
		</span>
			<strong>2nd Quarter Report {{$year}}</strong>
			<br>
	</center>
	<br><br><br>
</div>
<table>
	<thead>
		<tr>
			<th class="data">Content</th>
			<th class="data"><strong>Apr.</strong></th>
			<th class="data"><strong>May.</strong></th>
			<th class="data"><strong>Jun.</strong></th>
			<th class="data"><strong>Total</strong></th>
			
		</tr>			
	</thead>
	<tbody>
	@for ($x = 1; $x < $length; $x++)
		<tr>
			<td>{{$content[$id][$x]}}</td>
			<td class="data">{{$m1->sum('row'.$x)}}</td>
			<td class="data">{{$m2->sum('row'.$x)}}</td>
			<td class="data">{{$m3->sum('row'.$x)}}</td>
			<td class="data"><strong>{{$mt->sum('row'.$x)}}</strong></td>
		</tr>
	@endfor
	</tbody>
</table>
<small style="margin-left: 5px">source: <u>{{$url}}</u></small>
