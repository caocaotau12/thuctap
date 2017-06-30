<?php
	require 'file-process.php';

	$errors = array();
	$data = array();
	if (isset($_POST['add'])) {
		$data['title'] = isset($_POST['title'])?$_POST['title']:'';
		$data['content'] = isset($_POST['content'])?$_POST['content']:'';

		if (strlen($data['title']) < 5 || strlen($data['title'] > 1000)) {
			$errors['title'] = "Tiêu đề từ 5 đến 1000 kí tự.";
		}

		if (strlen($data['content']) < 10 || strlen($data['content'] > 5000)) {
			$errors['content'] = "Tiêu đề từ 5 đến 1000 kí tự.";
		}

		if (empty($errors)) {
			AddFile($data['title'], $data['content']);
			unset($errors);
			header('Location:index.php');
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		.container {
			width: 1000px;
			margin: auto;
			background: #eee;
			padding: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<a href="index.php" title="Quay lại">Quay lại</a>
		<form action="" method="post" accept-charset="utf-8">
			<h1 style="text-align: center;">Thêm File</h1>
			<div style="width: 20%; float: left;">
				<p style="float: right;">Title</p>
			</div><input type="text" name="title" value="<?php echo isset($data['title'])?$data['title']:''; ?>" placeholder="Tittle" style="width: 78%; float: right; height: 30px;"><br>
			<div style="clear: both;"></div>
			<?php if (!empty($errors['title'])) { ?>
				<p style="color: red; margin-left: 22%; margin-top: 0;"><i><?php echo $errors['title']; ?></i></p>
			<?php } ?>
			<div style="width: 20%; float: left;"><p style="float: right;">Content</p>
			</div><textarea name="content" rows="5" style="width: 78%; float: right;"><?php echo isset($data['content'])?$data['content']:''; ?></textarea>
			<div style="clear: both;"></div>
			<?php if (!empty($errors['content'])) { ?>
				<p style="color: red; margin-left: 22%;"><i><?php echo $errors['content']; ?></i></p>
			<?php } ?>
			<input type="submit" name="add" value="Thêm" style="width: 100px; height: 30px; margin-left: 22%; margin-top: 10px;">
		</form>
	</div>
</body>
</html>