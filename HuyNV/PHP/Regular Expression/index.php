<?php 
	// Kiểm tra định dạng mã thẻ cào xxxx-xxxx-xxxx-xxxx x là số 0-9
	//$pattern = "/^\d{4}-\d{4}-\d{4}-\d{4}$/";
	
	// Kiểm tra định dạng ngày tháng dd/MM/yyyy
	//$pattern = "/^([012]\d|30|31)\/([0][1-9]|10|11|12)\/\d{4}$/";

	// Kiểm tra yêu cầu đăng nhập:
	// 	- Chữ đầu tiên không phải là số
	// 	- Chiều dài từ 4 đến 12 kí tự
	// 	- Chỉ chấp nhận các chũ số từ 0 - 9, chữ thường, hoa và gạch dưới
	//$pattern = '/(\D\w*|_*){4,12}/'

	// Kiểm tra định dạng mật khẩu:
	//  - Phải có chữ hoa, chữ thường, số, và ký tự đặc biệt
	//$pattern = '/.*(?=.*[A-Z]+).*(?=.*[a-z]+).*(?=.*[0-9]+).*(?=.*\W+).*/';

	// Kiểm tra định dạng email:
	//$pattern = "/\S+@\S+(\..+){1,3}/";

	// Kiểm tra định dạng link url
	//$pattern = "/.+\:\/\/(.+(\..+)+\/)*(.+\..+)*/";

	// Lấy tất cả email trong 1 chuỗi
	$pattern = "/\S+\@(\S+\.){1,3}\S+/";

	$subject = 'fafdsfdaf kenshiner96@gmail.com.vn dằerwrqdfax mr@lakita.vn fadferqz huynv2909@gmail.com hehe';
	//echo $subject;

	preg_match_all($pattern, $subject, $match);

	print_r($match);
?>