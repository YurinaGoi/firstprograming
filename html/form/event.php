<?php
header("Content-type: text/html;charset=UTF-8");
error_reporting(E_ALL);
ini_set( 'display_errors', 1);

require ("class/name.class.php");
require ("class/denwa.class.php");
require ("class/day.class.php");
require ("class/time.class.php");
require ("class/seki.class.php");
require ("class/toten.class.php");

$name = $_POST["namae"];
$name_obj = new name();
$name =  $name_obj->bunnki($name);

$denwa = $_POST["denwa"];
$denwa_obj = new denwa();
$denwa = $denwa_obj->suuji($denwa);

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

$name = htmlentities($name, ENT_QUOTES, "UTF-8");
$denwa = htmlentities($denwa, ENT_QUOTES, "UTF-8");
$day = htmlentities($day, ENT_QUOTES, "UTF-8");
$time = htmlentities($time, ENT_QUOTES, "UTF-8");
$seki = htmlentities($seki, ENT_QUOTES, "UTF-8");
$toten = htmlentities($toten, ENT_QUOTES, "UTF-8");
?>