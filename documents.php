<?php
include "connect.php";
$docid = $_GET['docid'];

$q = "SELECT * FROM document WHERE documentId='$docid'"  ;
$rowpro = mysqli_query($link,$q);
$result = mysqli_fetch_array($rowpro,MYSQLI_ASSOC);
echo json_encode($result, JSON_UNESCAPED_UNICODE );