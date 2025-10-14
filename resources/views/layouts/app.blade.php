<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
					content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		@vite('resources/css/app.css')
		<title>@yield('title')</title>
		<style>
			body {
				font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', sans-serif;
				color: #f0d0b0;
				background-color: #206060;
				padding: 10px;
				border: 20px;
				height: 30px;
				margin: 7px;
			}
			td {
				text-align: center;
				padding: 5px;
			}
			nav {
				background-color: #606060;
				border: 3px solid #303030;
				border-radius: 30px;	
				padding: 10px;
				margin: 7px;
			}
			select {
				background-color: #604020;
				color: #80a0c0;
			}
			a button {
				color: #f0a0a0;
			}
			b {
				color: #b0d0f0;
			}
			textarea, input, button {
				color: #d0f0b0;
				background-color: #404040;
				border-radius: 30px;
				padding: 10px;
				margin: 7px;
			}
			button h1 {
				color: #b0d0f0;
				margin: 7px;				
			}
			label {
				font-weight: bold;
			}
			items-center {
				color: #305f01ff;
			}
		</style>
	</head>
	<body>
		<table>
			<tbody>
				<x-middle_row>@include('partials.nav')</x-middle_row>
				<x-middle_row><h1>@yield('title')</h1></x-middle_row>
				<x-middle_row>@yield('content')</x-middle_row>
			</tbody>
		</table>
	</body>
</html>