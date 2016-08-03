<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<form action="order.php" method="post">
    <fieldset>
        <h1> Order Groceries Delivered to Your Doorstep </h1>
        <div>
            <div class="form-group">
                <h3> Step 1: Enter the Delivery Location </h3>
                <input class="form-control" id="searchTextField" name="address" placeholder="Address" type="text">
            </div>
            
            <div class="form-group">
                <h3> Step 2: Enter Your Shopping List </h3>
                <textarea class="form-control" name="shoppingList" cols="60" rows="10" placeholder = "Shopping List..." type="text"></textarea>
            </div>
            
            <div class="form-group">
                <h3> Step 3: Agree to the Terms and Conditions </h3>
                <p> TERMS AND CONDITIONS: Foodport isn't responsible for any liabilities that arise with your grocery experience. Please notify us with feedback if something goes wrong. </p>
                <input type="radio" name="terms" id="terms" value="accepted">
                I agree to the terms and conditions.
            </div>
        </div>
            <h3> Step 4: Submit! </h3>
            <div class="form-group col-md-3">
    		</div>
            <div class="form-group col-md-3">
                <a href="index.php"><button class="btn btn-lg btn-primary" type="button">
                    Cancel
                </button></a>
    		</div>
    		<div class="form-group col-md-3">
                <button class="btn btn-lg btn-primary" type="submit">
                    <span></span>
                    Submit!
                </button>
    		</div>
    		<div class="form-group col-md-3">
    		</div>
    </fieldset>
</form>

<script>

    // autocomplete for address using google api
    function initialize() {

    var input = document.getElementById('searchTextField');
    var autocomplete = new google.maps.places.Autocomplete(input);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
