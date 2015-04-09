<?php
class denwa{
    public $word_denwa = "半角数字を入力してください。";
    public function suuji($denwa1){
        if (!ctype_digit($denwa1)){
            return $this->word_denwa;
        }
        else {
            return $denwa1;
        }
    }
}
?>


