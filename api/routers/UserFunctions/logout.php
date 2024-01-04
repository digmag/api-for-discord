<?php
    include_once './api/routers/Others/checklogin.php';
    include_once './api/routers/Others/createtoken.php';
    function logout($token){
        checklogin($token);
        $link = connect();
        $del = $link -> query("DELETE FROM activeTokens WHERE value = '$token'");
        http_response_code(200);
        echo json_encode(["message" => "Выход выполнен", "code" => 200]);
    }
?>