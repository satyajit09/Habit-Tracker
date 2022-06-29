<?php
session_start();
include '../dbcon.php';
$_SESSION['habit']=$_POST['habit'];
$_SESSION['username']=$_POST['username'];
//echo "done";
// header("Location:../calendar/calendar.php");
?>