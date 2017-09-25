@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="content">
		<h3>ako</h3>
		<p>Content</p>
        {{$user}}
		@include('layouts.footer')
        
	</div>
</div>
@endsection