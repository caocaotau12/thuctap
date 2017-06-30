<?php 
	if (isset($_GET['name'])) {
		require 'file-process.php';
		DelFile($_GET['name']);

		header('Location:index.php');
	}

	
 ?>