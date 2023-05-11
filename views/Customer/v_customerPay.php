<?php ?>

<button type="backBtn" id="backBtn">← Back</button>

<div class="pay-details">
    <h1>Payment for Vehicle Booking</h1>

    <div class="total-amount">
        <h2>Total Amount</h2>
        <hr>
        <label class="currency">Rs.</label>
        <form id="payment-form" method="post">
            <div class="pay-form-group">
                <label for="total-rent">Total Rent Amount</label>
                <input name="rental_price" type="text" id="total-rent" value="<?= number_format($total, 2) ?>" readonly>
            </div>
            <div class="pay-form-group">
                <label for="tax">Tax (5%)</label>
                <input name="tax" type="text" id="tax" value="" readonly>
            </div>
<!--            <div class="pay-form-group">-->
<!--                <label for="discount">Discount</label>-->
<!--                <input type="text" id="discount" value="Rs. 0.00">-->
<!--            </div>-->

            <div class="pay-form-group">
                <label for="payment-type">Payment Type</label>
                <select id="payment-type" name="payment-type">
                    <option value="full" selected>Full Payment</option>
                    <option value="advance">40% Advance</option>
                </select>
            </div>

            <div class="pay-form-group">
                <label for="total">Total Payment Amount</label>
                <input name="total_pay" type="text" id="total-pay" value="" readonly>
            </div>


            <div class="pay-form-group">
                <button type="submit" id="pay-button">Pay Now</button>
            </div>
        </form>
    </div>
</div>











<script>
    const backBtn = document.getElementById("backBtn");
    backBtn.addEventListener("click", goBack);

    function goBack() {
        window.history.back();
    }

    document.addEventListener("DOMContentLoaded", function() {
        const paymentForm = document.getElementById("payment-form");

        paymentForm.addEventListener("submit", function(event) {

            var paymentType = document.querySelector('input[name="payment-type"]:checked').value;
            var totalRent = parseFloat(document.getElementById("total-rent").value.replace("$", ""));
            var tax = parseFloat(document.getElementById("tax").value.replace("$", ""));
            var discount = parseFloat(document.getElementById("discount").value.replace("Rs. ", ""));

            var paymentAmount = totalRent + tax - discount;

            if (paymentType === "advance") {
                paymentAmount *= 0.4;
            }

            // Use Stripe API here to initiate the payment process
            // Replace the following line with the actual Stripe API call
            console.log("Payment Amount: $" + paymentAmount);
        });
    });

    // Get the necessary elements
    const totalRentInput = document.getElementById('total-rent');
    const taxInput = document.getElementById('tax');
    const paymentTypeSelect = document.getElementById('payment-type');
    const totalPayInput = document.getElementById('total-pay');
    paymentTypeSelect.addEventListener('change', calculatePaymentAmount);

//     calculate the tax function
    //  to calculate the tax
    function calculateTax() {
        // Get the total rent amount
        const totalRent = parseFloat(totalRentInput.value.replace(',', ''));

        // Calculate the tax (5% of the total rent)
        const tax = (totalRent * 0.05).toFixed(2);

        // Update the tax input field value
        taxInput.value = tax;
    }

    // call the calculateTax function when page loads
    calculateTax();

    function calculatePaymentAmount() {
        // Get the total rent amount
        const totalRent = parseFloat(totalRentInput.value.replace(',', ''));

        // Calculate the tax (5% of the total rent)
        const tax = (totalRent * 0.05).toFixed(2);

        // Update the tax input field value
        taxInput.value = tax;

        // Calculate the total payment amount based on the payment type
        const paymentType = paymentTypeSelect.value;
        let totalPay;

        if (paymentType === 'full') {
            totalPay = (totalRent + parseFloat(tax)).toFixed(2);
        } else if (paymentType === 'advance') {
            totalPay = ((totalRent + parseFloat(tax)) * 0.4).toFixed(2);
        }

        // Update the total payment input field value
        totalPayInput.value = totalPay;
    }

    // Initially calculate the payment amount
    calculatePaymentAmount();


</script>
