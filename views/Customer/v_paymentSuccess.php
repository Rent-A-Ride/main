<?php ?>

<link rel="stylesheet" href="/assets/css/customer/customerPay/paymentSuccess.css">
<div class="success-body">
    <div class="success-message">
        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
        </svg>
        <h1>Payment Successful!</h1>
        <p>Thank you for your purchase. Your payment of <span class="amount">Rs. <?= number_format($payment_amount, 2) ?></span> was successful.</p>

        <div class="success-message-footer">
            <p>You should be automatically redirected in <span id="seconds">10</span> seconds.</p>
        </div>

    </div>
</div>

<script>
    var seconds = 10; // seconds for HTML
    var foo; // variable for clearInterval() function

    function redirect() {
        document.location.href = '#';
    }

    function updateSecs() {
        document.getElementById("seconds").innerHTML = seconds;
        seconds--;
        if (seconds == -1) {
            clearInterval(foo);
            redirect();
        }
    }

    function countdownTimer() {
        foo = setInterval(function () {
            updateSecs()
        }, 1000);
    }

    countdownTimer();
</script>

