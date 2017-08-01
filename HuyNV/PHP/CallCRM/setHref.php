<?php 
	require_once 'database.php';

	$user = getCall();

	echo $user['phone'];
 ?>