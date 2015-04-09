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

$Name = filter_input(INPUT_POST,'namae');
$name_obj = new name();
$name =  $name_obj->bunnki($Name);

$Denwa = filter_input(INPUT_POST,'denwa');
$denwa_obj = new denwa();
$denwa = $denwa_obj->suuji($Denwa);

$Mail = filter_input(INPUT_POST,'mail');
$mail_obj = new mail();
$mail = $mail_obj->bunnki($Mail);

$Day = filter_input(INPUT_POST,'day');
$day_obj = new day;
$day = $day_obj->DAY($Day);

$Time = filter_input(INPUT_POST,'time'); 
$time_obj = new time();
$time = $time_obj->TIME($Time);    

$Seki = filter_input(INPUT_POST,'seki');
$seki_obj = new seki();
$seki = $seki_obj->SEKI($Seki);

$Toten = filter_input(INPUT_POST,'toten');
$toten_obj = new toten();
$toten = $toten_obj->TOTEN($Toten);

$data = filter_input(INPUT_POST,'id');


$utility_obj = new utility();
$utility_obj -> htmlentity($name);
$utility_obj -> htmlentity($denwa);
$utility_obj -> htmlentity($mail);
$utility_obj -> htmlentity($day);
$utility_obj -> htmlentity($time);
$utility_obj -> htmlentity($seki);
$utility_obj -> htmlentity($toten);
$utility_obj -> htmlentity($data);

$errControl_obj = new errControl();

$con = mysqli_connect('localhost', 'master', 'yurina');
$errControl_obj -> errMySQLcon($con);

$result_choose = mysqli_select_db( $con, 'reserve');
$errControl_obj -> errMySQLchoose($result_choose);

$result_code = mysqli_query( $con, 'SET NAMES utf8');
$errControl_obj -> errMySQLcode($result_code);

$result_register = mysqli_query($con, "INSERT INTO reserve( name, denwa, mail, day, time, seki, toten) VALUES('".mysqli_real_escape_string($name)."', '".mysqli_real_escape_string($denwa)."', '".mysqli_real_escape_string($mail)."', '".mysqli_real_escape_string($day)."', '".mysqli_real_escape_string($time)."', '".mysqli_real_escape_string($seki)."','".mysqli_real_escape_string($toten)."')");
$errControl_obj -> errMySQLregister($result_register);

$result_close = mysqli_close($con);
$errControl_obj -> errMySQLclose($result);
?>