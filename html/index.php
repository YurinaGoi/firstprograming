<?php 
    //文字エンコーディングを指定する
    header('Content-type: text/html; charset=UTF-8');
?>
<html>
<head>
<title>
<?php
        define("Name", "盆栽");
        echo Name, "club";
?>
</title>
</head>
<body>
<?php
   $days[] = "朝";
   $days[] = "昼";
   $days[] = "夜";
   
    echo count( $days );
?>
</body>
</html>