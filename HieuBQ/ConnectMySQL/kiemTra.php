<?php
session_start();
require_once 'connect.php';
$sql="SELECT * FROM dangnhap where user='".$_POST['userDN']."'and pass='".$_POST['passDN']."'";
$result=$conn->query($sql);
if ($result->num_rows>0) {
    $row=$result->fetch_assoc();
    echo 'dang nhap thanh cong';
    $_SESSION['name']=$row['user'];
    header('location:index.php');
}
else{
    echo 'tai khoan hoac mat khau khong dung';
}
$conn->close();