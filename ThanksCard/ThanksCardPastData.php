<?php
header("Content-type: text/html;charset=UTF-8");
error_reporting(E_ALL);
ini_set( 'display_errors', 1);
require ("html/form/class/utility.php");
require ("html/form/class/errControl.php");
//社員数を受け取る
$max_number_ppl = filter_input(INPUT_POST,'number_ppl');
//文字コードを宣言
$utility_obj = new utility();
$utility_obj -> htmlentity($max_number_ppl);
//データベースにアクセス
$errControl_obj = new errControl();

$con = mysqli_connect('localhost', 'master', 'yurina');
$errControl_obj -> errMySQLcon($con);

$result = mysqli_select_db( $con, 'reserve');
$errControl_obj -> errMySQLchoose($result);

$result = mysqli_query( $con, 'SET NAMES utf8');
$errControl_obj -> errMySQLcode($result);

             $pastdata = mysqli_query($con, 'select* from pastdata');
             $staff = mysqli_query($con, 'select * from staff');
             
             $staff = mysqli_fetch_array($staff_);
             $pastdata=mysqli_fetch_array($pastdata_);
             while ($staff){
                    $num = 0;
                    while($pastdata){
                        $pastdata_id = $pastdata['id'];
             $staff_id = $staff['id'];
             $pastdata_name1 = $pastdata['name1'];
             $pastdata_name2 = $pastdata['name2'];
             $staff_name = $staff['name'];$num++;
              $table[$num] = mysqli_query($con, "create table num".$num."(id int,pair varchar(20),primary key(id))");
                        
                        if($pastdata_name1==$staff_name){
                           
                            $table[$num] = mysqli_query($con, "insert into num".$num."(pair) values('".$pastdata_name2."') ");
                        }
                        else if($pastdata_name2==$staff_name){
                           $table[$num] = mysqli_query($con, "insert into num".$num."(pair) values('".$pastdata_name1."') ");  
                        }
                    }
             }
                       
                ?>
<?php
$result = mysqli_close($con);
$errControl_obj -> errMySQLclose($result);
?>

