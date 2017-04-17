<html>
    <head>
        <title>Thoi gian</title>
    </head>
    <body>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" placeholder="Nhập theo định dạng d/m/Y H:i:s" name="thoigian" id="thoigian"></input>
            <input type="submit" name="send" id="send" value="Send">
        </form>
        <?php
           date_default_timezone_set('Asia/Ho_Chi_Minh');
             if($_SERVER["REQUEST_METHOD"]=="POST"):
            $now= date('d/m/Y H:i:s');
            $date= date('d/m/Y H:i:s', strtotime($_POST["thoigian"]));
            //parse to format
            $dateNow	= date_parse_from_format('d/m/Y H:i:s', $now);
            $dateCount	= date_parse_from_format('d/m/Y H:i:s', $date);
            //parse to time stamp
            $tsNow = mktime($dateNow['hour'], $dateNow['minute'], $dateNow['second'], $dateNow['month'], $dateNow['day'], $dateNow['year']);
            $tsCount = mktime($dateCount['hour'], $dateCount['minute'], $dateCount['second'], $dateCount['month'], $dateCount['day'], $dateCount['year']);
            $distance 	= $tsNow - $tsCount;
            if($distance>=0){
                switch ($distance){
                    case ($distance < 60): 
                        $result = ($distance == 1) ? $distance . ' second ago' : $distance . ' seconds ago';
                    break;
                    case ($distance >= 60 && $distance < 3600):
                        $minute	= round($distance/60);
                        $result = ($minute == 1) ? $minute . ' minute ago' : $minute . ' minutes ago';
                    break;
                    case ($distance >= 3600 && $distance < 86400):
                           $hour = round($distance/3600);
                           $result = ($hour == 1) ? $hour . ' hour ago' : $hour . ' hours ago';
                    break;
                  
                    case ($distance >= 86400 && $distance < 2592000):
                           $day = round($distance/86400);
                           $result = ($day == 1) ? $day . ' day ago' : $day . ' days ago';
                    break;
                    case ($distance >= 2592000 && $distance < 31104000):
                           $month = round($distance/2592000);
                           $result = ($month == 1) ? $month . ' month ago' : $month . ' months ago';
                    break;
                    case ($distance >= 31104000):
                           $year = round($distance/31104000);
                           $result = ($year == 1) ? $year . ' year ago' : $year . ' years ago';
                    break;
                    default:
                        $result="dont know";
                    break;
                }
 
            }
            echo $result;
            endif;
        
        
        ?>
    </body>
</html>
