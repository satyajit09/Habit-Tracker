<?php
$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="habit_tracket";

$conn=mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

if(!$conn)
{
    die("Connection failed:".mysqli_connect_error());
}
?>