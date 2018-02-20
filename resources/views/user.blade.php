<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<div id="app">
		<div v-for="user in list">
            @{{user.firtname}}
    	</div>
	</div>
	<script type="text/javascript" src="js/app.js"></script>

</body>
</html>