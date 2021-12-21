<?php

require __DIR__ . "/const.php";
require __DIR__ . "/vendor/autoload.php";

use \Firebase\JWT\JWT;

// GET
if (strtoupper($_SERVER["REQUEST_METHOD"]) == "GET") {
    $auth = isset($_SERVER["HTTP_AUTHORIZATION"]) ? $_SERVER["HTTP_AUTHORIZATION"] : "";
    if (preg_match("#\ABearer\s+(.+)\z#", $auth, $m)) {
        $jwt = $m[1];
        try {
            $payload = JWT::decode($jwt, JWT_KEY, array(JWT_ALG));
            $username = $payload -> username;

            header("Content-Type: application/json");
            header("Access-Control-Allow-Origin");
            echo json_encode(array("username" => $username));
            return;
        } catch (Exception $e) {

        }
    }

    http_response_code(401);
}