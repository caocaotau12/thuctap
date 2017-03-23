<?php

$conn = mysqli_connect('localhost', 'root', '', 'demo') or die('khong the ket noi toi csdl');

$sql2 = 'select id,learn_id from tbl_learn_note where id >="' . ($_POST['page2'] * 10 - 9) . '"and id <="' . ($_POST['page2'] * 10) . '"';
$result2 = mysqli_query($conn, $sql2);
$kq = array();
if (mysqli_num_rows($result2) > 0) {
    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $kq[] = $row2;
    }

    die(json_encode($kq));
}

