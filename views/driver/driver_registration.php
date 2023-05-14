<?php
/** @var $model Customer */

use app\models\Customer;

?>

<h1>Register</h1>

<main class="sign-up-mode">
    <div class="box-1">
        <div class="inner-box">
            <div class="forms-wrap">
                <form action="" method="post" autocomplete="off" class="sign-up-form" enctype="multipart/form-data">
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
                                name="Nic"
                                type="text"
                                minlength="10"
                                maxlength="12"
                                class="input-field<?= $model->hasError('Nic') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->Nic : ''?>"

                            />
                            <label>NIC</label>
                            <span class="form-error"><?= $model->getFirstError('Nic') ?></span>
                        </div>

                        <div class="input-wrap inline">

                            <input
                                name="driver_Fname"
                                type="text"
                                minlength="4"
                                class="input-field<?= $model->hasError('driver_Fname') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->driver_Fname : ''?>"

                            />
                            <label>Fisrt Name</label>
                            <span class="form-error"><?= $model->getFirstError('driver_Fname') ?></span>
                        </div>

                        <div class="input-wrap inline">
                            <input
                                name="driver_Lname"
                                type="text"
                                minlength="4"
                                class="input-field<?= $model->hasError('driver_Lname') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->driver_Lname : ''?>"

                            />
                            <label>Last Name</label>
                            <span class="form-error"> <?= $model->getFirstError('driver_Lname') ?></span>
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
                                name="phoneNo"
                                type="Phone"
                                minlength="4"
                                class="input-field<?= $model->hasError('phoneNo') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->phoneNo : ''?>"

                            />
                            <label>Phone Number</label>
                            <span class="form-error"> <?= str_replace('phoneno', 'Phone Number', $model->getFirstError('phoneNo')) ?></span>
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
                                name="area"
                                type="text"
                                class="input-field<?= $model->hasError('area') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->getArea() : ''?>"

                            />
                            <label>Area</label>
                            <span class="form-error"> <?= $model->getFirstError('area') ?></span>
                        </div>
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
                                name="license_No"
                                type="text"
                                minlength="4"
                                class="input-field<?= $model->hasError('license_No') ? ' invalid' : ''?>"
                                autocomplete="off"
                                id="password"

                            />
                            <label>License No</label>
                            <span class="form-error"> <?= $model->getFirstError('license_No') ?></span>
                        </div>

                        <div class="input-wrap">
                            <select class="input-field" name="category">
                                <option class="input-field label" value="" disabled selected>Select your Vehicle Type</option>
                                <option class="input-field" value="Manual">Manual</option>
                                <option class="input-field" value="Auto">Auto</option>
                            </select>
                            <span class="form-error"> <?= $model->getFirstError('category') ?></span>

                        </div>

                        <div class="input-wrap">
                            <input
                                name="license"
                                type="file"
                                class="input-field<?= $model->hasError('license_scan_copy') ? ' invalid' : ''?>"
                                autocomplete="off"
                                id="password"

                            />
                            <label>License Scan Copy</label>
                            <span class="form-error"> <?= $model->getFirstError('license_scan_copy') ?></span>
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
                            <h2>Rent a Ride: Mobility without Hassle</h2>
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
