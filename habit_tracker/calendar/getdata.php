<?php
include '../dbcon.php';
$month=$_POST["month_no"];
$username=$_POST["username"];
$habit=$_POST["habit"];
$sql1="select * from months where username='{$username}' and habit='{$habit}' and month='{$month}' ";
$result = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result))
{
    $row=mysqli_fetch_assoc($result);
    echo $row['days'];
}
?>