<?php 
    include_once('../functions.php');


    delete_link($_GET['id']);
    header("Location: http://localhost/BaptisteLecordier_Eval_PHP/");
?>