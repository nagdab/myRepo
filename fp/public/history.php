<?php

    // configuration
    require("../includes/config.php"); 
    
    // queries orders from database
    $orderRows = CS50::query("SELECT * FROM orders WHERE user_id = ?", $_SESSION["id"]);
    
    // queries porter history from database
    $portRows = CS50::query("SELECT * FROM port_history WHERE user_id = ?", $_SESSION["id"]);

    // creates arrays
    $orders = [];
    $ports = [];
    
    // loops through every order
    foreach ($orderRows as $row)
    {
        // stores variables in orders array
        $orders[] = [
            "shoppingList" => $row["shoppingList"],
            "time" => $row["time"],
            "address" => $row["address"],
            "fulfilled" => $row["fulfilled"]
        ];
    }
    
    // loops through every order
    foreach ($portRows as $row)
    {
        // stores variables in ports array
        $ports[] = [
            "time" => $row["time"],
            "numPort" => $row["numPort"]
        ];
    }
    
    // render history
    render("history.php", ["title" => "History", "orders" => $orders, "ports" => $ports]);
?>
