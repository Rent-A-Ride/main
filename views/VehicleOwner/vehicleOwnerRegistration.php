

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
                                    name="Nic"
                                    type="text"
                                    minlength="10"
                                    maxlength="12"
                                    class="input-field<?= $model->hasError('NIC') ? ' invalid' : ''?>"
                                    autocomplete="off"
                                    value="<?= $model->thereIsError() ? $model->NIC: ''?>"
                            />
                            <label>NIC</label>
                            <span class="form-error"><?= $model->getFirstError('NIC') ?></span>
                        </div>

                        <div class="input-wrap">

                            <input
                                    name="owner_Fname"
                                    type="text"
                                    minlength="4"
                                    class="input-field<?= $model->hasError('First_Name') ? ' invalid' : ''?>"
                                    autocomplete="off"
                                    value="<?= $model->thereIsError() ? $model->First_Name : ''?>"

                            />
                            <label>First Name</label>
                            <span class="form-error"><?= $model->getFirstError('First_Name') ?></span>
                        </div>

                        <div class="input-wrap">
                            <input
                                    name="owner_Lname"
                                    type="text"
                                    minlength="4"
                                    class="input-field<?= $model->hasError('Last_Name') ? ' invalid' : ''?>"
                                    autocomplete="off"
                                    value="<?= $model->thereIsError() ? $model->Last_Name : ''?>"

                            />
                            <label>Last Name</label>
                            <span class="form-error"> <?= $model->getFirstError('Last_Name') ?></span>
                        </div>

                        <div class="input-wrap">
                            <input
                                    name="email"
                                    type="email"
                                    class="input-field<?= $model->hasError('Email') ? ' invalid' : ''?>"
                                    autocomplete="off"
                                    value="<?= $model->thereIsError() ? $model->Email : ''?>"

                            />
                            <label>Email</label>
                            <span class="form-error"> <?= $model->getFirstError('Email') ?></span>
                        </div>

                        <div class="input-wrap">
                            <input
                                    name="phone_No"
                                    type="Phone"
                                    minlength="4"
                                    class="input-field<?= $model->hasError('Phone_No') ? ' invalid' : ''?>"
                                    autocomplete="off"
                                    value="<?= $model->thereIsError() ? $model->Phone_No : ''?>"

                            />
                            <label>Phone Number</label>
                            <span class="form-error"> <?= str_replace('phoneno', 'Phone Number', $model->getFirstError('Phone_No')) ?></span>
                        </div>

                        <div class="input-wrap">
                            <select class="input-field" name="gender">
                                <option class="input-field label" value="" disabled selected>Select your gender</option>
                                <option class="input-field" value="male">Male</option>
                                <option class="input-field" value="female">Female</option>
                                <option class="input-field" value="other">other</option>
                            </select>
                            <span class="form-error"> <?= $model->getFirstError('Gender') ?></span>

                        </div>

                        <div class="input-wrap">
                            <input
                                    name="owner_address"
                                    type="text"
                                    class="input-field<?= $model->hasError('Address') ? ' invalid' : ''?>"
                                    autocomplete="off"
                                    value=""

                            />
                            <label>Address</label>
                            <span class="form-error"> <?= $model->getFirstError('Address') ?></span>
                        </div>



                        <div class="input-wrap">
                            <input
                                    name="password"
                                    type="password"
                                    minlength="4"
                                    class="input-field<?= $model->hasError('Password') ? ' invalid' : ''?>"
                                    autocomplete="off"
                                    id="password"

                            />
                            <label>Password</label>
                            <span class="form-error"> <?= $model->getFirstError('Password') ?></span>
                        </div>

                        <div class="input-wrap">
                            <input
                                    name="passwordConfirm"
                                    type="password"
                                    minlength="4"
                                    class="input-field<?= $model->hasError('Confirm_Password') ? ' invalid' : ''?>"
                                    autocomplete="off"
                                    id="confirm_password"

                            />
                            <label>Confirm Password</label>
                            <span class="form-error"> <?= $model->getFirstError('Confirm_Password') ?></span>
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
