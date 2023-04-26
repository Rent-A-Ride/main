<?php
/** @var $customer Customer */

use app\models\Customer;

?>
<h1 class="page-title"><i class='bx bxs-cog' ></i> Settings</h1>
<hr>
<br>
<div class="settings-container">

    <h2>Change Password</h2>

    <!--    Change Password -->
    <form method="post" class="form-container">
        <input name="mode" value="change-password" hidden>
        <input type="email" name="email" value="<?= $customer->getEmail();?>" hidden>

        <div class="form-group">
            <label for="current-password">Current Password:</label>
            <input type="password" id="current-password" name="current-password" required>
        </div>

        <div class="form-group">
            <label for="new-password">New Password:</label>
            <input type="password" id="new-password" name="new-password" required>
            <span class="form-error2"><?= $customer->getFirstError('password')?></span>
        </div>

        <div class="form-group">
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
        </div>

        <span class="form-error2"><?= $customer->getFirstError('change-password')?></span>

        <button type="submit" class="btn btn-primary">Change Password</button>

    </form>
</div>

<hr class="hr">
<!--    Change Email -->

<div class="settings-container">
    <h2>Change Email</h2>
    <form>
        <label for="current-password">New Email:</label>
        <input type="password" id="current-password" name="current-password" required>

        <button type="submit">Send Link</button>
    </form>
</div>


