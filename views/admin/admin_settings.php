 <?php

$hasErrors = isset($errors) && !empty($errors);
$hasCurrentPasswordError = $hasErrors && isset($errors['current_password']);
$hasNewPasswordError = $hasErrors && isset($errors['new_password']);
$hasConfirmPasswordError = $hasErrors && isset($errors['confirm_password']);

?> 
<h1 class="page-title"><i class='bx bxs-cog' ></i> Settings</h1>
<hr>
<br>
<div class="settings-container">

    <h2>Change Password</h2>
    
    <!--    Change Password -->
    <form action="/admin/Settings" method="post" class="form-container">
        <input name="mode" value="change-password" hidden>
        <input type="email" name="email" value="<?= $owner[0]['email']?>" hidden>

        <div class="form-group">
            <label for="current_password">Current Password:</label>
            <input type="password" id="current-password" name="current_password" required>
        </div>

        <div class="form-group">
            <label for="new_password">New Password:</label>
            <input type="password" id="new-password" name="new_password" required>
            <span class="form-error2"><?php  ?></span>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm_password" required>
        </div>

        

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


