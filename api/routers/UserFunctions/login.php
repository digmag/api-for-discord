<?php
    include_once './api/routers/Others/createtoken.php';
    include_once './api/routers/DB/connectdb.php';
    function login($requestData){
        $link = connect();
        $email = $requestData ->email;
        $password = sha1($requestData -> password);
        $user = $link -> query("SELECT * FROM user WHERE email = '$email' AND password = '$password'") -> fetch_assoc();
        if(!is_null($user)){
            $token = createToken();
            $id = $user['id'];
            $time_to_valid = ((int)explode(' ', microtime())[1])+10000;
            $ins = $link -> query("INSERT INTO activeTokens(id,value,validTime) VALUES ('$id', '$token', '$time_to_valid')");
            echo $link ->error;
            http_response_code(200);
            echo json_encode(["token" => $token]);
            exit;
        }
        http_response_code(400);
        echo json_encode(["message" => "Bad Request", "code" => 400]);
    }
?>