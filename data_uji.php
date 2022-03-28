<?php

require_once "mysql.php";

$sloka = new Sloka();

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        $sloka->getAllDataUji();
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    break;
}

?>