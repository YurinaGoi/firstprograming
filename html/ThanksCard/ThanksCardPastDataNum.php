<?php
header("Content-type: text/html;charset=UTF-8");
error_reporting(E_ALL);
ini_set( 'display_errors', 1);
require ("../form/class/utility.php");
require ("../form/class/errControl.php");
//社員数を受け取る
$max_number_ppl = filter_input(INPUT_POST,'number_ppl');
//文字コードを宣言
$utility_obj = new utility();
$utility_obj -> htmlentity($max_number_ppl);
//データベースにアクセス
$errControl_obj = new errControl();

$con = mysqli_connect('localhost', 'master', 'yurina');
$errControl_obj -> errMySQLcon($con);

$result = mysqli_select_db( $con, 'thankscard');
$errControl_obj -> errMySQLchoose($result);

$result = mysqli_query( $con, 'SET NAMES utf8');
$errControl_obj -> errMySQLcode($result);


?>
<html>
    <head>
        <title>過去のペア</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
  　過去のペア
    <br>
        <table>
            <tr>
                <td>
                     No.
                </td>
                <td>
                     
                </td>
                <td>
                     
                </td>
                <td>
                     
                </td>
            </tr>
             <?php
             $Pastdata = mysqli_query($con, 'select * from pastdata');
             $Staff = mysqli_query($con, 'select * from staff');
             $staff = mysqli_fetch_array($Staff);
             $pastdata=mysqli_fetch_array($Pastdata);
             $num = 0;
             //１ループで１行データが取り出され、データが無くなるとループを抜けます。
            while ($pastdata){
                $num++;
                 while($staff['name']){
                    if($pastdata['name1'] == $staff['name']){
                        $result = mysqli_query($con, "INSERT INTO num_data(name1) VALUES('".mysqli_real_escape_string($staff['id'])."')");
                    }
                    if($pastdata['name2'] == $staff['name']){
                        $result = mysqli_query($con, "INSERT INTO num_data(name2) VALUES('".mysqli_real_escape_string($staff['id'])."')");
                    }
                    if($pastdata['name3'] == $staff['name']){
                        $result = mysqli_query($con, "INSERT INTO num_data(name3) VALUES('".mysqli_real_escape_string($staff['id'])."')");
                    } 
                 }
                 $result = mysqli_query($con, "INSERT INTO num_data(id) VALUES('".mysqli_real_escape_string($num)."')");
            }

                                $errControl_obj -> errMySQLregister($result);
$result = mysqli_close($con);
$errControl_obj -> errMySQLclose($result);
?>



