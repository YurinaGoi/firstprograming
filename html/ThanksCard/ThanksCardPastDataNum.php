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

$con = new mysqli('localhost', 'master', 'yurina');
$errControl_obj -> errMySQLcon($con);

$result =  $con->select_db('thankscard');
$errControl_obj -> errMySQLchoose($result);

$result =  $con->query('SET NAMES utf8');
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
            $data1 = $con->query('select * from pastdata');
            $staff_list = $con->query('select * from staff');
            //$staff_list = $name->fetch_array();
            
             //idに1から500までの数をインサート
            /*while ($num <=2000){
                $num++; 
                if($num%4 == 1){
                $id = floor($num/4) + 1;
                $result = $con->query("INSERT INTO num_data(id) VALUES( '".$con->real_escape_string($id)."')");
                var_dump("INSERT INTO num_data(id) VALUES( '".$con->real_escape_string($id)."')");
            }*/
            $num_staff = 0;
            $num_data = 0;
            

            
            /*
             foreach($name as $key => $staff_name){
                 $num_staff++;
                 $result = $con->query("use thankscard");
                 $result = $con->query("create table staff".$num_staff." (id int, pair_name varchar(20), primary key(id))");
                 var_dump("create table staff".$num_staff." (id int, pair_name varchar(20), primary key(id)");
                 
             }
            */
            //過去のペアリスト
            $num = 0;
            foreach($data1 as $old_pair_key => $old_pair_list){
            $num++;
                //社員一覧
                foreach($staff_list as $member_id => $staff_name){
                    /*
                    var_dump($member_id);
                    echo "<br>";
                    var_dump($staff_name);
                    echo "<br>";
                    var_dump($old_pair_list['name1']);
                    echo "<br>";
                    echo "<br>";
                    */

                    //$old_pair_listに$staff__nameが含まれているか
                    if($staff_name['name'] == $old_pair_list['name1']){
                        $pair_list[$old_pair_key]['name1'] = $staff_name['id'];
                    }
                    
                    if($staff_name['name'] == $old_pair_list['name2']){
                        $pair_list[$old_pair_key]['name2'] = $staff_name['id'];
                    }

                    /*
                    //name3があるか判定してから
                    if(!empty($old_pair_list['name3'])){
                        if($staff_name['name'] == $old_pair_list['name3']){
                            $pair_list[$old_pair_key]['name3'] = $staff_name['id'];
                        }
                    }
                     * 
                     */
                    // $result = $con->query("insert into staff".$num_staff."(pair_name) values('".$con->real_escape_string(old_pair_list)."')");
                }
                    var_dump($pair_list);
                    exit;
            }
            //var_dump($pair_list);
            /*
            while($pastdata = $data1->fetch_array()){
                $num_data++;
                var_dump($pastdata);
                foreach($staff__name as $staff_name){
                    $num_staff++;
                    var_dump($staff_name);echo "<br>";
                    var_dump($pastdata['name1']);echo "<br>";echo "<br>";
             * 
                    if($pastdata['name1'] == $staff_name){
                    $result = $con->query("UPDATE thankscard.num_data SET name1 =".$con->real_escape_string($staff_id['id'])." where id =".$num_data." ");
                    var_dump("UPDATE thankscard.num_data SET name1 =".$con->real_escape_string($staff_id['id'])." where id =".$num_data." ");
                    }
                }
            }
             */
            
            /*while($pastdata = $data->fetch_array()){
            $num++; 
                //$id = floor($num/4) + 1;
            var_dump($num);
                while($staff = $name->fetch_array()){
                var_dump($staff);
                    if($pastdata['name1'] == $staff['name']){
                    $result = $con->query("UPDATE thankscard.num_data SET name1 =".$con->real_escape_string($staff['id'])." where id =".$num." ");
                    var_dump("UPDATE thankscard.num_data SET name1 =".$con->real_escape_string($staff['id'])." where id =".$num);
                     }
                }
                while($staff = $name->fetch_array()){
                var_dump($staff);
                while($staff = $name->fetch_array()){
                var_dump($staff);
                    //else{
                        if($pastdata['name2'] == $staff['name']){
                        $result = $con->query("UPDATE thankscard.num_data SET name2 =".$con->real_escape_string($staff['id'])." where id =".$num."");
                        }
                }
                }
                while($staff = $name->fetch_array()){
                var_dump($staff);
                while($staff = $name->fetch_array()){
                var_dump($staff);
                    //    else{        
                            if($pastdata['name3'] == $staff['name']){
                            $result = $con->query("UPDATE thankscard.num_data SET name3 =".$con->real_escape_string($staff['id'])." where id =".$num."");
                            }  
                        //}
                    }
                    
                }
            }*/
            
            /*while($pair_list){
                echo "<td>". $num_data['id']."</td>";
            }
            while ($num_data = $numberdata->fetch_array()){
                    echo "<td>". $num_data['id']."</td>";
                    echo "<td>" . $num_data['name1']."</td>";
                    echo "<td>" . $num_data['name2']."</td>";
                    echo "<td>" . $num_data['name3']."</td>";
                    echo "</tr>";
            }*/
            $errControl_obj -> errMySQLregister($result);
            $result = mysqli_close($con);
            $errControl_obj -> errMySQLclose($result);
            ?>
            </table>
    </body>
</html>
