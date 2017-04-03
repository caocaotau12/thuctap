<?php

$conn = mysqli_connect('localhost', 'root', '', 'demo') or die('{error:"bad_request"}');
$query = 'select count(id) from tbl_learn_note';
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);


$soBtn = $row[0] / 10;
$a = explode('.', $soBtn);
if (count($a) > 1) {
    echo $a[0] + 1;
} else
    echo $a[0];
