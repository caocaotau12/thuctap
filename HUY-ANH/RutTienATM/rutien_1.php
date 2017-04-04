<html>
    <head>
        <title>RUT TIEN</title>
        <style>
            #form input[type='text']{
                display: block;
                margin: 10px;
                width: 600px;
                height: 40px;
                border: 4px solid green;
                
            }
            #form label{
                font-weight: bold;
            }
            #form{
                border: 2px solid black;
                padding: 10px;
                
            }
            
            
            
        </style>
    </head>
    <body>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form">
            <label for="menhgia">Menh Gia Ca loai Tien</label>
            <input type="text" name="menhgia" id="menhgia" placeholder="Nhập mệnh giá cách nhau bởi dấu cách theo thứ tự từ lớn về nhỏ">
            <label for="soluong">Số lượng cho từng mệnh giá</label>
            <input type="text" name="soluong" id="menhgia" placeholder="Nhập số lượng cho từng mệnh giá theo thứ tự bên trên cách nhau bởi dấu cách">
            <label for="ruttien">Số tiền muốn rút</label>
            <input type="text" name="ruttien" id="ruttien" placeholder="Nhập số tiền muốn rút">
            <input type="submit" name="send" id="send" value="Send">
        </form>
        <?php
            
            
            if($_SERVER["REQUEST_METHOD"]=="POST"):
               //process
               //working
               $ruttien= intval($_POST['ruttien']);
               $fullMoney=array();
               $typeMoney= explode(" ", $_POST['menhgia']);
               $amountMoney= explode(" ", $_POST['soluong']);
               if(count($typeMoney)!=count($amountMoney)){
                   echo 'Khong khop so luong tien va menh gia';
                   exit;
               }
             
               for ($i=0;$i<count($typeMoney);$i++){
                   $fullMoney[intval($typeMoney[$i])]=intval($amountMoney[$i]);
               }
//               print_r($fullMoney);
               $result= array();
               $totalAmount=0;
               $curMoney=intval($_POST['ruttien']);
               foreach ($fullMoney as $money => $amout) {
                   if($curMoney>=$money){
                       $x= floor($curMoney/$money);
                       if($x>$amout){
                           $result[$money]=$amout;
                           $curMoney-=$money*$amout;
                           $totalAmount+=$amout;
                       }else{
                           $result[$money]=$x;
                           $curMoney-=$money*$x;
                           $totalAmount+=$x;
                       }
                         if($curMoney==0){
                               if($totalAmount!=0){
                                   foreach ($result as $key => $value) {
                                       echo "Money type ".$key." amount ".$value."</br>";
                                   }
                               }
                               else {
                                   echo "<h1>Không rút được tiền</h1>";
                               }
                         }
                   }
               }
            endif;
        
        
        
        ?>
    </body>
</html>
