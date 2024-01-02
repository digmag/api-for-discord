<?php
    function connect(){
        $link = mysqli_connect("127.0.0.1", "root", "", "DB_FOR_PROJ");
        if(!$link){
            echo json_encode(["code" => "500", "message" => "Error to connect db"]);
            http_response_code(500);
        }
        else{
            return $link;
        }
    }
?>