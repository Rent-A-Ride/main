<?php
/** @var $model Customer */

use app\models\Customer;

?>
<main class="">
    <div class="box">
        <div class="inner-box">
            <div class="forms-wrap">
                <form action="" method="post" autocomplete="off" class="sign-in-form">
                    <div class="logo">
                        <img src="assets/img/logo.png" alt="Logo">
                        <p>Mobility without Hassle</p>
                    </div>

                    <div class="heading">
                        <h2>Welcome Back!</h2>
                        <h6>Not registered yet?</h6>
                        <a href="#" class="toggle">Sign up</a>
                    </div>

                    <div class="actual-form">
                        <div class="input-wrap">
                            <input
                                name="email"
                                type="email"
                                minlength="4"
                                class="input-field<?= $model->hasError('email') ? ' invalid' : ''?>"
                                value="<?= $model->thereIsError() ? $model->email : ''?>"
                                autocomplete="off"

                            />
                            <label>Email</label>
                            <span class="form-error"> <?= $model->getFirstError('email') ?></span>

                        </div>

                        <div class="input-wrap">
                            <input
                                name="password"
                                type="password"
                                minlength="4"
                                class="input-field<?= $model->hasError('password') ? ' invalid' : ''?>"
                                value="<?= $model->thereIsError() ? $model->password : ''?>"
                                autocomplete="off"

                            />
                            <label>Password</label>
                            <span class="form-error"> <?= $model->getFirstError('password') ?></span>
                        </div>

                        <input type="submit" value="Sign In" class="sign-btn">

                        <p class="text">
                            Forgotten your password or you login details?
                            <br>
                            <a href="#">Get help</a> signing in.
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

