<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
        <title></title>
        <style>
            .modal-content{
                padding: 30px;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        if (!$_SESSION['name']) {
        ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Đăng nhập</button>

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <h2 style="text-align:center">Login Form</h2>
                <form method="POST"  action="kiemTra.php">
            <div class="form-group" >
              <label for="email">Username:</label>
              <input type="text" class="form-control" name="userDN" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label>Password:</label>
              <input type="password" class="form-control" name="passDN" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="cancel" class="btn btn-warning">Cancel</button>
          </form>
            </div>
          </div>
        </div>

       
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Đăng kí?</button>

        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <h2 style="text-align:center">Đăng kí</h2>
              <form method="POST" action="dangki.php">
            <div class="form-group">
              <label>Username:</label>
              <input type="text" class="form-control" name="userDK" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label>Password:</label>
              <input type="password" class="form-control" name="passDK" placeholder="Enter password">
            </div>
            
                  <button type="submit" class="btn btn-success" name="hh">OK</button>
            <button type="" class="btn btn-warning">Cancel</button>
          </form>
            </div>
          </div>
        </div>
        
       <?php
        }
        else{
            echo "welcome ".$_SESSION['name'];
        ?>
        <a href="doipass.php" >doi pass</a>
        <a href="dangXuat.php">dang xuat</a>
        <?php
        }
       ?>
       
        
        //<?php
//        
//            $conn=new mysqli('localhost', 'root', '', 'login');
//            if ($conn->connect_error) {
//                die("ket noi that bai: " .$conn->connect_error);
//            }
//            $sql="SELECT user, pass FROM dangnhap";
//            $result=$conn->query($sql);
//           
//            if ($result->num_rows>0) {
//                
//                while ($row=$result->fetch_assoc()){
//                    if (($_POST['userDN']==$row['user'])&&($_POST['passDN']==$row['pass'])) {
//                        echo 'dang nhap thanh cong';
//                        break;
//                    }
//                }
//                
//            }
//            else{
//                echo 'khong co du lieu';
//            }
//            $conn->close();
//        ?>
    </body>
</html>
