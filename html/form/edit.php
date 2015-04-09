<?php
header("Content-type: text/html;charset=UTF-8");
error_reporting(E_ALL);
ini_set( 'display_errors', 1);
require ("class/errControl.php");
require ("class/utility.php");

$errControl_obj = new errControl();
$con = mysqli_connect('localhost', 'master', 'yurina');
$errControl_obj -> errMySQLcon($con);

$result_choose = mysqli_select_db( $con, 'reserve');
$errControl_obj -> errMySQLchoose($result_choose);

$result_code = mysqli_query( $con, 'SET NAMES utf8');
$errControl_obj -> errMySQLcode($result_code);

$reserved_id = filter_input(INPUT_POST,'id');
$utility_obj= new utility();
$utility_obj -> htmlentity($reserved_id);

$result=mysqli_query($con, "select name,denwa,mail,day,time,seki,toten from reserve where id=$reserved_id");
$reserved_data = mysqli_fetch_array($result);

?>
<html>
    <head>
        <title>ディナーショー　予約変更</title>
    </head>
    <body>
        ディナーショー　予約変更
        <form method="post" action="updatahyoji.php">
        <table>
            <tr>
                <td bgcolor="#DCF0F0">名前:
                </td> 
                <td><input type="text" name="namae" size="30" maxlength="30"
                    <?php
                    echo "value=",$reserved_data[0];
                    ?>>
                </td>
            </tr>
            <tr>
                <td bgcolor="#DCF0F0">電話番号:
                </td>
                <td><input type="text" name="denwa" size="30" maxlength="30"
                    <?php
                      echo "value=" ,$reserved_data[1];  
                     ?>>
                </td>
            </tr>
            <tr>
                <td bgcolor="#DCF0F0">メールアドレス:
                </td>
                <td><input type="text" name="mail" size="30" maxlength="30"
                       <?php
                          echo "value=", $reserved_data[2];
                         ?>>
                </td>
                <tr>
                <td bgcolor="#DCF0F0">予約日時:
                </td>
                <td>
                    <select name="monthDay">
                        <option value="1"
                            <?php
                            if($reserved_data[3]=="2015-12-24"){
                                echo "selected";
                            }
                            ?>>2015-12-24
                        <option value="2" 
                                   <?php
                            if($reserved_data[3]=="2015-12-25"){
                                echo "selected";
                            } 
                            ?>>2015-12-25
                    </select>
                    <select name="time">
                        <option value="1 "
                            <?php
                            if($reserved_data[4]=="18:00"){
                                echo "selected";
                            }
                            ?>>18:00
                        <option value="2"
                            <?php
                            if($reserved_data[4]=="20:00"){
                                echo "selected";
                            }
                            ?>>20:00
                    </select>
                </td>
            </tr>
                <td bgcolor="#DCF0F0">席のご希望:
                </td>
                <td>
                    <input type="radio" name="seki" value="0"
                    <?php
                    if($reserved_data[5]=="禁煙席"){
                        echo "checked";
                    }
                    ?> >禁煙席
                <input type="radio" name="seki" value="1" 
                       <?php
                       if($reserved_data[5]=="喫煙席"){
                        echo "checked";
                    }
                    ?> >喫煙席
                <tr>
                <td bgcolor="#DCF0F0"> 当店をおしりになったきっかけ:</td>
                <td>
                    <input type="checkbox" name="toten" value="1"
                           <?php
                            if($reserved_data[6]=="ウェブサイト"){
                                echo "checked";
                            }
                            ?>
                           >ウェブサイト
                    <input type="checkbox" name="toten" value="2"
                           <?php
                            if($reserved_data[6]=="検索サイト"){
                                echo "checked";
                            }
                            ?>
                           >検索サイト
                    <input type="checkbox" name="toten" value="3"
                           <?php
                            if($reserved_data[6]=="雑誌"){
                                echo "checked";
                            }
                           ?>
                           >雑誌
                    <input type="checkbox" name="toten" value="4"
                           <?php
                            if($reserved_data[6]=="知人"){
                                echo "checked";
                            }
                            ?>
                          >知人
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="mode" value="123">
                </td>
                <td>
                    <input type="submit" value="予約する">
                    <input type="reset" value="入力し直す">
                </td>
                <input type ='hidden' name = 'id' value = '<?=$reserved_id?>'>
             </tr>
        </table>
        </form>
    </body>
</html>
