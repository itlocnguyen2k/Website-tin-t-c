<!DOCTYPE html>
<html>
<head>
	<title>view3</title>
	<meta charset="utf-8">
</head>
<body>
<form method="post" action="">
	<!-- trong laravel, de thuc hien form the phai co the sau -->
	@csrf 
	<fieldset style="width: 300px; margin:auto;">
		<legend>Form</legend>
		<input type="text" name="txt" required> 
		<input type="submit" value="Go">
		<!-- su dung goi tuong Request::get("tenformcontroler") de lay du lieu. Doi tung nay su dung duoc cho ca get, post -->
		<h1><?php echo Request::get("txt"); ?></h1>
	</fieldset>
</form>
</body>
</html>