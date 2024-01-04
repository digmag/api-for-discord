<?php
    include_once './api/routers/DB/connectdb.php';
    function checklogin($token){
        $id = connect() -> query("SELECT id FROM activeTokens WHERE value = '$token'") -> fetch_assoc()['id'];
        if(is_null($id)){
            http_response_code(401);
            echo json_encode(["message" => "Unautorized", "code" =>401]);
            exit;
        }
    }
?>