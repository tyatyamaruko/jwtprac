<?php

require __DIR__ . "/const.php";
require __DIR__ . "/vendor/autoload.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// POST時
if (strtoupper($_SERVER["REQUEST_METHOD"] == "POST")) {
// $secret

    // json文字列取得
    $inputString = file_get_contents("php://input");
    $input = @json_decode($inputString, true);

    if (is_array($input)) {
        $input = array_merge(array("username" => "", "password" => ""), $input);
        $username = $input["username"];
        $password = $input["password"];

        // username = test, password = testで認証OK
        $ok = ($username == "test" && $password == "test");
        if ($ok) {
            $payload = array(
                "iss" => JWT_ISSUER,
                "exp" => time() + JWT_EXPIRES,
                "username" => $username,
            );
            $jwt = JWT::encode($payload, JWT_KEY, JWT_ALG);

            header("Content-Type: application/json");
            header("Access-Control-Allow-Origin: *");
            echo json_encode(array("token" => $jwt, "username" => $username));
            return;
        }
    }

    http_response_code(401);
}