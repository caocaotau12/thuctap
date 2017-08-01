<?php require 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Desktop GUI</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="jquery.min.js" type="text/javascript"></script>
	<style type="text/css">
		.container {
			width: 80%;
			margin: auto;
		}

		.phone-cell:hover {
			cursor: pointer;
			background: #eee;
		}

		#success {
			position: fixed;
			bottom: 30px;
			right: -200px;
			padding: 5px;
			font-size: 30px;
			background: #419641;
			color: white;
			transition: all 0.5s ease-in-out;
		}
	</style>
</head>
<body>
	<div class="container">
		<table border="1" cellpadding="5" cellspacing="0">
			<thead>
				<tr>
					<th>ID</th>
					<th>NAME</th>
					<th>PHONE</th>
					<th>EMAIL</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$users = getAllUsers();
				foreach ($users as $item) { ?>
				<tr class="phone-cell">
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['name']; ?></td>
					<td><?php echo $item['phone']; ?></td>
					<td><?php echo $item['email']; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<div id="success">
		<i class="fa fa-check" aria-hidden="true"></i>Sẵn sàng gọi
	</div>

	<script type="text/javascript">
		
		$('.phone-cell').click(function() {
			var name = $($(this).children()[1]).html();
			var phone = $($(this).children()[2]).html();

			$.ajax({
				url : 'setCallNow.php',
				type : 'post',
				data : {
					name : name,
					phone : phone
				},
				success : function() {
					$('#success').css('right','200px');
					setTimeout(function() {
						$('#success').css('right','-200px');
					},1000);
				}
			});
		});
	</script>
</body>
</html>