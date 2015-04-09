<?php
class mail{
    public $max = 40;
    public $word_name = "もう一度入力してください。";
    public function bunnki($name1){
        if((strlen($name1) > $this->max) || ($name1== null)){
            return $this->nyuryoku(0, $name1);
        }
        else{
            return $this->check($name1);
        }
    }
    public function check($name1){
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$name1 )) {
            return $this->nyuryoku(1, $name1);
        } 
        else {
            return $this->nyuryoku(0,$name1);
        }
    }

    public function nyuryoku($aaa, $name){
        switch($aaa){
            case 0:
                return $this->word_name;
            case 1:
                return $name;
        }
    }
} 
?>
