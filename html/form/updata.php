<?php
header("Content-type: text/html;charset=UTF-8");
error_reporting(E_ALL);
ini_set( 'display_errors', 1);

require ("class/name.class.php");
require ("class/denwa.class.php");
require ("class/mail.class.php");
require ("class/day.class.php");
require ("class/time.class.php");
require ("class/seki.class.php");
require ("class/toten.class.php");
require ("class/errControl.php");
require ("class/utility.php");

$name = $_POST["namae"];
$name_obj = new name();
$name =  $name_obj->bunnki($name);

$denwa = $_POST["denwa"];
$denwa_obj = new denwa();
$denwa = $denwa_obj->suuji($denwa);

$mail = $_POST["mail"];
$mail_obj = new mail();
$mail = $mail_obj->bunnki($mail);

$day = $_POST["monthDay"];
$day_obj = new day;
$day = $day_obj->DAY($day);

$time = $_POST["time"];  
$time_obj = new time();
$time = $time_obj->TIME($time);    

$seki = $_POST["seki"];
$seki_obj = new seki();
$seki = $seki_obj->SEKI($seki);

$toten = $_POST["toten"];
$toten_obj = new toten();
$toten = $toten_obj->TOTEN($toten);

$data = $_POST["id"];
$data = htmlentities($data, ENT_QUOTES, "UTF-8");

$utility_obj = new utility();
$utility_obj -> htmlentity($name);
$utility_obj -> htmlentity($denwa);
$utility_obj -> htmlentity($mail);
$utility_obj -> htmlentity($day);
$utility_obj -> htmlentity($time);
$utility_obj -> htmlentity($seki);
$utility_obj -> htmlentity($toten);

$errControl_obj = new errControl();

$con = mysqli_connect('localhost', 'master', 'yurina');
$errControl_obj -> errMySQLcon($con);

$result = mysqli_select_db( $con, 'reserve');
$errControl_obj -> errMySQLchoose($result);

$result = mysqli_query( $con, 'SET NAMES utf8');
$errControl_obj -> errMySQLcode($result);

$result = mysqli_query($con, "INSERT INTO reserve( name, denwa, mail, day, time, seki, toten) VALUES('$name', '$denwa', '$mail', '$day', '$time', '$seki', '$toten')");
$errControl_obj -> errMySQLregister($result);

$result = mysqli_close($con);
$errControl_obj -> errMySQLclose($result);
?>