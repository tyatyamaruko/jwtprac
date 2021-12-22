<?php

require __DIR__ . "/const.php";
require __DIR__ . "/vendor/autoload.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// GET
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'GET') {
    $allheaders = getallheaders();
    $auth = isset($allheaders['authorization']) ? $allheaders['authorization'] : '';
    
    $jwt = explode(" ", $auth)[1];

    try {
        $payload = JWT::decode($jwt, new Key(JWT_KEY, JWT_ALG)); // JWT デコード (失敗時は例外)
        $username = $payload->username; // エンコード時のデータ取得

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *'); // CORS
        echo json_encode(array('username' => $username)); // username を返却
        return;
    } catch (Exception $e) {
    }

    // Bearer が取得できない、JWT のでコードに失敗した場合は 401
    http_response_code(401);
}
