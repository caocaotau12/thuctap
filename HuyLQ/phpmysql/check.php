<?php session_start();
//print_r($_POST);
require_once 'Connect.php';
    $sql='select * from user where USER="'.$_POST['user'].'" and PASSword="'.md5($_POST['password']).'"';
    $result=mysqli_query($conn,$sql);
   // var_dump($result);die;
   
        if(isset($_POST['login']))
    {
        if( mysqli_affected_rows($conn)==0)
        {
    echo 'ten dang nhap hoac mk sai';
            }
    else{
   while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
      

    
        echo 'dang nhap thanh cong';
      $_SESSION['name']= $row[0];
         header('location:index.php');
    
    
   }
    }
    }
