<?php
    require(__DIR__ . "/../includes/config.php");


    // query fulfilled orders with currentDate
    $locations = json_encode(CS50::query("SELECT * FROM orders WHERE fulfilled > 0 AND time_fulfilled >= UNIX_TIMESTAMP(CURDATE())")); 

    // output articles as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($locations, JSON_PRETTY_PRINT));
?>