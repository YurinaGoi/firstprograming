<?php
header("Content-type: text/html;charset=UTF-8");
error_reporting(E_ALL);
ini_set( 'display_errors', 1);
require ("../form/class/utility.php");
require ("../form/class/errControl.php");

//文字コードを宣言
//$utility_obj = new utility();

//データベースにアクセス
$errControl_obj = new errControl();

$con = new mysqli('localhost', 'master', 'yurina');
$errControl_obj -> errMySQLcon($con);

$result =  $con->select_db('thankscard');
$errControl_obj -> errMySQLchoose($result);

$result =  $con->query('SET NAMES utf8');
$errControl_obj -> errMySQLcode($result);

for($number = 1;$number <=200; $number++){
    $result = $con->query("create table staff".$number."(id int, pair_id int, primary key(id)) ");
}

for($number = 1;$number <=200; $number++){
    for($number1 = 1;$number1 <=200; $number1++){
    $result = $con->query("INSERT INTO staff".$number."(id) VALUES( '".$con->real_escape_string($number1)."')");
    }
}


$result = mysqli_close($con);
$errControl_obj -> errMySQLclose($result);

?>