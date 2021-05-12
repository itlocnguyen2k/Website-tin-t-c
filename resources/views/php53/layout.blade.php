<!DOCTYPE html>
<html>
<head>
	<title>layout</title>
	<meta charset="utf-8">
</head>
<body>
	<div class="wrapper">
		<header><h1>header</h1></header>
		<nav>
			<ul>
				<!-- muon len ket den dau thi su dung ham assets -->
				<li><a href="{{ asset('trangchu') }}">Trang chủ</a></li>
				<li><a href="{{ asset('lienhe') }}">Liên hệ</a></li>
			</ul>
		</nav>
		<aside class="left"><h1>left</h1></aside>
		<content class="main">
			<!-- trong file layout, muon do du lieu vao dau thi phai co tag sau -->
			@yield("do-du-lieu")
		</content>
		<aside class="right"><h1>right</h1></aside>
		<footer><h1>footer</h1></footer>
	</div>
	<style type="text/css">
		.wrapper{width: 1000px; margin:auto;}
		body,h1{padding:0px; margin:0px;}
		.left,.right{width: 200px; height: 400px; background: green; float: left;}
		.main{width: 600px; height: 400px; float: left;}
		header,footer{height: 100px; background: red; clear: both;}
		nav{background: black;}
		nav ul{padding:0px; margin:0px; list-style: none;}
		nav ul li{display: inline;}
		nav ul li a{color:white; padding:15px; line-height: 35px; text-decoration: none;}
	</style>
</body>
</html>