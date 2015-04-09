<?php
header("Content-type: text/html;charset=UTF-8");
error_reporting(E_ALL);
ini_set( 'display_errors', 1);
?>

<html>
    <head>
       <font size="5" color="#66FFFF">イベント予約</font>
    </head>
    <?php 
    require "event.php";
    ?>
    <body>
        イベント予約
  
        <table>
            <tr>
                <td bgcolor="#66FFFF">名前:</td>
                <td>
                    <?php
                    echo $name;
                    ?>
                </td>
            </tr>
            <tr>
                <td bgcolor="#66FFFF">電話番号:</td>
                <td><?php
                     echo $denwa;  
                     ?></td>
            </tr>
            <tr>
                <td bgcolor="#66FFFF">予約日時:</td>
                <td>
                    <?php
                    echo $day," ",$time;
                    ?>
                </td>
            </tr>
            <td bgcolor="#66FFFF">席のご希望:</td>
            <td>
                <?php
                echo $seki;
                ?>
            </td>
        </tr>            
        <tr>
            <td bgcolor="#66FFFF"> 当店をおしりになったきっかけ:</td>
            <td>
                <?php
                echo $toten;
                ?>
            </td>
        </tr>
    </table>
</body>
</html>
