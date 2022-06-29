<?php
session_start();
$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<h3>Click on a goal to go to the log</h3>
<body onload="loadhome()">
    <input type="button" value="logout" id="outbtn" onclick="logout()">
    <input type="text" id="username" name="username" style="display:none" value="<?php echo $username ?>">
    <div class="container">
    <div class="textBox" id="textBox">
        <input type="text" id="newGoal" placeholder="Type in New Goal">
        <button type="button" id="createBtn" onclick="createGoal()">Create</button>
    </div>
    <div class="panels" id="panels"></div>
    </div>
<script src="jquery-3.5.1.min.js"></script>
<script src="script.js"></script>  
</body>
</html>