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
            <input type="text" name="menhgia" id="menhgia" placeholder="Nhập mệnh giá cách nhau bởi dấu cách theo thứ tự từ nhỏ đến lớn">
            <label for="soluong">Số lượng cho từng mệnh giá</label>
            <input type="text" name="soluong" id="menhgia" placeholder="Nhập số lượng cho từng mệnh giá theo thứ tự bên trên cách nhau bởi dấu cách">
            <label for="ruttien">Số tiền muốn rút</label>
            <input type="text" name="ruttien" id="ruttien" placeholder="Nhập số tiền muốn rút">
            <input type="submit" name="send" id="send" value="Send">
        </form>
        <?php
             //hàm đệ quy quay lui xử lý tiền
           
            
            if($_SERVER["REQUEST_METHOD"]=="POST"):
               //process
               //working
               $sotien= intval($_POST['ruttien']);
               $tien=array();
               $typeMoney= explode(" ", $_POST['menhgia']);
               $amountMoney= explode(" ", $_POST['soluong']);
               if(count($typeMoney)!=count($amountMoney)){
                   echo 'Khong khop so luong tien va menh gia';
                   exit;
               }
               //mảng tiền sẽ có cấu trúc như sau [loại tiền,số lượng,số tờ lấy]
               for ($i=1;$i<=count($typeMoney);$i++){
                   $tien[$i][1]=intval($typeMoney[$i-1]);
                   $tien[$i][2]=intval($amountMoney[$i-1]);
                   $tien[$i][3]=0;
               }
              
                $i2=count($tien);   
                 if (money($sotien, $i2) == 0)
                    {
                        
                        
                        for ($i = 1; $i <= $i2; $i++)
                        {
                            echo "Menh gia : " .$tien[$i][1]." | So to : ".$tien[$i][3]."<br>";
//                        
                        }
                        
                       
                    }
                    else
                    {
                        echo "\nKhong the rut tien do so luong tien trong ATM khong du";
                    }
//               print_r($tien);
           endif;
             function money($sotien,$j)
            {
                global $tien;
                        
                if ($j == 0) return $sotien;
                if ($sotien < $tien[$j][1] || $tien[$j][2] == 0) return money($sotien, $j - 1);

                        $tien[$j][3] = floor($sotien / $tien[$j][1]);
                        if ($tien[$j][3] > $tien[$j][2]){
                            $tien[$j][3] = $tien[$j][2];   
                        } 
                        $sotien -= $tien[$j][3] * $tien[$j][1];
                        if ($sotien == 0) return 0;                   
                            for ($i = $tien[$j][3]; $i >= 0; $i--)
                            {
                                if (money($sotien, $j - 1) == 0) return 0;
                            if($tien[$j][3]>0){
                                $tien[$j][3]--;
                                $sotien += $tien[$j][1];
                                
                                } 
                            }           
                            return $sotien;                    
            }
        
        
        
        ?>
    </body>
</html>
