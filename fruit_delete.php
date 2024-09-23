<?php

require '_functions.php';

//get the fruitId value from the url parameter


if (isset($_POST['deleteFruit'])) {

    $fruitId = $_GET['fruitId'];

    $request = deleteFruit($fruitId);

    if ($request == true) {
        header("location: index.php?note=update");
    } else {
        header("location: index.php?note=error");
    }
} else {
    header("location: index.php?note=invalid");
}

?>