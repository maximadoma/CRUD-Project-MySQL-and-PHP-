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
    $statement = dbConnection()->prepare("SELECT * FROM fruit ORDER BY fruit_id ASC");
    $statement->execute();
    return $statement;
}

//create fruits 

function createFruit($fruitName, $fruitQty)
{
    $statement = dbConnection()->prepare("INSERT INTO fruit (fruit_name, fruit_qty, fruit_created, fruit_updated) 
    VALUES 
    (
    :fruit_name, 
    :fruit_qty, 
    NOW(),
    NOW()
    )");

    $statement->execute([
        'fruit_name' => $fruitName,
        'fruit_qty' => $fruitQty
    ]);

    if ($statement) {
        return true;
    } else {
        return false;
    }
}

//update fruits 
function updateFruit($fruitName, $fruitQty, $fruitId)
{
    $statement = dbConnection()->prepare("UPDATE fruit SET 
    fruit_name = :fruit_name,
    fruit_qty =  :fruit_qty,
    fruit_updated = NOW()
    WHERE 
    fruit_id = :fruit_id
    ");

    $statement->execute([
        'fruit_name' => $fruitName,
        'fruit_qty' => $fruitQty,
        'fruit_id' => $fruitId
    ]);

    if ($statement) {
        return true;
    } else {
        return false;
    }
}


//update fruits 
function deleteFruit($fruitId)
{
    $statement = dbConnection()->prepare("DELETE FROM fruit WHERE
    fruit_id = :fruit_id
    ");

    $statement->execute([
        'fruit_id' => $fruitId
    ]);

    if ($statement) {
        return true;
    } else {
        return false;
    }
}


?>