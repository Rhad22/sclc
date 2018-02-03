<style >
	table {
    	border-collapse: collapse;
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
			<strong>Yearly Report as of ({{$year}})</strong>
			<br>
	</center>
	<br><br><br>
</div>
<table >
	<thead>
		<tr>
			<th class="data">Content</th>
			<th class="data">1st Qr.</th>
			<th class="data">2nd Qr.</th>
			<th class="data">3rd Qr.</th>
			<th class="data">4th Qr.</th>
			<th class="data"><strong>Total</strong></th>
						
		</tr>
	</thead>
	<tbody>
		@for ($x = 1; $x < $length; $x++)
		<tr>
			<td>{{$content[$id][$x]}}</td>
			<td class="data">{{$qr1->sum('row'.$x)}}</td>
			<td class="data">{{$qr2->sum('row'.$x)}}</td>
			<td class="data">{{$qr3->sum('row'.$x)}}</td>
			<td class="data">{{$qr4->sum('row'.$x)}}</td>
			<td class="data"><strong>{{$qrt->sum('row'.$x)}}</strong></td>
		</tr>
		@endfor
	</tbody>
</table>
<small style="margin-left: 5px">source: <u>{{$url}}</u></small>
