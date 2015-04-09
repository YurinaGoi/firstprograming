<?php
header("Content-type: text/html;charset=UTF-8");
?>
<html>
    <body>
        <?php
        $f1 = $_POST["food1"];
        $f2 = $_POST["food2"];
        $f1 = htmlentities( $f1, ENT_QUOTES, "UTF-8");
        $f2 = htmlentities( $f2, ENT_QUOTES, "UTF-8");
        echo "あなたは「",$f1,"」が好きなんですね<br>\n";
        echo "あなたは「",$f2,"」が好きなんですね<br>\n";
       ?>
    </body>
</html>
