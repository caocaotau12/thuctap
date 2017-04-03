<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST">
            oldPass: <input type="password" name="urs"/>
            newPass: <input type="password" name="newpass"/>
            Nhap lai newPass: <input type="password" name="repass"/>
            <input type="submit" name="btn" value="save change"/>
        </form>
        <?php
        session_start();
        require_once 'connect.php';
        if(isset($_POST['btn'])){
       $sql='update dangnhap set pass="'.$_POST['newpass'].'" where user="'.$_SESSION['name'].'"';
       $sql2='select pass from dangnhap where user="'.$_SESSION['name'].'"';
       $rs=$conn->query($sql2);
      
       $r=$rs->fetch_assoc();
       print_r($r);
       if ($r['pass']==$_POST['urs']) {
        if ($_POST['repass']==$_POST['newpass']) {
            
                $conn->query($sql);
                echo 'thay doi thanh cong';
                header('location:index.php');
           
        }
        else{
            echo 'nhap lai mk chua dung';
        }
       }
        else{
            echo 'mat khau chua dung';
        }
        }
        $conn->close();
        ?>
    </body>
</html>
