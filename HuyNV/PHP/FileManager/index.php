<?php require 'file-process.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>File Manager</title>
	<style type="text/css">
		.container {
			width: 1000px;
			margin: auto;
			background: #eee;
		}
	</style>
</head>
<body>
	<div class="container">

		<form action="dels-file.php" method="POST" accept-charset="utf-8">
			<table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
				<caption><h1>List text file</h1></caption>
				<thead>
					<tr>
						<th>Select</th>
						<th>Title</th>
						<th>Content</th>
						<th>Size</th>
						<th>Acction</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($file as $item) { ?>
					<tr>
						<td><input type="checkbox" name="check[]" value="<?php echo $item['name']; ?>"></td>
						<td><?php echo $item['title']; ?></td>
						<td><?php echo $item['content']; ?></td>
						<td><?php echo $item['size']; ?></td>
						<td><a href="edit-file.php?name=<?php echo $item['name']; ?>" title="Sửa">Sửa</a>|<a href="del-file.php?name=<?php echo $item['name']; ?>" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?');">Xóa</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<input type="submit" name="del" value="Xóa file" onclick="return confirm('Bạn có chắc muốn xóa?');">
		</form>
		<form action="add-file.php" method="POST" accept-charset="utf-8">
			<input type="submit" name="" value="Thêm file">
		</form>
	</div>
</body>
</html>