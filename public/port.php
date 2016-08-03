<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("port_form.php", ["title" => "Port Groceries"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["homeAddress"]))
        {
            apologize("You must provide your home address.");
        }
        else if (!array_key_exists("terms", $_POST))
        {
            apologize("You must accept the terms and conditions.");
        }
        
        // Get lat and long by address
        $output= json_decode(file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.str_replace(' ','+',$_POST["homeAddress"]).'&sensor=false'));
        $homeLatitude = $output->results[0]->geometry->location->lat;
        $homeLongitude = $output->results[0]->geometry->location->lng;
        
        // select all orders close to deliverer address
        $rows = CS50::query("SELECT * FROM orders WHERE 
        fulfilled = 0
        AND ($homeLatitude - latitude) BETWEEN -1 AND 1
        AND ($homeLongitude - longitude) BETWEEN -1 AND 1
        ");
        
        // arrOrders stores deliverer's fulfilled orders
        $arrOrders = array();
        
        // loop through orders until end or until willingness limit reached
        for($i = 0, $n = count($rows); $i < $n && $i < $_POST["people"]; $i++)
        {
            $row = $rows[$i];
            
            // get distance between deliverer and buyer
            $distance = distance($row["latitude"], $row["longitude"], $homeLatitude, $homeLongitude);
            
            // if within radius, fulfill order
            if($distance <= $_POST["radius"])
            {
                $row["distance"] = $distance;
                array_push($arrOrders, $row);
                CS50::query("UPDATE orders SET fulfilled = ?, time_fulfilled = CURRENT_TIMESTAMP WHERE user_id = ? AND time = ?", $_SESSION["id"], $row["user_id"], $row["time"]);
            }
        }
        
        // record delivery in port_history
        $success = CS50::query("INSERT IGNORE INTO port_history (user_id, numPort) VALUES(?, ?)", 
                                    $_SESSION["id"],            // session id
                                    count($arrOrders)
        );
        
        // if unsuccessful
        if($success != 1)
        {
            apologize("An Unknown Error Occured. Sorry!");
        }
        
        // render PortPass confirmation
        render("port_view.php", ["title" => "Your Portpass", "orders" => $arrOrders]);
    }
    
    /*
     * Distance computes and returns distance in miles between ($lat1, $lon1) and ($lat2, $long2).
     */
    function distance($lat1, $lon1, $lat2, $lon2) {
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon1 - $lon2));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      return $dist * 60 * 1.1515;
    }

?>