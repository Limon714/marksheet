<?php

$con = mysqli_connect("localhost","root","", "game") or die ("Database is not connected");
$a = $_REQUEST['t1'];
$b = $_REQUEST['t2'];
$c = $_REQUEST['t3'];
$d = $_REQUEST['t4'];
$e = $_REQUEST['t5'];
$f = $_REQUEST['t6'];
$g = $_REQUEST['t7'];
$to = $c+$d+$e+$f+$g;
$avg = $to/5;

if($avg>60){
    $gr='A';
}
else if($avg>50 && $avg<59){
    $gr = 'B';
}
else if($avg>40 && $avg<49){
    $gr = 'C';
}
else{
    $gr='FAIL';
}

$in = "insert into student_result(name, roll, Bangla, English, Accounting, Finance, Management, Total, Average, Grade)
values ('$a', '$b', $c, $d, $e, $f,$g, $to, $avg,'$gr')";

mysqli_query($con, $in);
echo " <h1> Your Application is submitted to the Server </h1>";
?>