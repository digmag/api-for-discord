<?php
    function route($method, $urlList, $requestData){
        switch ($method) {
            case 'POST':
                if($urlList[1] == "register"){
                    include_once 'UserFunctions/register.php';
                    register($requestData->body);
                }
                break;
            
            default:
                # code...
                break;
        }
    }
?>