<?php
header("Content-type: text/html;charset=UTF-8");
error_reporting(E_ALL);
ini_set( 'display_errors', 1);

$errControl_obj = new errControl();

$con = mysqli_connect('localhost', 'master', 'yurina');
$errControl_obj -> errMySQLcon($con);

$result = mysqli_select_db( $con, 'pastdata');
$errControl_obj -> errMySQLchoose($result);

$result = mysqli_query( $con, 'SET NAMES utf8');
$errControl_obj -> errMySQLcode($result);


$result = mysqli_query($con, "INSERT INTO thankscard( name, denwa, mail, day, time, seki, toten) VALUES('".mysqli_real_escape_string($name)."', '".mysqli_real_escape_string($denwa)."', '".mysqli_real_escape_string($mail)."', '".mysqli_real_escape_string($day)."', '".mysqli_real_escape_string($time)."', '".mysqli_real_escape_string($seki)."','".mysqli_real_escape_string($toten)."')");
$errControl_obj -> errMySQLregister($result);

$result = mysqli_close($con);
$errControl_obj -> errMySQLclose($result);

?>
