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
//社員数
$numberofsyain = 7;


for($numberofloop = 0;$numberofloop <=200;$numberofloop++){
    $num1 = 0;
    $num = 0;
    foreach($syain as $member_id => $staff_name){
        $num++;
        $k =0;
        $result = $con->query("select * from staff".$num);
        $hantei1=1;
        //既にペアとして選ばれている社員を除く
        if($num>=2){
            for($i = 1;$i < $num1+1; $i++){
               // echo $num;echo "<br>";
                //echo $next_pair_num[$i];echo "<br>";
                if($num == $next_pair_num[$i]){
                    $hantei1 = 0;
                    break;
                }
            }
        }
        if($hantei1 == 0){

           // echo "<br>";
            continue;
        }
        //array[]にペアを組むのが可能なidを格納していく
        for($i = $num+1; $i <= $numberofsyain; $i++){
            //過去のペアのidを回す
            foreach($result as $key => $staff_past_pair_id){
                //過去のペアのidとループしている回のiが一致した場合は抜けてi++する
                 if($staff_past_pair_id['pair_name'] == $i){
                    
                    $hantei = 0;
                    break;
                }
                //前ループでペアが決まった社員を除く
                if($num >= 2){
                    for($j=1;$j < $num1+1;$j++){
                        if($i == $next_pair_num[$j]){
                            $hantei = 0;
                            break 2;
                        }
                    }
                }
                //一致しない場合は$hanteiに1を代入してペアになれる可能性があることを示す
                $hantei = 1;
            }
            //ペアになれることがわかったので$array[$k]に代入
            if($hantei == 1){
                $k++;
                $array[$k] = $i; 
            }
        }
        $num1++;
        //残り3人となった場合を考える
        for($i = 1;$i<=$numberofsyain;$i++){
            $hantei2[$i] = 0;    
        }
        $i = 0;
        if($num1 == floor($numberofsyain/2) ){
            //ペアが決まった社員を除く
            for($m = 1;$m <=$numberofsyain;$m++){
                //前ループまででペアとして選ばれた社員を除く（二列中の右列の社員）
                for($n = 1;$n <=$num1-1;$n++){
                    if($m == $next_pair_num[$n]){
                        $hantei2[$m] = 1;
                    }    
                }
                //前ループまででペアの一人目として選ばれた社員を除く（二列中の左列の社員）
                for($n = 1;$n <=$num1-1;$n++){
                    if($m == $pair_num[$n]){
                        $hantei2[$m] = 1;
                    }
                }
                if($hantei2[$m] == 0){
                    $i++;
                    $last_pair_num[$i]= $m;
                    echo  $last_pair_num[$i];
                }
            }
           
            $hantei = 1;
            //最後のペア三人がそれぞれ過去に組んだことがないかどうか判定する
            for($i = 1;$i <= 3; $i++){
                if($i == 1){
                    $k1 = 2;$k2 = 3;
                }
                if($i == 2){
                     $k1 = 1;$k2 = 3;
                }
                 if($i == 3){
                     $k1 = 1;$k2 =2;
                }


                $result = $con->query("select * from staff".$last_pair_num[$k1]);
                foreach($result as $key => $staff_past_pair_id){
                    //過去のペアのidとループしている回のiが一致した場合は抜ける
                    if($staff_past_pair_id['pair_name'] == $last_pair_num[$i]){
                        $hantei = 0;
                        break;
                    }
                }
                $result = $con->query("select * from staff".$last_pair_num[$k2]);
                foreach($result as $key => $staff_past_pair_id){
                    //過去のペアのidとループしている回のiが一致した場合は抜ける
                    if($staff_past_pair_id['pair_name'] == $last_pair_num[$i]){
                        $hantei = 0;
                        break;
                    }
                }
            }echo "<br>";
            if($hantei == 0){
                break;
            }
            else{
                for($i = 1;$i <= 3;$i++){
                    echo $last_pair_num[$i];
                }
                
                break 2;
            }           
        }
        //ペアの一人目をとりあえず格納
        $pair_num[$num1] = $num;
        //ペアになってない人がまだいる場合
        if($k>0){
            $randomnumber = rand(1, $k);
            $next_pair_num[$num1] = $array[$randomnumber];
        }
         //すべての社員とペアになった場合
        else{
            //ペア決定ループが100回以下の場合はもう一度ループ
            if($numberofloop <= 100){
                continue;
            }//そうでない場合はそのまま進む
            else{
            $next_pair_num[$num1] = rand(1,$numberofsyain);
            }
        }
        echo  $num." ".$next_pair_num[$num1];
        echo "<br>";
     }
}
$errControl_obj -> errMySQLregister($result);
$result = mysqli_close($con);
$errControl_obj -> errMySQLclose($result);
?>

