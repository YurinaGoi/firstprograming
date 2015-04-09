<?php
class name{
    public $max = 20;
    public $word_name = "もう一度入力してください。";
    public function bunnki($name1){
        if((strlen($name1) > $this->max) || ($name1== null)){
            return $this->nyuryoku(0, $name1);
        }
        else{
            return $this->nyuryoku(1, $name1);
        }
    }
    public function nyuryoku($i, $name){
        switch($i){
            case 0:
                return $this->word_name;
            case 1:
                return $name;
        }
    }
} 
?>
