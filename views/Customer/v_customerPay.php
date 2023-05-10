<?php ?>

<button type="backBtn" id="backBtn">← Back</button>

<div class="pay-details">
    <h1>Payment for </h1>

    <div class="total-amount">
        <h2>Total Amount</h2>
        <form>
            <div class="pay-form-group">
                <label for="subtotal">Total Rent Amount</label>
                <input type="text" id="subtotal" value="$500.00" readonly>
            </div>
            <div class="pay-form-group">
                <label for="tax">Tax(5%)</label>
                <input type="text" id="tax" value="$50.00" readonly>
            </div>
            <div class="pay-form-group">
                <label for="discount">Discount</label>
                <input type="text" id="discount" value="Rs. 0.00">
            </div>
            <div class="pay-form-group" id="total-amount-group">
                <label for="total">Total</label>
                <input type="text" id="total" value="$550.00" readonly>
            </div>
            <div class="pay-form-group">
                <h3>Payment Type</h3>
                <label>
                    <input type="radio" name="payment-type" value="full" checked> Full Payment
                </label>
                <label>
                    <input type="radio" name="payment-type" value="advance"> 40% Advance
                </label>
            </div>
            <div class="pay-form-group">
                <button type="submit" id="confirm-button">Confirm Payment</button>
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
</script>
