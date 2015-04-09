<?php
class toten{
    public $word0 = "選択してください。";
    public $word1 = "ウェブサイト";
    public $word2 = "検索サイト";
    public $word3 = "雑誌";
    public $word4 = "知人";
    public function TOTEN($toten1 = NULL){
        switch($toten1){
        case 1:
            return $this->word1;
            break;
        case 2:
            return $this->word2;
            break;
        case 3:
            return $this->word3;
            break;
        case 4:
            return $this->word4;
            break;
    }
    }
}
?>

