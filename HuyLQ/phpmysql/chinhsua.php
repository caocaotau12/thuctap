<form method="POST">
    <label>Nhap mk hien tai</label><input type="password" name="pass_current">
    <label>Nhap mk Moi</label><input type="password" name="pass_new">
    <input type="submit" value="Save change" name="save">
</form>
<?php session_start();
require_once 'Connect.php';
 $sql='select pass from quantri where USER="'.$_SESSION['name'].'"';
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result, MYSQL_NUM);
   
if(isset($_POST['save'])){
    if(md5($_POST['pass_current'])!==(string)$row[0])
    {
        echo 'pass hien tai khong dung';
    }
    else{
$sql='update quantri set pass="'.md5($_POST['pass_new']).'" where user="'.$_SESSION['name'].'"';
 if ($conn->query($sql) === TRUE) {
     header('location:index.php');

} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}
}

}
$conn->close();
    

