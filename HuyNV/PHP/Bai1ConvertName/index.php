<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Test</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form method="post" style="margin: auto; width: 600px;">
		Username: <input type="text" name="username" value="">
		<input type="submit" name="check" value="Check!">
		<h1>
		<?php 
			if (isset($_POST['check'])) {
				if (isset($_POST['username'])) {
					$input = $_POST['username'];
					my_convert($input);
					echo ucfirst($input);
				}
			}

			function mb_substr_replace($str, $repl, $start, $length = null)
			{
			    preg_match_all('/./us', $str, $ar);
			    preg_match_all('/./us', $repl, $rar);
			    $length = is_int($length) ? $length : utf8_strlen($str);
			    array_splice($ar[0], $start, $length, $rar[0]);
			    return implode($ar[0]);
			}

			function my_convert(&$name) {
				$temp = trim($name);
				$name = '';
				$arr = explode(' ', $temp);
				mb_internal_encoding('UTF-8');
				for ($i=0; $i < count($arr); $i++) {
					trim($arr[$i]);
					$arr[$i] = mb_substr_replace($arr[$i], mb_strtoupper(mb_substr($arr[$i], 0, 1)), 0, 1);
				}

				$name = implode(' ', $arr);
			}
		?>
		</h1>
	</form>
</body>
</html>