<?php
$conn=new mysqli('localhost', 'root', '', 'login');
if ($conn->connect_error) {
    die('ket noi that bai'.$conn->connect_error);
}