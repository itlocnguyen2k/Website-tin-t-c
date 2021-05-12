<!DOCTYPE html>
<html>
<head>
	<title>view4</title>
	<meta charset="utf-8">
</head>
<body>
<form method="post">
	@csrf
	<fieldset style="width: 300px; margin:auto;">
		<legend>Cộng 2 số</legend>
		<table cellpadding="5">
			<tr>
				<td>Số 1</td>
				<td><input type="number" value="<?php echo Request::get("so1"); ?>" name="so1"></td>
			</tr>
			<tr>
				<td>Số 2</td>
				<td><input type="number" value="<?php echo Request::get("so2"); ?>" name="so2"></td>
			</tr>
			<!-- yeu cau ket qua: VD: 1 + 1 = 2 -->
			<?php 
				$so1 = Request::get("so1") != "" ? Request::get("so1") : 0;
				$so2 = Request::get("so2") != "" ? Request::get("so2") : 0;
				$ketqua = $so1 + $so2;
			 ?>
			<tr>
				<td>Kết quả</td>
				<td><input type="text" value="<?php echo "$so1 + $so2 = $ketqua"; ?>" name="ketqua"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Cộng 2 số"></td>
			</tr>
		</table>
	</fieldset>
</form>
</body>
</html>