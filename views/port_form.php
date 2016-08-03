<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<form action="port.php" method="post">
    <fieldset>
        <h1> Become a Porter: Deliver Groceries And Help the Community! </h1>
        <div>
            <div class="form-group">
                <h3> Step 1: Enter Your Home Location </h3>
                <input class="form-control" id="searchTextField" name="homeAddress" placeholder="Address" type="text">
            </div>
            
            <div class="form-group">
                <h3> Step 2: How Many People Can You Help? </h3>
                <select name="people">
                  <option value="1">1 person</option>
                  <option value="2">2 people</option>
                  <option value="3">3 people</option>
                  <option value="4">4 people</option>
                  <option value="5">5 people</option>
                </select>
            </div>
            
            <div class="form-group">
                <h3> Step 3: Enter Your Porting Radius </h3>
                <select name="radius">
                  <option value="10">10 miles</option>
                  <option value="20">20 miles</option>
                  <option value="30">30 miles</option>
                  <option value="40">40 miles</option>
                  <option value="50">50 miles</option>
                </select>
            </div>
            
            <div class="form-group">
                <h3> Step 4: Agree to the Terms and Conditions </h3>
                <p> TERMS AND CONDITIONS: Foodport isn't responsible for any liabilities that arise with your porting experience. Please notify us with feedback if something goes wrong. </p>
                <input type="radio" name="terms" id="terms" value="accepted">
                I agree to the terms and conditions.
            </div>
        </div>
        <div class="form-group">
            <h3> Step 5: Submit! </h3>
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
