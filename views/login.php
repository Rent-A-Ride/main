<?php

//    var_dump(password_hash('admin123',PASSWORD_DEFAULT));
    $hasErrors = isset($errors) && !empty($errors);
    $isemailError = $hasErrors && isset($errors['email']);
    $isPasswordlError = $hasErrors && isset($errors['password']);



?>
<main class="">
    <div class="box">
        <div class="inner-box">
            <div class="forms-wrap">
                <form action="/login" method="post" class="sign-in-form">
                    <div class="logo">
                        <img src="assets/img/logo.png" alt="Logo">
                        <p>Mobility without Hassle</p>
                    </div>

                    <div class="heading">
                        <h2>Welcome Back!</h2>
                        <h6>Not registered yet?</h6>
                        <a href="/selectUserType" class="toggle">Sign up</a>
                    </div>

                    <div class="actual-form">
                        <div class="input-wrap">
                            <input
                                    name="email"
                                    type="email"
                                    minlength="4"
                                    class="input-field<?php echo $isemailError? ' invalid' : ''?>"
                                    
                                     
                            />
                            <label>Email</label>
                            <span class="form-error"><?php echo $isemailError? "{$errors['email']}" : ""?></span>

                        </div>

                        <div class="input-wrap">
                            <input
                                    name="password"
                                    type="password"
                                    minlength="4"
                                    class="input-field<?php echo $isPasswordlError? ' invalid' : ''?>"
                                    autocomplete="off"

                            />
                            <label>Password</label>
                            <span class="form-error"> <?php echo $isPasswordlError? "{$errors['password']}" : ""?></span>
                        </div>  

                        <input type="submit" value="Sign In" class="sign-btn">

                        <p class="text">
                            Forgotten your password or you login details?
                            <br>
                            <a href="/selectUserType">Get help</a> signing in.
                        </p>
                    </div>


                </form>
            </div>

            <div class="carousel">
                <div class="slides" style="width: 100%; height: 100%; border-radius: 15px">
                    <img style="width: 100%; height: 100%; border-radius: 15px" src="assets/img/login_img/b.jpg" alt="Image 1">
                </div>

            </div>
        </div>
    </div>
</main>

