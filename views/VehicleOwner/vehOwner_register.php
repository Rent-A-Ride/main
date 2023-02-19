<?php
/** @var $model \app\models\adminCustomer */
?>


<h1>Vehicle Owner Register</h1>

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
                                name="owner_Fname"
                                type="text"
                                minlength="4"
                                class="input-field<?= $model->hasError('owner_Fname') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->owner_Fname : ''?>"

                            />
                            <label>Fisrt Name</label>
                            <span class="form-error"><?= $model->getFirstError('owner_Fname') ?></span>
                        </div>

                        <div class="input-wrap">
                            <input
                                name="owner_Lname"
                                type="text"
                                minlength="4"
                                class="input-field<?= $model->hasError('owner_Lname') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->owner_Lname : ''?>"

                            />
                            <label>Last Name</label>
                            <span class="form-error"> <?= $model->getFirstError('owner_Lname') ?></span>
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
                                name="Owner_Nic"
                                type="text"
                                class="input-field<?= $model->hasError('Owner_Nic') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->Owner_Nic : ''?>"

                            />
                            <label>Nic</label>
                            <span class="form-error"> <?= $model->getFirstError('Owner_Nic') ?></span>
                        </div>

                        <div class="input-wrap">
                            <input
                                name="phone_No"
                                type="Phone"
                                minlength="4"
                                class="input-field<?= $model->hasError('phone_No') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->phone_No : ''?>"

                            />
                            <label>Phone Number</label>
                            <span class="form-error"> <?= str_replace('phone_No', 'Phone Number', $model->getFirstError('phone_No')) ?></span>
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
                                name="owner_address"
                                type="text"
                                class="input-field<?= $model->hasError('owner_address') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->owner_address : ''?>"

                            />
                            <label>Address</label>
                            <span class="form-error"> <?= $model->getFirstError('owner_address') ?></span>
                        </div>
                        <div class="input-wrap">
                            <select class="input-field" name="owner_area">
                                <option class="input-field label" value="" disabled selected>Select your District</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambatota">Hambatota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kaluthara">Kaluthara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Moneragala">Moneragala</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalama">Puttalama</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavuniya" >Vavuniya</option>
                        </select>
                         
                            <span class="form-error"> <?= $model->getFirstError('owner_area') ?></span>

                        </div>
                        <div class="input-wrap">
                            <input
                                name="license_No"
                                type="text"
                                class="input-field<?= $model->hasError('license_No') ? ' invalid' : ''?>"
                                autocomplete="off"
                                value="<?= $model->thereIsError() ? $model->license_No : ''?>"

                            />
                            <label>Nic</label>
                            <span class="form-error"> <?= $model->getFirstError('license_No') ?></span>
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