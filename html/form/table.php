<?php
header("Content-type: text/html;charset=UTF-8");
error_reporting(E_ALL);
ini_set( 'display_errors', 1);
require("class/errControl.php");
$errControl_obj = new errControl();
$con = mysqli_connect('localhost', 'master', 'yurina');
$errControl_obj -> errMySQLcon($con);

$result = mysqli_select_db( $con, 'reserve');
$errControl_obj -> errMySQLchoose($result);

$result = mysqli_query( $con, 'SET NAMES utf8');
$errControl_obj -> errMySQLcode($result);
?>

<html>
    <head>
        <title>ディナーショー予約一覧</title>
    </head>
    <TABLE  border='1' >";
    <TR>
        <TD>番号</TD>
        <TD>名前</TD>
        <TD>電話場号</TD>
        <TD>メールアドレス</TD>
        <TD>日程TD>
        <TD>席種</TD>
        <TD>当店をお知りになったきっかけ</TD>
    <?php
    $result = mysqli_query($con, 'select * from reserve');
    //１ループで１行データが取り出され、データが無くなるとループを抜けます。
    while ($reserved_data = mysqli_fetch_array($result)){
        echo "<TR>";
        $num;
        for($num=0;$num<=7;$num++){
            echo "<TD>" . $reserved_data[$num];
        }
        echo "<form method = 'post' action = 'edit.php'>";        
        echo "<TD>" ;
        echo "<input type='submit' name = 'edit' value = '編集'>";
        echo "</TD>";
        echo "<input type ='hidden' name = 'id' value = '".$reserved_data[0]."'>" ;
        echo "</form>";
        echo "</TR>";
    }
    echo "</TABLE>";
    ?>
   
