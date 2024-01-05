<?php
    include_once './api/routers/DB/connectdb.php';
    function createChat($name){
        $link = connect();
        $chatcreate = $link -> query("INSERT INTO chat(name) values ('$name')");
        if($chatcreate){
            return TRUE;
        }
        return FALSE;
    }
?>