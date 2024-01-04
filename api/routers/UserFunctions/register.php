<?php
    include_once './api/routers/Others/createtoken.php';
    include_once './api/routers/DB/connectdb.php';
    function register($requestData){
        $link = connect();
        $name = $requestData -> name;
        $email = $requestData -> email;
        $hash = md5($email . time());
        $password = $requestData -> password;
        $hashpass = sha1($password);
        $insert = $link -> query("INSERT INTO user(name, email, hash, password) VALUES ('$name', '$email', '$hash', '$hashpass')");
        if ($insert){
            $id = $link->query("SELECT * FROM user WHERE email = '$email'")->fetch_assoc()['id'];
            $token = createToken();
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