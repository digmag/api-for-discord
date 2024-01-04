<?php
    function route($method, $urlList, $requestData){
        switch ($method) {
            case 'POST':
                if($urlList[1] == "register"){
                    include_once 'UserFunctions/register.php';
                    register($requestData->body);
                }
                if($urlList[1] == "login"){
                    include_once 'UserFunctions/login.php';
                    login($requestData->body);
                }
                break;
            
            default:
                # code...
                break;
        }
    }
?>