<?php 
    include_once('../functions.php');


    create_link ($_GET['title'],$_GET['url']);
    header("Location: http://localhost/BaptisteLecordier_Eval_PHP/");
?>