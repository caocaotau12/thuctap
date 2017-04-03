<?php
session_start();
require_once 'connect.php';
$sql='insert into dangnhap (user, pass) values ("'.$_POST['userDK'].'","'.$_POST['passDK'].'")';
$sl='select * from dangnhap where user="'.$_POST['userDK'].'"';
$r=$conn->query($sl);
if ($r->num_rows>0) {
    echo 'tai khoan da ton tai';
}
else{
    if ($conn->query($sql)==TRUE) {
        $_SESSION['name']=$_POST['userDK'];
        header('location:index.php');
    }
    else{
        echo 'loi'.$sql.'<br/>'.$conn.error;
    }
}
$conn->close();