<?php 
	$all_file = file_get_contents('http://vnexpress.net/');
	// $all_file = "fadfrqrer".PHP_EOL."
	// fadfdf eqrqer
	// jofajdofsdf
	// fsfffqwer rfsdf
	// fadf";
	//$pattern = '/<div .*>(.*)<\/div>/';
	$pattern = '/<ul class\=\"list_news\" id\=\"news_home\">(.*)<\/ul>\s*<div class\=\"block_mid_new\">/imsU';
    $pattern_replace = '/\n/';

    //$source = preg_replace($pattern_replace, " ", $all_file);
    //echo $all_file;
	preg_match_all($pattern, $all_file, $match);

	$content = $match[1][0];
	// Get title
	//$pattern = '/<li>.*title=\"(.*)\".*<\/li>/imsU';
	// Get image
	//$pattern = '/<li>.*<img src=\"(.*)\".*<\/li>/imsU';
	// Get lead
	//$pattern = '/<li>.*<div class=\"news_lead\".*>(.*)<\/div>.*<\/li>/imsU';
	// Get link add
	$pattern = '/<li>.*<strong>.*href=\"(.*)\".*<\/li>/imsU';

	preg_match_all($pattern, $content, $match);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Get Files</title>
	<style type="text/css" media="screen">
		.container {
			width: 1200px;
			margin: auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<textarea name="" rows="50" style="width: 100%;"><?php var_dump($match); ?></textarea>
	</div>
</body>
</html>