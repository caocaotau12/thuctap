<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mobile GUI</title>
	<script src="jquery.min.js" type="text/javascript"></script>
	<style type="text/css">
		.container {
			width: 90%;
			margin: auto;
		}

		a {
			appearance: button;
			-webkit-appearance: button;
			width: 100%;
			padding: 15px 5px;
			color: blue;
			background: #eee;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="container" id="annount">
		<a href="" title="Gọi">Click để gọi ngay!</a>
	</div>

	<script>
		setInterval(function() {
			$.ajax({
				url : 'setHref.php',
				success : function(result) {
					result = 'tel:' + result;
					$('#annount a').attr('href', result);
				}
			});
		}, 1000);
	</script>
</body>
</html>