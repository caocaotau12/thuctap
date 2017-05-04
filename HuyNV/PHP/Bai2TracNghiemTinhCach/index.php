<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trắc nghiệm tính cách</title>
	<link rel="stylesheet" href="">
	<style>
		.container {
			width: 900px;
			height: auto;
			margin: auto;
			background: #eee;
			padding: 15px;
			position: relative;
		}

		.but {
			width: 100px;
			height: 45px;
			margin-left: 40%;
		}

		.question {
			color: green;
			font-size: 20px;
			margin: 0;
			margin-bottom: -20px;
		}

		.contain {
			width: 500px;
			height: 150px;
			background: white;
			position: absolute;
			top: 40%;
			left: 30%;
			padding: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
	<form action="" method="post">
		<?php
			/**
			* Question class save question content
			*/
			class Question
			{
				var $id;
				var $content;
				function Show()
				{
					echo $this->content;
				}
			}

			/**
			* Option class save answers
			*/
			class Option
			{
				var $id;
				var $opt;
				var $content;
				var $point;
			}

			/**
			* Result
			*/
			class Result
			{
				var $min;
				var $max;
				var $reply;
			}

			/**
			* Processer object
			*/
			class Processer
			{
				var $listID = array();
				function GetQuestions()
				{
					$fp = @fopen('question.txt', "r");
					$ArrQuestion = array();
					
					if (!$fp) {
						echo 'Mở file không thành công!';
					}
					else {
						while (!feof($fp)) {
							$line = fgets($fp);
							$que = new Question();
							$que->id = explode('|', $line)[0];
							$que->content = explode('|', $line)[1];
							array_push($ArrQuestion, $que);
						}

						return $ArrQuestion;
					}
				}

				function GetResults()
				{
					$fp = @fopen('result.txt', "r");
					$ArrResult = array();
					
					if (!$fp) {
						echo 'Mở file không thành công!';
					}
					else {
						while (!feof($fp)) {
							$line = fgets($fp);
							$res = new Result();
							$res->min = explode('|', $line)[0];
							$res->max = explode('|', $line)[1];
							$res->reply = explode('|', $line)[2];
							array_push($ArrResult, $res);
						}

						return $ArrResult;
					}
				}

				function GetAnswers() {
					$fp = @fopen('options.txt', "r");
					$ArrAnswer = array();
					
					if (!$fp) {
						echo 'Mở file không thành công!';
					}
					else {
						while (!feof($fp)) {
							$line = fgets($fp);
							$ans = new Option();
							$ans->id = explode('|', $line)[0];
							$ans->opt = explode('|', $line)[1];
							$ans->content = explode('|', $line)[2];
							$ans->point = explode('|', $line)[3];
							array_push($ArrAnswer, $ans);
						}

						return $ArrAnswer;
					}
				}

				function ShowQuestion() {
					$listQuestion = $this->GetQuestions();
					$listOption = $this->GetAnswers();
					for ($i=1; $i < count($listQuestion); $i++) {
						array_push($this->listID, $listQuestion[$i]->id);
						$p = "<p class=\"question\">Câu hỏi ";
						$p = $p . $i . ": " . $listQuestion[$i]->content . "</p><br />";
						echo $p;
						for ($j=1; $j < count($listOption); $j++) { 
							if ($listOption[$j]->id == $listQuestion[$i]->id) {
								$input = "<input type=\"radio\" name=\"";
								$input = $input . $listOption[$j]->id . "\" value=\"" . $listOption[$j]->point . "\">" . $listOption[$j]->content . "<br />";
								echo $input;
							}
						}
					}
				}

				function ShowResult($str) {
					$div = "<div class=\"contain\"><p>" . $str . "</p><input type=\"submit\" value=\"Close\" onclick=\"\"></div>";
					echo $div;
				}

				function Start() {
					$total = 0;
					$kq = "";
					$this->ShowQuestion();
					if (isset($_POST['submit'])) {
						for ($i=0; $i < count($this->listID); $i++) { 
							if (isset($_POST[$this->listID[$i]])) {
								$total = $total + (int)($_POST[$this->listID[$i]]);
							}
						}
						$arrResult = $this->GetResults();
						for ($i=1; $i < count($arrResult); $i++) { 
							if ($total >= (int)($arrResult[$i]->min) && $total <= (int)($arrResult[$i]->max)) {
								$kq = $arrResult[$i]->reply;
								break;
							}
						}
						$this->ShowResult($kq . $total);
					}
				}
			}
			
			$obj = new Processer();
			$obj->Start();
		?>
		<br />
		<input class="but" type="submit" name="submit" value="Kết quả" />
		<?php

			// if (isset($_POST['submit'])) {
			// 	if(isset($_POST['11']))
			// 	{
			// 		echo "You have selected :".$_POST['11'];
			// 	}
			// }
		?>
	</form>
	</div>
</body>
</html>