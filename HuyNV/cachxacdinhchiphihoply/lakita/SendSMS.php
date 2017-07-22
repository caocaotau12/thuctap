<?php 
	function SendSMS($phone_number, $course) {
		//Visist http://http://esms.vn/SMSApi/ApiSendSMSNormal for more information about API
		//� 2013 esms.vn
		//Website: http://esms.vn/
		//Hotline: 0902.435.340      
	   
		//Huong dan chi tiet cach su dung API: http://esms.vn/blog/3-buoc-de-co-the-gui-tin-nhan-tu-website-ung-dung-cua-ban-bang-sms-api-cua-esmsvn
		//De lay Key cac ban dang nhap eSMS.vn v� vao quan Quan li API 
	    $APIKey="BF28E65D29E208361E3DAF64C54008";
		$SecretKey="500ACFFC31C68F57F29D3AF92640A7";
		$Content="Ban da dang ky thanh cong khoa hoc " . $course . " cua Lakita!";
		
		$SendContent=urlencode($Content);
		$data="http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone=$phone_number&ApiKey=$APIKey&SecretKey=$SecretKey&Content=$SendContent&SmsType=4";
		
		$curl = curl_init($data); 
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl); 
			
		$obj = json_decode($result,true);
	    if($obj['CodeResult']==100)
	    {
	        // print "<br>";
	        // print "CodeResult:".$obj['CodeResult'];
	        // print "<br>";
	        // print "CountRegenerate:".$obj['CountRegenerate'];
	        // print "<br>";     
	        // print "SMSID:".$obj['SMSID'];
	        // print "<br>";
	        return true;
	    }
	    else
	    {
	        return false;
	    }
	}
 ?>