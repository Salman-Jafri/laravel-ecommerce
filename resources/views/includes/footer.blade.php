<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="footer_box">
                    <h4>Products</h4>
                    <li><a href="#">Mens</a></li>
                    <li><a href="#">Womens</a></li>
                    <li><a href="#">Youth</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="footer_box">
                    <h4>About</h4>
                    <li><a href="#">Careers and internships</a></li>
                    <li><a href="#">Sponserships</a></li>
                    <li><a href="#">team</a></li>
                    <li><a href="#">Catalog Request/Download</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="footer_box">
                    <h4>Customer Support</h4>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Shipping and Order Tracking</a></li>
                    <li><a href="#">Easy Returns</a></li>
                    <li><a href="#">Warranty</a></li>
                    <li><a href="#">Replacement Binding Parts</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="footer_box">
                    <h4>Newsletter</h4>
                    <div class="footer_search">
                        <form>
                            <input type="text" value="Enter your email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your email';}">
                            <input type="submit" value="Go">
                        </form>
                    </div>
                    <ul class="social">
                        <li class="facebook"><a href="#"><span> </span></a></li>
                        <li class="twitter"><a href="#"><span> </span></a></li>
                        <li class="instagram"><a href="#"><span> </span></a></li>
                        <li class="pinterest"><a href="#"><span> </span></a></li>
                        <li class="youtube"><a href="#"><span> </span></a></li>
                    </ul>

                </ul>
            </div>
        </div>
        <div class="row footer_bottom">
            <div class="copy">
                <p>© 2014 Template by <a href="http://w3layouts.com" target="_blank">w3layouts</a></p>
            </div>
            <dl id="sample" class="dropdown">
                <dt><a href="#"><span>Change Region</span></a></dt>
                <dd>
                    <ul>
                        <li><a href="#">Australia<img class="flag" src="images/as.png" alt="" /><span class="value">AS</span></a></li>
                        <li><a href="#">Sri Lanka<img class="flag" src="images/srl.png" alt="" /><span class="value">SL</span></a></li>
                        <li><a href="#">Newziland<img class="flag" src="images/nz.png" alt="" /><span class="value">NZ</span></a></li>
                        <li><a href="#">Pakistan<img class="flag" src="images/pk.png" alt="" /><span class="value">Pk</span></a></li>
                        <li><a href="#">United Kingdom<img class="flag" src="images/uk.png" alt="" /><span class="value">UK</span></a></li>
                        <li><a href="#">United States<img class="flag" src="images/us.png" alt="" /><span class="value">US</span></a></li>
                    </ul>
                </dd>
            </dl>
        </div>
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_95co3BUeREiM37fKja9cYizp');
    var elements = stripe.elements();

    var style = {
        base: {
            // Add your base input styles here. For example:
            fontSize: '16px',
            color: "#32325d",
        }
    };

    // Create an instance of the card Element
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the customer that there was an error
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }


</script>