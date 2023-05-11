<?php
//
////    var_dump(password_hash('admin123',PASSWORD_DEFAULT));
//    $hasErrors = isset($errors) && !empty($errors);
//    $isemailError = $hasErrors && isset($errors['email']);
//    $isPasswordlError = $hasErrors && isset($errors['password']);
//    $isUserTypeError = $hasErrors && isset($errors['user_type']);
//
//
//
//?>
<main class="">
    <div class="box">
        <div class="inner-box">
            <div class="forms-wrap">
                <form action="/login" method="post" autocomplete="off" class="sign-in-form">
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
                                    class="input-field<?= $model->hasError('email') ? ' invalid' : ''?>"
                                    value="<?= $model->thereIsError() ? $model->email : ''?>"
                                     
                            />
                            <label class="label<?= $model->hasError('email') ? ' invalid' : ''?>">Email</label>
                            <span class="form-error"><?= $model->getFirstError('email') ?></span>

                        </div>

                        <div class="input-wrap">
                            <input
                                    name="password"
                                    type="password"
                                    minlength="4"
                                    class="input-field<?= $model->hasError('password') ? ' invalid' : ''?>"
                                    autocomplete="off"
                            />
                            <label class="label<?= $model->hasError('password') ? ' invalid' : ''?>" >Password</label>
                            <span class="form-error"><?= $model->getFirstError('password') ?></span>
                        </div>
                        <div class="input-wrap">
                            <select 
                                name="user_type"
                                class="input-field"

                                >
                            
                                <option value="owner">Admin</option>
                                <option value="vehicleowner">Vehicle Owner</option>
                                <option value="driver">Driver</option>
                                <option value="customer">Customer</option>
                            </select>
                            <label>User Role</label>
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
                    <img style="width: 100%; height: 100%; border-radius: 15px" src="assets/img/rentCover.jpg" alt="Image 1">
                </div>

            </div>
        </div>
    </div>
</main>

