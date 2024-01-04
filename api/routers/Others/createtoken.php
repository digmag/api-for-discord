<?php
    function createToken(){
        $token = bin2hex(random_bytes(64));
        return $token;
    }
?>