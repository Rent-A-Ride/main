<?php
/** @var $model Customer */

use app\models\Customer;

?>


<main class="sign-up-mode">
    <div class="box-1">
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
                                name="nic"
                                type="text"
                                minlength="10"
                                maxlength="12"
                                class="input-field<?= $model->hasError('firstname') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->nic : ''?>"

                            />
                            <label>NIC</label>
                            <span class="form-error"><?= $model->getFirstError('nic') ?></span>
                        </div>

                        <div class="input-wrap inline">

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

                        <div class="input-wrap inline">
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

<!--                        <div class="input-wrap">-->
<!--                            <select class="input-field" name="gender">-->
<!--                                <option class="input-field label" value="" disabled selected>Select your gender</option>-->
<!--                                <option class="input-field" value="male">Male</option>-->
<!--                                <option class="input-field" value="female">Female</option>-->
<!--                                <option class="input-field" value="other">other</option>-->
<!--                            </select>-->
<!--                            <span class="form-error"> --><?php //= $model->getFirstError('gender') ?><!--</span>-->
<!---->
<!--                        </div>-->

                        <div class="input-wrap">
                            <input
                                name="address"
                                type="text"
                                class="input-field<?= $model->hasError('address') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->getAddress() : ''?>"

                            />
                            <label>Address</label>
                            <span class="form-error"> <?= $model->getFirstError('address') ?></span>
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
                <div class="images-wrapper">
                    <img src="/assets/img/carousel/image1.png" class="image img-1 show" alt="" />
                    <img src="/assets/img/carousel/image2.png" class="image img-2" alt="" />
                    <img src="/assets/img/carousel/image3.png" class="image img-3" alt="" />
                </div>

                <div class="text-slider">
                    <div class="text-wrap">
                        <div class="text-group">
                            <h2>Why buy when you can rent?</h2>
                            <h2>Experience the freedom of the road</h2>
                            <h2>Rent a Ride: Mobility without Hassel</h2>
                        </div>
                    </div>

                    <div class="bullets">
                        <span class="active" data-value="1"></span>
                        <span data-value="2"></span>
                        <span data-value="3"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
