<table>
	<th></th>
	@for ($i=0; $i < $days ; $i++) 
	<th>{{$i + 1}}</th>
	@endfor
	@for ($x = 0; $x < $length; $x++)
	<tr>
		<td>{{$content[$id][$x]}}</td>
		@for ($i=0; $i < $days ; $i++)
		<td>{{$data[$x][$i]}}</td>
		@endfor
	</tr>
	@endfor
</table>