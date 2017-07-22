<?php
//get data
$ref = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : '';
$domain = isset($_SERVER["HTTP_HOST"]) ? 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] : '';
session_start();

@$_SESSION['id'] = isset($_GET["id"]) ? $_GET["id"] : 1596;
$id = $_SESSION['id'];
@$_SESSION['id_campaign'] = isset($_GET["id_campaign"]) ? $_GET["id_campaign"] : $_SESSION['id_campaign'];
$id_campaign = $_SESSION['id_campaign'];

@$_SESSION['id_landingpage'] = isset($_GET["id_landingpage"]) ? $_GET["id_landingpage"] : $_SESSION['id_landingpage'];
$id_landingpage = $_SESSION['id_landingpage'];
$preview = isset($_GET["preview"]) ? $_GET["preview"] : "-100";
@$_SESSION['code_chanel'] = isset($_GET["code_chanel"]) ? $_GET["code_chanel"] : $_SESSION['code_chanel'];
$code_chanel = $_SESSION['code_chanel'];
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>KHÓA HỌC CÁCH XÁC ĐỊNH CHI PHÍ HỢP LÝ THEO CHÍNH SÁCH THUẾ MỚI, CÔNG CỤ BẢO VỆ CHI PHÍ VÀ KỸ NĂNG GIẢI TRÌNH THANH TRA KIỂM TRA THUẾ</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:url"           content="http://<?php echo $_SERVER['SERVER_NAME'];?>/" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="Khóa học đào tạo kiến thức kiểm tra kế toán dành cho giám đốc doanh nghi - lakita.vn" />
        <meta property="og:description"   content="Hệ thống đào tạo trực tuyến lakita – Cùng bạn vươn xa Học Online qua Video bài giảng - Học Online thỏa thích mọi lúc, mọi nơi - Học trên mọi thiết bị - Học với giảng viên, chuyên gia hàng đầu trong lĩnh vực - Hóa đơn chứng từ - Làm chủ hóa đơn chứng từ" />
        <meta property="og:image"         content="http://lakita.vn/styles/v2.0/img/logo3.png" />
        <meta name="description" content="Hệ thống đào tạo trực tuyến lakita – Cùng bạn vươn xa Học Online qua Video bài giảng - Học Online thỏa thích mọi lúc, mọi nơi - Học trên mọi thiết bị - Học với giảng viên, chuyên gia hàng đầu trong lĩnh vực - Hóa đơn chứng từ - Làm chủ hóa đơn chứng từ" />
        <link rel="icon" href="favicon.ico" />
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <script src="https://use.fontawesome.com/0b216c5f11.js"></script>
        <script src="js/my.js" type="text/javascript"></script>
        <link href="newcss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>        

        <?php
        $files = glob('html-file/*.php');
        foreach ($files as $file) {
            require($file);
        }
        ?>
			<!-- Google Code for KT110 All Visitors -->
<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 845378743;
var google_conversion_label = "BstdCJ_rjXMQt-mNkwM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/845378743/?value=1.00&amp;label=BstdCJ_rjXMQt-mNkwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
    </body>
</html>
