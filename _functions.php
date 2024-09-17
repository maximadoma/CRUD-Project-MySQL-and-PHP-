<?php

function dbConnection()
{
    //get ph timezone
    date_default_timezone_set('Asia/Manila');

    //create connection 
    //PDO: PHP Data Object
    $dbConnection = new PDO('mysql:dbname=iamcrud;host=localhost;charset=utf8mb4', 'root', '');

    $dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConnection;
}


//get fruits

function selectFruits()
{

}

?>