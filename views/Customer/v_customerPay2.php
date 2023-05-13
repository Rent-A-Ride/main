<?php ?>

<button type="backBtn" id="backBtn">← Back</button>

<div class="pay-details">
    <h3 style="padding: 10px 0px">Remaining Payment for Vehicle Booking #<?=$bookingId?></h3>

    <div class="total-amount">
        <h2>Complete the Payment</h2>
        <hr class="hr1">
        <label class="currency">LKR</label>
        <form id="payment-form" method="post">
            <input hidden name="bookingId" value="<?= $bookingId ?>">
            <div class="pay-form-group">
                <label for="rental-price">Total Remaining Amount</label>
                <input name="remaining-amount" type="text" id="rental-price" value="<?= number_format((float)$total-(float)$paid, 2) ?>" readonly>
            </div>


            <hr style="width: 25%; margin-left: auto" class="hr1">

            <div class="pay-form-group">
                <label for="total">Total Payment Amount</label>
                <input name="total_pay_display" type="text" id="total-pay" value="<?= number_format((float)$total-(float)$paid, 2) ?>" readonly>
                <input name="total_pay" hidden value="<?=(float)$total-(float)$paid?>">
            </div>

            <div class="pay-form-group">
                <button type="submit" id="pay-button" name="payment"><i class='bx bxl-stripe' ></i> Pay Now</button>
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
