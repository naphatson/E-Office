<?php


include "connect.php";
date_default_timezone_set('Asia/Bangkok');


if(empty($_POST['documentName'])){
 	echo "กรุณากรอกชื่อเรื่อง";
 	exit();
}else{
	$documentName = mysqli_real_escape_string($link,$_POST['documentName']);
}

$fromName = mysqli_real_escape_string($link,$_POST['fromName']);
$statusName = mysqli_real_escape_string($link,$_POST['statusName']);
$documentDate =mysqli_real_escape_string($link,$_POST['documentDate']);
$attachment = mysqli_real_escape_string($link,$_POST['attachment']);
$categoryDocument = mysqli_real_escape_string($link,$_POST['categoryDocument']);
$action = mysqli_real_escape_string($link,$_POST['action']);
$story = mysqli_real_escape_string($link,$_POST['story']);
$Number_of_book = mysqli_real_escape_string($link,$_POST['Number_of_book']);
$positionId = $_POST['positionId'];

$sql = "INSERT INTO document (fromName,statusName,documentDate,documentTime,attachment,categoryDocument,documentName,action,story,Number_of_book,positionId) 
       VALUES ('$fromName','$statusName','$documentDate',curdate(),'$attachment','$categoryDocument','$documentName','$action','$story ','$Number_of_book','$positionId')";

 $result = mysqli_query($link,$sql);

 if($result){
 	header("Location: admin/index.php");

 }else{
 	echo "ผิดพลาด".mysqli_errno($link);

 }

 	mysqli_close($link);



 
 ?>