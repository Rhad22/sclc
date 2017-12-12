<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Global stylesheets -->
	<link type="text/css" href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/colors.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
	<script type="text/javascript" src="{{asset('js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/core/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/pages/login.js')}}"></script>

@yield('pagescript')
	<script type="text/javascript" src="{{asset('js/plugins/ui/ripple.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('js/plugins/notifications/bootbox.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/notifications/sweet_alert.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/selects/select2.min.js')}}"></script>
	<!-- /theme JS files --> 

    <!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('js/plugins/visualization/d3/d3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/ui/moment/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/pickers/daterangepicker.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/pages/dashboard.js')}}"></script>

    <script src="{{asset('js/graph/highcharts.js')}}"></script>


	<!-- /theme JS files -->

</head>
<body>
@if (Auth::guest())
    <div id="app">
        
        
@else
         @include('layouts.navbar') 
@endif
        @yield('content')

</div>    

 @if (Auth::guest())
     <script src="{{asset('js/app.js')}}"></script>
@endif 
     <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
     <script src="{{asset('js/graph/dashboardgraph.js')}}"></script>
     <script>
        CKEDITOR.replace( 'article-ckeditor' );
     </script>
</body>
</html>
