<?php
class seki{
    public $word_seki0 = "禁煙席";
    public $word_seki1 = "喫煙席";
    public function SEKI($seki0 = null){
        if($seki0 == 0){
            return $this->word_seki0;
        }
        else{

            return $this->word_seki1;
        }
    }
}
?>