<?php
session_start();
include '../dbcon.php';
$username=$_POST["username"];
$sql2="select * from user where username='{$username}'";
$r= mysqli_query($conn,$sql2);
$s=mysqli_fetch_assoc($r);
$email=$s['email'];
$dataURL=$_POST['dataURL'];
$dataURL = str_replace(' ','+',$dataURL);
$to = $email;
$subject = "test";
$from = "type sender's mail here";
$headers = "From: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n"
  ."Content-Type: multipart/mixed; boundary=\"1a2a3a\"";

 
$file = $dataURL;
 
$message = "Content-Type: image/png; name=\"picture.png\"\r\n"
  ."Content-Transfer-Encoding: base64\r\n"
  ."Content-disposition: attachment; file=\"picture.png\"\r\n"
  ."\r\n"
  .chunk_split(base64_encode($file))
  ."--1a2a3a--";
 
// Send email
 
$success = mail($to,$subject,$message,$headers);
   if (!$success) {
  echo "Mail to " . $to . " failed .";
   }else {
  echo $file;
   }
?>