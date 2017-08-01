<?php 
	$conn = mysqli_connect('localhost','root','','test') or die('Không thể kết nối DB!');
	mysqli_set_charset($conn,'utf8');

	function getAllUsers() {
		global $conn;
		$sql = 'SELECT * FROM user';
		$data = mysqli_query($conn, $sql);

		$result = array();
		if (mysqli_num_rows($data)) {
			while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
				$result[] = array(
					'id' => $row['id'],
					'name' => $row['name'],
					'phone' => $row['phone'],
					'email' => $row['email']
					);
			}
		}

		return $result;
	}

	function resetCall() {
		global $conn;
		mysqli_query($conn, "DELETE FROM call_now");
	}

	function setCall($name,$phone) {
		global $conn;

		resetCall();
		mysqli_query($conn, "INSERT INTO `call_now` (`name`,`phone`) VALUES ('$name','$phone');");
	}

	function getCall() {
		global $conn;
		$sql = "SELECT * FROM call_now";

		$query = mysqli_query($conn, $sql);

		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

		return array(
			'name' => $row['name'],
			'phone' => $row['phone']
			);
	}
 ?>