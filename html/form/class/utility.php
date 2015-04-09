<?php

Class utility {
    function htmlentity ($str){
        return htmlentities($str, ENT_QUOTES, "UTF-8");
    }
}
?>