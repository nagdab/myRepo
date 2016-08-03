<h2>Thank you for your Order! Here's your order confirmation:</h2>
<table class="table table-striped">
    <tbody>
    <?php    
        print("<tr>");
        print("<th>Date and Time</th>");
        print("<th>" . $time . " GMT</th>");
        print("</tr>");
        print("<tr>");
        print("<th>Shopping List</th>");
        print("<th>" . $shoppingList . "</th>");
        print("</tr>");
        print("<tr>");
        print("<th>Delivery Address</th>");
        print("<th>" . $address . "</th>");
        print("</tr>");
    ?>
    </tbody>
</table>
