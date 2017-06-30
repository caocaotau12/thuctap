<?php
	require 'file-process.php';
	if (isset($_POST['del'])) {
		$listDel = array();
		$listDel = isset($_POST['check'])?$_POST['check']:array();
		if (!empty($listDel)) {
			foreach ($listDel as $item) {
				DelFile($item);
			}
		}
		header('Location:index.php');
	}
?>