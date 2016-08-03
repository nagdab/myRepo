<h2>Thank you for Porting! Here's your PortPass:</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Shopping List</th>
            <th>Time of Order</th>
            <th>Address</th>
            <th>Distance Away (miles)</th>
        </tr>
    </thead>
    <tbody>
    <?php
        
        // loops through each order in history, prints in table
        foreach ($orders as $order)
        {
            $person = CS50::query("SELECT name, username FROM users WHERE id = ?", $order["user_id"]);

            print("<tr>");
            print("<td>" . $person[0]["name"] . "</td>");
            print("<td>" . $person[0]["username"] . "</td>");
            print("<td>" . $order["shoppingList"] . "</td>");
            print("<td>" . $order["time"] . "</td>");
            print("<td>" . $order["address"] . "</td>");
            print("<td>" . $order["distance"] . "</td>");
            print("</tr>");
        }
    ?>
    </tbody>
</table>
