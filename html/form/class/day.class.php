<?php
class day{
    public $word_day1= "2015-12-24";
    public $word_day2= "2015-12-25";
    public $day1;
    public function DAY($day1= null){
        if($day1 == 1) {
            return $this->word_day1 ;
        } 
        else{
            return $this->word_day2 ;
        }
    }
}
?>