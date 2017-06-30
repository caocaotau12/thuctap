<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Datetime</title>
	<link rel="stylesheet" href="">
	<style>
		.container {
			width: 500px;
			margin: auto;
			background: #eee;
		}
	</style>
</head>
<body>
	<div id="block" class="container">
		<form method="post">
			<input id="time" type="datetime-local" step="1" name="time"">
			<input type="submit" name="Convert"><br/>
			<?php
				if (isset($_POST['Convert'])) {
					if (isset($_POST['time'])) {
						date_default_timezone_set("Asia/Ho_Chi_Minh");
						$now = date('Y-m-d H:i:s');
						$time = date( "Y-m-d H:i:s", strtotime($_POST['time']) );
						$year_input = date("Y", strtotime($time));
						$month_input = date("m", strtotime($time));
						$day_input = date("d", strtotime($time));
						$hour_input = date("H", strtotime($time));
						$minute_input = date("i", strtotime($time));
						$second_input = date("s", strtotime($time));
						echo $time . "<br/>";

						if ($time < $now) {
							$d = strtotime($now) - strtotime($time);
							
							if ($d > 86400*3) {
								echo $day_input . " tháng " . $month_input . " năm " . $year_input . " on " . $hour_input . ":" . $minute_input;
							}
							elseif ($d <= 86400*3 && $d > 86400) {
								echo floor($d/86400) . " days ago.";
							}
							elseif ($d <= 86400 && $d > 3600) {
								echo floor($d/3600) . " hours ago.";
							}
							elseif ($d <= 3600 && $d > 60) {
								echo floor($d/60) . " minutes ago.";
							}
							else {
								echo $d . " second ago.";
							}
						}
						else {
							echo "Thời gian lớn hơn hiện tại.";
						}
					}
				}
			?>
		</form>
	</div>
</body>
</html>