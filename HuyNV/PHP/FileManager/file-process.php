<?php
	$folder = 'files/';

	function rand_string( $length ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$size = strlen( $chars );
		$str = '';
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}

	function GetAllFile() {
		global $folder;
		$list = scandir($folder);
		$result = array();
		
		foreach ($list as $item) {
			if (!is_dir($folder.$item)) {
				$result[] = $item;
			}
		}

		return $result;
	}

	function GetContentFiles() {
		global $folder;
		$txtFiles = GetAllFile();
		$result = array();

		foreach ($txtFiles as $item) {
			$file = fopen($folder.$item, 'r') or exit('error!');
			$size = filesize($folder.$item);
			$title = substr(fgets($file), strlen("title:"));
			$content = '';
			while(!feof($file))
			{
			    $content .= fgets($file);
			}
			fclose($file);

			$result[] = array('title' => $title, 'content' => $content, 'size' => $size, 'name' => $item);
		}

		return $result;
	}

	function GetContentByName($fileName) {
		global $folder;
		
		$result = array();

		$file = fopen($folder.$fileName, 'r') or exit('error!');
		$title = substr(fgets($file), strlen("title:"));
		$content = '';
		while(!feof($file))
		{
		    $content .= fgets($file);
		}
		fclose($file);

		$result['title'] = $title;
		$result['content'] = $content;

		return $result;
	}

	function AddFile($title, $content) {
		global $folder;
		$str = "title:" . $title . PHP_EOL;
		$fileName = rand_string(5) . ".txt";

		$file = fopen($folder.$fileName, 'w') or exit('errors!');
		fwrite($file, $str);
		fwrite($file, $content);
		fclose($file);
	}

	function DelFile($fileName) {
		global $folder;

		$file = $folder . $fileName;

		if (file_exists($file)) {
			unlink($file);
		}
	}

	function UpdateFile($fileName,$title,$content) {
		global $folder;

		$str = "title:" . $title . PHP_EOL;

		$file = fopen($folder.$fileName, 'w') or exit('errors!');
		fwrite($file, $str);
		fwrite($file, $content);
		fclose($file);
	}

	$file = GetContentFiles();
	//var_dump($file);
	//echo rand_string(5);
	//AddFile("Con chó lợn", "Người yêu ơi có biết anh nhớ em nhiều lắm");

	//DelFile('tOVam');
	//var_dump(GetContentByName("LamTotBaiTap.txt"));

	//UpdateFile("vsOlX.txt","Con chó lợn","Làm người yêu anh nhé baby!");

	//var_dump(strlen("231321312321"));
?>