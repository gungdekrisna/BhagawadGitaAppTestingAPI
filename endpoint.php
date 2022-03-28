<?php

require_once "mysql.php";

$sloka = new Sloka();

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        if(!empty($_GET["keyword"]))
        {
            $sloka->getSlokaSQL($_GET["keyword"]);
        }
        else
        {
            $sloka->getAllSlokaSQL();
        }
        break;
    case 'POST':        
        if(!empty($_GET["detail_testing"]))
        {
            $sloka->insertTestDetailResult();
        }
        else
        {
            $sloka->insertTestResult();
        }
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    break;
}

?>