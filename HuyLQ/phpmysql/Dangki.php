<?php
require_once 'Connect.php';
if(isset($_POST['sign'])){
    $sql='insert into user (user,password) values ("'.$_POST['user'].'","'.md5($_POST['password']).'")';
    if ($conn->query($sql) === TRUE) {
        session_start();
    $_SESSION['name']=$_POST['user'];
    header('location:index.php');
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}
}
// Ngắt kết nối
$conn->close();
    
  
  