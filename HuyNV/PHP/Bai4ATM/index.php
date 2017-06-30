<?php
	// Loại tiền
	$MoneyType = array('10000','20000','50000','100000', '200000', '500000');
	// Số tờ tiền mỗi loại
	$AmoutMoney = array();

	// Số tiền cần rút
	$MoneyNeed = 0;

	// Sồ tờ mỗi loại tối ưu
	$AmountMoneyResult = array(0,0,0,2,0,1);
	// Số tờ tiền tối ưu
	$Amount = 0;

	// Số tiền rút được
	$MoneySuccess = 0;
	$MoneySuccessTemp = 0;

	

	// Số tờ tiền mỗi loại từng lần thử
	$AmountMoneyTemp = array(0,0,0,0,0,0);
	// Tổng số tờ từng lần thử
	$AmountTemp = 0;

	// Reset biến trung gian
	function ResetTemp() {
		global $AmountMoneyTemp;
		foreach ($AmountMoneyTemp as $item) {
			$item = 0;
		}
	}

	// Lưu số tờ của 1 loại
	function SaveTemp($indexPrice, $amount) {
		global $AmountMoneyTemp;

		$AmountMoneyTemp[$indexPrice] = $amount;
	}

	// Lưu Kỷ lục mới
	function SaveResult($notSuccess, $amount, $success) {
		global $AmountMoneyTemp, $AmountMoneyResult, $MoneyNotSuccess, $Amount, $MoneySuccess;

		$AmountMoneyResult = $AmountMoneyTemp;
		$MoneyNotSuccess = $notSuccess;
		$Amount = $amount;
		$MoneySuccess = $success;
	}


	$flag = false;

	function ShowResult() {
		global $MoneySuccess, $AmountMoneyResult, $MoneyType, $flag;
		if ($flag) {
			//echo 'Số tiền rút được là ' . $MoneySuccess . '<br>';
			
			if ($MoneySuccess != 0) {
				echo 'Chi tiết:<br>';
				for ($i=5; $i >= 0; $i--) { 
					if ($AmountMoneyResult[$i] != 0) {
						echo 'Mệnh giá: ' . $MoneyType[$i] . ': ' . $AmountMoneyResult[$i] . " tờ<br>";
					}
				}
			}
		}
		else {
			echo "Rút tiền không thành công.";
		}
	}

	function TryGet($money, $indexPrice) {
		global $MoneyType, $AmoutMoney, $AmountTemp, $Amount, $MoneyNotSuccess, $MoneySuccessTemp, $flag;
		$n = floor($money / $MoneyType[$indexPrice]);

		for ($i=$n; $i >= 0; $i--) { 
			$moneyTemp = $money;
			if ($i <= $AmoutMoney[$indexPrice]) {
				$money -= $i * $MoneyType[$indexPrice];
				
				SaveTemp($indexPrice, $i);
				$AmountTemp += $i;
				$MoneySuccessTemp += $i * $MoneyType[$indexPrice];

				if ($money == 0) {
					$flag = true;
					if ($MoneyNotSuccess != 0)
					{
						SaveResult($money, $AmountTemp, $MoneySuccessTemp);
					}
					else {
						if ($AmountTemp < $Amount) {
							SaveResult($money, $AmountTemp, $MoneySuccessTemp);
						}
					}
				}
				else {
					if ($indexPrice != 0) {
						TryGet($money, $indexPrice-1);
					}
					else {
						// if ($money < $MoneyNotSuccess) {
						// 	SaveResult($money, $AmountTemp, $MoneySuccessTemp);
						// }
						// if ($money == $MoneyNotSuccess) {
						// 	if ($AmountTemp < $Amount) {
						// 		SaveResult($money, $AmountTemp, $MoneySuccessTemp);
						// 	}
						// }

						$MoneySuccessTemp = 0;
						ResetTemp();
						$AmountTemp = 0;
					}
				}


			}
			//reset
			$money = $moneyTemp;
		}
	}

	if (isset($_POST['get-money'])) {
		array_push($AmoutMoney,!empty($_POST['mg-10'])?$_POST['mg-10']:0);
		array_push($AmoutMoney,!empty($_POST['mg-20'])?$_POST['mg-20']:0);
		array_push($AmoutMoney,!empty($_POST['mg-50'])?$_POST['mg-50']:0);
		array_push($AmoutMoney,!empty($_POST['mg-100'])?$_POST['mg-100']:0);
		array_push($AmoutMoney,!empty($_POST['mg-200'])?$_POST['mg-200']:0);
		array_push($AmoutMoney,!empty($_POST['mg-500'])?$_POST['mg-500']:0);

		$MoneyNeed = !empty($_POST['money'])?$_POST['money']:0;

		foreach ($AmoutMoney as $item) {
			$Amount += $item;
		}

		// Số tiền thừa không rút được
		$MoneyNotSuccess = $MoneyNeed;
		TryGet($MoneyNeed, 5);
		ShowResult();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bài 4: Rút tiền ATM</title>
	<link rel="stylesheet" href="">
	<style>
		.container {
			width: 500px;
			margin: auto;
			background: #eee;
		}

		.region {
			width: 15%;
			float: left;
			margin-right: 2%
		}

		.row {
			width: 100%;
		}

		.text-center {
			text-align: center;
		}

		#done {
			width: 20%;
			margin-left: 40%;
			margin-top: 4%;
		}
	</style>
</head>
<body>
	<form action="index.php" method="post">
		<div class="container">
			<p class="text-center">Nhập số tiền có trong cây ATM</p>
			<div class="row">
				<div class="region">
					<p class="text-center">500.000</p>
					<input id="mg-500" style="width: 95%;" type="number" vulue="0" name="mg-500" min="0">
				</div>
				<div class="region">
					<p class="text-center">200.000</p>
					<input id="mg-200" style="width: 95%;" type="number" vulue="0" name="mg-200" min="0">
				</div>
				<div class="region">
					<p class="text-center">100.000</p>
					<input id="mg-100" style="width: 95%;" type="number" vulue="0" name="mg-100" min="0">
				</div>
				<div class="region">
					<p class="text-center">50.000</p>
					<input id="mg-50" style="width: 95%;" type="number" vulue="0" name="mg-50" min="0">
				</div>
				<div class="region">
					<p class="text-center">20.000</p>
					<input id="mg-20" style="width: 95%;" type="number" vulue="0" name="mg-20" min="0">
				</div>
				<div class="region" style="margin: 0;">
					<p class="text-center">10.000</p>
					<input id="mg-10" style="width: 95%;" type="number" vulue="0" name="mg-10" min="0">
				</div>
				<div style="clear: both;"></div>
			</div>
			<p>Nhập vào số tiền là nguyên lần của 10.000đ</p>
			<input type="number" name="money" step="10000" min="0">
			<input type="submit" name="get-money" value="Rút tiền">
			
		</div>
	</form>
</body>
</html>