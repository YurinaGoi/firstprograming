<?php
header("Content-type: text/html;charset=UTF-8");
error_reporting(E_ALL);
ini_set( 'display_errors', 1);
?>

<html>
    <head>
        <title>ディナーショー</title>
    </head>
    <?php 
    require "updata.php";
    ?>
    <body>
        ディナーショー
        <form method = 'post' action = 'table.php'>
        <table>
            <tr>
                <td bgcolor="#DCF0F0">名前:</td>
                <td>
                    <?php
                    echo $name;
                    ?>
                </td>
            </tr>
            <tr>
                <td bgcolor="#DCF0F0">電話番号:</td>
                <td><?php
                     echo $denwa;  
                     ?>
                </td>
            </tr>
             <tr>
                <td bgcolor="#DCF0F0">メールアドレス:</td>
                <td><?php
                     echo $mail;  
                     ?>
                </td>
            </tr>
            <tr>
                <td bgcolor="#DCF0F0">予約日時:</td>
                <td>
                    <?php
                    echo $day," ",$time;
                    ?>
                </td>
            </tr>
            <td bgcolor="#DCF0F0">席のご希望:</td>
            <td>
                <?php
                echo $seki;
                ?>
            </td>
        </tr>            
        <tr>
            <td bgcolor="#DCF0F0"> 当店をおしりになったきっかけ:</td>
            <td>
                <?php
                echo $toten;
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="予約表表示">
                <input type="reset" value="入力し直す">
            </td>
        </tr>
    </table>
</body>
</html>
