<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("order_form.php", ["title" => "Order Groceries"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["address"]))
        {
            apologize("You must provide the delivery address.");
        }
        else if (empty($_POST["shoppingList"]))
        {
            apologize("You must provide your shopping list.");
        }
        else if (!array_key_exists("terms", $_POST))
        {
            apologize("You must accept the terms and conditions.");
        }
        
        // Get lat and long by address
        $output= json_decode(file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.str_replace(' ','+',$_POST["address"]).'&sensor=false'));
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;
        
        // insert order into orders database
        $queried = CS50::query("INSERT IGNORE INTO orders (user_id, shoppingList, longitude, latitude, address, fulfilled) VALUES(?, ?, ?, ?, ?, 0)", 
                                    $_SESSION["id"],            // session id
                                    $_POST["shoppingList"],     // shopping list
                                    $longitude,                 // longitude
                                    $latitude,                  // latitude
                                    $_POST["address"]           // address
        );
        
        // if successful, show confirmation page
        if(1== $queried)
        {
            render("order_view.php", ["title" => "Order Confirmation", "time" => date("m/d/Y h:i:s"), "shoppingList" => $_POST["shoppingList"], "address" => $_POST["address"]]);
        }
        else
        {  
            // else apologize
            apologize("An unknown error occurred");
        }
    }

?>