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

$pastdata = mysqli_query($con, 'select* from pastdata');

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
            
                <td>
                     No.
                </td>
                <td>
                     
                </td>
                <td>
                     
                </td>
            </tr>
             <?php
             $result = mysqli_query($con, 'select * from pastdata');
             
             //１ループで１行データが取り出され、データが無くなるとループを抜けます。
                while ($pastdata = mysqli_fetch_array($result)){
                echo "< tr>";
                    echo "<td>". $pastdata['id']."</td>";
                    echo "<td>" . $pastdata['name1']."</td>";
                    echo "<td>" . $pastdata['name2']."</td>";
                    echo "<td>" . $pastdata['name2']."</td>";
                echo "</tr>";
                }
                echo "</table>";
                echo "<tr>" ;
                    echo "<td>" ;
                    echo "<form method = 'post' action = 'ThanksCardPastDataNum.php'>"; 
                    echo "<input type='submit' name = 'edit' value = '過去のデータ'>";
                    //echo "<input type ='hidden' name = 'id' value = '".$reserved_data['id']."'>" ;
                    echo "</form>";
                    echo "<form method = 'post' action = 'ThanksCardPastDataNum.php'>";      
                    echo "</td>";
                echo "</tr>";
                $result = mysqli_close($con);
                $errControl_obj -> errMySQLclose($result);
                ?>

