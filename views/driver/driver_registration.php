<?php
/** @var $model \app\models\adminCustomer */
?>


<h1>Driver Register</h1>

<main class="sign-up-mode">
    <div class="box">
        <div class="inner-box">
            <div class="forms-wrap">
                <form action="" method="post" autocomplete="off" class="sign-up-form">
                    <div class="logo">

                        <!-- <h4>Rent-A-Ride</h4> -->
                    </div>

                    <div class="heading">
                        <h2>Get Started!</h2>
                        <h6>Already have a account?</h6>
                        <a href="#" class="toggle">Sign in</a>
                    </div>

                    <div class="actual-form">
                        <div class="input-wrap">

                            <input
                                name="firstname"
                                type="text"
                                minlength="4"
                                class="input-field<?= $model->hasError('firstname') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->firstname : ''?>"

                            />
                            <label>Fisrt Name</label>
                            <span class="form-error"><?= $model->getFirstError('firstname') ?></span>
                        </div>

                        <div class="input-wrap">
                            <input
                                name="lastname"
                                type="text"
                                minlength="4"
                                class="input-field<?= $model->hasError('lastname') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->lastname : ''?>"

                            />
                            <label>Last Name</label>
                            <span class="form-error"> <?= $model->getFirstError('lastname') ?></span>
                        </div>

                        <div class="input-wrap">
                            <input
                                name="email"
                                type="text"
                                class="input-field<?= $model->hasError('email') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->email : ''?>"

                            />
                            <label>Email</label>
                            <span class="form-error"> <?= $model->getFirstError('email') ?></span>
                        </div>

                        <div class="input-wrap">
                            <input
                                name="phoneno"
                                type="Phone"
                                minlength="4"
                                class="input-field<?= $model->hasError('phoneno') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->phoneno : ''?>"

                            />
                            <label>Phone Number</label>
                            <span class="form-error"> <?= str_replace('phoneno', 'Phone Number', $model->getFirstError('phoneno')) ?></span>
                        </div>

                        <div class="input-wrap">
                            <select class="input-field" name="gender">
                                <option class="input-field label" value="" disabled selected>Select your gender</option>
                                <option class="input-field" value="male">Male</option>
                                <option class="input-field" value="female">Female</option>
                                <option class="input-field" value="other">other</option>
                            </select>
                            <span class="form-error"> <?= $model->getFirstError('gender') ?></span>

                        </div>

                        <div class="input-wrap">
                            <input
                                name="password"
                                type="password"
                                minlength="4"
                                class="input-field<?= $model->hasError('password') ? ' invalid' : ''?>"
                                autocomplete="off"
                                id="password"

                            />
                            <label>Password</label>
                            <span class="form-error"> <?= $model->getFirstError('password') ?></span>
                        </div>

                        <div class="input-wrap">
                            <input
                                name="passwordConfirm"
                                type="password"
                                minlength="4"
                                class="input-field<?= $model->hasError('passwordConfirm') ? ' invalid' : ''?>"
                                autocomplete="off"
                                id="confirm_password"

                            />
                            <label>Confirm Password</label>
                            <span class="form-error"> <?= $model->getFirstError('passwordConfirm') ?></span>
                        </div>

                        <input type="submit" value="Sign Up" class="sign-btn">


                        <p class="text">
                            By signing up, I agree to the
                            <a href="#">Terms and Conditions</a> and
                            <a href="#">Privacy Policy</a>
                        </p>
                    </div>


                </form>
            </div>

            <div class="carousel">
            </div>
        </div>
    </div>
</main>