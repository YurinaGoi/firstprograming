<?php
class time{
    public $word_time1 = "18:00";
    public $word_time2 = "20:00";
    public function TIME($time1 = null){
        if($time1 == 1) {
            return $this->word_time1 ;
        } 
        else{
            return $this->word_time2 ;
            }
        }
}
?>