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
            $data = $con->query('select * from pastdata');
            $name = $con->query('select * from staff');
            $numberdata = $con->query('select * from num_data');
            $num = 0;
            $num_data = $numberdata->fetch_array();
           
             //idに1から500までの数をインサート
            /*while ($num <=2000){
                $num++; 
                if($num%4 == 1){
                $id = floor($num/4) + 1;
                $result = $con->query("INSERT INTO num_data(id) VALUES( '".$con->real_escape_string($id)."')");
                var_dump("INSERT INTO num_data(id) VALUES( '".$con->real_escape_string($id)."')");
            }*/
            while($pastdata = $data->fetch_array()){
            $num++; 
                //$id = floor($num/4) + 1;
            var_dump($num);
                while($staff = $name->fetch_array()){
                    if($pastdata['name1'] == $staff['name']){
                    $result = $con->query("UPDATE thankscard.num_data SET name1 =".$con->real_escape_string($staff['id'])." where id =".$num." ");
                    var_dump("UPDATE thankscard.num_data SET name1 =".$con->real_escape_string($staff['id'])." where id =".$num);
                     }
                    else{
                        if($pastdata['name2'] == $staff['name']){
                        $result = $con->query("UPDATE thankscard.num_data SET name2 =".$con->real_escape_string($staff['id'])." where id =".$num."");
                        }
                        else{        
                            if($pastdata['name3'] == $staff['name']){
                            $result = $con->query("UPDATE thankscard.num_data SET name3 =".$con->real_escape_string($staff['id'])." where id =".$num."");
                            }  
                        }
                    }
            }
            }
            while ($num_data = $numberdata->fetch_array()){
                    echo "<td>". $num_data['id']."</td>";
                    echo "<td>" . $num_data['name1']."</td>";
                    echo "<td>" . $num_data['name2']."</td>";
                    echo "<td>" . $num_data['name3']."</td>";
                    echo "</tr>";
            }
            $errControl_obj -> errMySQLregister($result);
            $result = mysqli_close($con);
            $errControl_obj -> errMySQLclose($result);
            ?>
            </table>
    </body>
</html>
