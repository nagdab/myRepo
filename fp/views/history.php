<h1> Order History </h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Time</th>
            <th>Shopping List</th>
            <th>Delivery Address</th>
            <th>Fulfilled?</th>
            <th>Porter Name</th>
        </tr>
    </thead>
    <tbody>
    <?php
        
        // loops through each order in history, prints in table
        foreach ($orders as $order)
        {
            print("<tr>");
            print("<td>" . $order["time"] . "</td>");
            print("<td>" . $order["shoppingList"] . "</td>");
            print("<td>" . $order["address"] . "</td>");
            
            // if unfulfilled
            if($order["fulfilled"] == 0)
            {
                print("<td> NO </td>");
                print("<td> N/A </td>");
            }
            else
            {
                // get deliverer if fulfilled
                $person = CS50::query("SELECT name FROM users WHERE id = ?", $order["fulfilled"]);
                print("<td> YES </td>");
                print("<td>" . $person[0]["name"] . "</td>");
            }
            print("</tr>");
        }
    ?>
    </tbody>
</table>


<h1> Port History </h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Time</th>
            <th>Port Size</th>
            <th>Order Name</th>
            <th>Order Address</th>
            <th>Order Shopping List</th>
        </tr>
    </thead>
    <tbody>
    <?php
    
        // gets all orders fulfilled by user
        $orders_fulfilled = CS50::query("SELECT * FROM orders WHERE fulfilled = ? ORDER BY time_fulfilled ASC;", $_SESSION["id"]);
        
        $counter = 0;
        
        
        // loops through each delivery in user's port history, prints in table
        foreach ($ports as $port)
        {
            print("<tr>");
            print("<td>" . $port["time"] . "</td>");
            print("<td>" . $port["numPort"] . "</td>");
            print("<td></td>");
            print("<td></td>");
            print("<td></td>");
            print("</tr>");
            
            // loops through each delivery
            for($i = 0; $i < $port["numPort"]; $i++, $counter++)
            {
                // gets name of orderer
                $name = CS50::query("SELECT name FROM users WHERE id = ?", $orders_fulfilled[$counter]["user_id"]);
                $name = $name[0]["name"];
                
                print("<tr>");
                print("<td></td>");
                print("<td></td>");
                print("<td>" . $name . "</td>");
                print("<td>" . $orders_fulfilled[$counter]["address"] . "</td>");
                print("<td>" . $orders_fulfilled[$counter]["shoppingList"] . "</td>");
                print("</tr>");
            }
        }
    ?>
    </tbody>
</table>