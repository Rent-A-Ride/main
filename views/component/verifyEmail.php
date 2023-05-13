<?php 


?>
<div class="container">
    <h2>Verify Your Account</h2>
    <p>
      We emailed you the six digit code to personal@email.com <br/>
      Enter the code below to confirm your email address
    </p>
    
    <form action="/user/verifyEmail" method="post">
        <div class="code-container">
            <input type="number" class="code <?= $model->hasError('unmatched') ? ' invalid' : ''?>" placeholder="0" min="0" max="9" name="digit1" required>
            <input type="number" class="code <?= $model->hasError('unmatched') ? ' invalid' : ''?>" placeholder="0" min="0" max="9" name="digit2" required>
            <input type="number" class="code <?= $model->hasError('unmatched') ? ' invalid' : ''?>" placeholder="0" min="0" max="9" name="digit3" required>
            <input type="number" class="code <?= $model->hasError('unmatched') ? ' invalid' : ''?>" placeholder="0" min="0" max="9" name="digit4" required>
            <input type="number" class="code <?= $model->hasError('unmatched') ? ' invalid' : ''?>" placeholder="0" min="0" max="9" name="digit5" required>
            <input type="number" class="code <?= $model->hasError('unmatched') ? ' invalid' : ''?>" placeholder="0" min="0" max="9" name="digit6" required>
        </div>
        <div>
            <input type="text" style="display:none" value="<?= $email['email'] ?>" name="email">
        
            <button type="submit" class="btn btn-primary">Verify</button>
        </div>
    </form>

    
    <!-- <small class="info"> -->
    
    <span class="form-error"><?= $model->getFirstError('unmatched') ?></span>
    <!-- </small> -->

  </div>