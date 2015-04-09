<?php
class errControl {
    function errMySQLCon ($result) {
        if (!$result) {
            exit("データベースに接続できませんでした。");
        }
    }
    function errMySQLchoose($result){
        if (!$result) {
        exit('データベースを選択できませんでした。');
        }
    }
    function errMySQLcode($result){
        if (!$result) {
        exit('文字コードを指定できませんでした。');
        }
    }
    function errMySQLregister($result){
        if (!$result) {
        exit('データを登録できませんでした。');
        }
    }
    function errMySQLclose($result){
        if (!$result) {
        exit('データベースとの接続を閉じられませんでした。');
        }
    }
}
?>
    
    

