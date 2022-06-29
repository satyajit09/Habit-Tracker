<?php
session_start();
$habit=$_SESSION['habit'];
$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<input type="button" class="but" value="<" onclick="goback()">
<input type="button" class="but" value="Mail Stats" onclick ="mailstats()"style="display:inline; margin-left:1200px">
<center><h1 id="header"><?php echo strtoupper($habit) ?></h1></center>
<input type="text" id="username" name="username" style="display:none" value="<?php echo $username ?>">
<input type="text" id="habit" name="habit" style="display:none" value="<?php echo $habit ?>">
<div class="container">
    <div class="headline">
        <button onclick="prev()">&lt</button>
        <div id="month"></div>
        <button onclick="next()">&gt</button>
    </div>
    <div class="callender">
        <table id="tbl">
            <tr style="background-color:#f4a261; font-weight: bolder;">
                <td>SUN</td>
                <td>MON</td>
                <td>TUE</td>
                <td>WED</td>
                <td>THU</td>
                <td>FRI</td>
                <td>SAT</td>
            </tr>
        </table>
    </div>  
</div> 
<center><input type="button" class="but" value="View Stats" onclick="showGraph()"></center>
<div id="graphs">
    <canvas id="mychart"></canvas>
    <div id="dographs">
        <canvas id="donut"></canvas>
    </div>
</div>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
