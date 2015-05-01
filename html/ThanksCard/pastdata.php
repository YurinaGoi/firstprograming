<?php
header("Content-type: text/html;charset=UTF-8");
error_reporting(E_ALL);
ini_set( 'display_errors', 1);
require ("../form/class/utility.php");
require ("../form/class/errControl.php");

//文字コードを宣言
//$utility_obj = new utility();

//データベースにアクセス
$errControl_obj = new errControl();

$con = new mysqli('localhost', 'master', 'yurina');
$errControl_obj -> errMySQLcon($con);

$result =  $con->select_db('thankscard');
$errControl_obj -> errMySQLchoose($result);

$result =  $con->query('SET NAMES utf8');
$errControl_obj -> errMySQLcode($result);

            $rirekidata = $con->query('select * from rirekitable');
            $syain = $con->query('select * from syainmaster');
            $rireki_num = $con->query('select * from rirekitable_num');
            echo '11111';
            var_dump($syain);
            var_dump($rirekidata);
            
            //$num_staff = 0;
            //$num_data = 0;
           
            //過去のペアリスト
            
            foreach($syain as $member_id => $staff_name){
                $num = 0;
                echo "<br>";
                var_dump($staff_name);
                echo "<br>";
                foreach($rireki_num as $key => $old_pair_id){
                    //var_dump($old_pair_id);
                    echo "<br>";
                    /*if($staff_name['id'] == $old_pair_id['syain_id1']){
                        $num++;
                        $staff_past_pair_id[$member_id][$num] = $old_pair_id['syain_id2']; 
                        $result = $con->query("INSERT INTO staff".$member_id."(id) VALUES( '".$con->real_escape_string($staff_past_pair_id[$member_id][$num])."')");
                        if(!empty($old_pair_id['syain_name3'])){
                            $num++;
                            $staff_past_pair_id[$member_id][$num] = $old_pair_id['syain_id3'];
                            $result = $con->query("INSERT INTO staff".$member_id."(id) VALUES( '".$con->real_escape_string($staff_past_pair_id[$member_id][$num])."')");
                        }
                    }
                    if($staff_name['id'] == $old_pair_id['syain_id2']){
                        $num++;
                        $staff_past_pair_id[$member_id][$num] = $old_pair_id['syain_id1'];
                         $result = $con->query("INSERT INTO staff".$member_id."(id) VALUES( '".$con->real_escape_string($staff_past_pair_id[$member_id][$num])."')");
                        if(!empty($old_pair_id['syain_name3'])){
                            $num++;
                            $staff_past_pair_id[$member_id][$num] = $old_pair_id['syain_id3'];
                             $result = $con->query("INSERT INTO staff".$member_id."(id) VALUES( '".$con->real_escape_string($staff_past_pair_id[$member_id][$num])."')");
                        }
                    }
                    if($staff_name['id'] == $old_pair_id['syain_id3']){
                        $num++;
                        $staff_past_pair_id[$member_id][$num] = $old_pair_id['syain_id1'];
                         $result = $con->query("INSERT INTO staff".$member_id."(id) VALUES( '".$con->real_escape_string($staff_past_pair_id[$member_id][$num])."')");
                        $num++;
                        $staff_past_pair_id[$member_id][$num] = $old_pair_id['syain_id2'];
                         $result = $con->query("INSERT INTO staff".$member_id."(id) VALUES( '".$con->real_escape_string($staff_past_pair_id[$member_id][$num])."')");
                    }*/
                    
                }
               
    
            }

echo "<html>";
    echo "<head>";
        echo "<title>過去のペア</title>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "</head>";
    echo "<body>";
    echo "過去のペア";
    echo "<br>";
        echo "<table>";
            echo "<tr>";
                echo "<td>";
                    echo "社員番号";
                echo "</td>";
                echo "<td>";
                    echo "社員名";
                echo "</td>";
                echo "<td>";
                    echo "過去のペアの社員番号";
                echo "</td>";
            echo "</tr>";
            foreach($syain as $member_id => $staff_name){
            for($i= 1;$i<=7;$i++){
                echo "<tr>";
                    echo "<td>";
                        echo $i;
                    echo "</td>";
                    echo "<td>";
                        echo $staff_name['syain_name'];
                    echo "</td>";
                    echo "<td>";
                    $j = 0;
                    /*foreach($staff_past_pair_id as $key => $id){
                        $j++;
                        echo $id;
                    }*/
                    echo "</td>";
                echo "</tr>";
            }
            }
            $errControl_obj -> errMySQLregister($result);
            $result = mysqli_close($con);
            $errControl_obj -> errMySQLclose($result);
  /*          
            </table>
    </body>
</html>
   * 
   */
?>