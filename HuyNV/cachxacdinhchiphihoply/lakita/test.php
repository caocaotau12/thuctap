<?php 
	require_once("Rest_client/Rest_Client.php");

	$config0 = array(
    'server' => 'http://api.lakita.vn/',
    'api_key' => 'RrF3rcmYdWQbviO5tuki3fdgfgr4',
    'api_name' => 'lakita-key',
	);
	$restClient0 = new Rest_Client($config0);
	//$code_landing = 'http://'.$_SERVER['SERVER_NAME'];
	$uri0 = "landingpage/price/".$_SERVER['SERVER_NAME'];
	$result0 = $restClient0->get($uri0);
	$rs = json_decode($result0);
	echo $uri0 . '<br>';
	var_dump($rs);
 ?>