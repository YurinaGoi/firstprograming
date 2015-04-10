<?php
header("Content-type: text/html;charset=UTF-8");
error_reporting(E_ALL);
ini_set( 'display_errors', 1);
require ("html/form/class/utility.php");
require ("html/form/class/errControl.php");
/*社員数を受け取る
$max_number_ppl = filter_input(INPUT_POST,'number_ppl');
//文字コードを宣言
$utility_obj = new utility();
$utility_obj -> htmlentity($max_number_ppl);*/
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
        <title>社員表</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    社員表
     <form method="post" action="ThanksCardShuffle.php">
         <table>
             <tr>
                 <td>
                     No
                 </td>
                 <td>
                     名前
                 </td>
             </tr>
             <?php
             $result = mysqli_query($con, 'select * from staff');
             //１ループで１行データが取り出され、データが無くなるとループを抜けます。
                while ($reserved_data = mysqli_fetch_array($result)){
                echo "< tr>";
                echo "<td>". $reserved_data['id']."</td>";
                echo "<td>" . $reserved_data['name']."</td>";
                echo "<form method = 'post' action = 'ThanksCardPastData.php'>";        
                echo "<TD>" ;
                echo "<input type='submit' name = 'edit' value = '過去のデータ'>";
                echo "</TD>";
                echo "<input type ='hidden' name = 'id' value = '".$reserved_data['id']."'>" ;
                echo "</form>";
                echo "</TR>";
             ?>
         </table>
    </body>
</html>
