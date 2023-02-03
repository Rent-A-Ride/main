

<h1>Register</h1>

<div class="wrapper">
    <div class="registration_form">
        <!-- Title-->
        <div class="title">
            Create an account
        </div>
<!--        Form-->
        <form action="" method="post">
            <div class="form_wrap">
                <div class="input_grp">
<!--                    <!–- Frist name input Place -–>-->
                    <div class="input_wrap">
                        <label for="fistname">First Name</label>
                        <input type="text" name="firstname" value="<?= $model->hasError('password') ? $model->firstname : ''?>" class="<?= $model->hasError('firstname') ? ' invalid' : ''?>">

                        <div class="form-errors">
                            *<?= $model->getFirstError('firstname') ?>
                        </div>
                    </div>
<!--                    <!– Last Name input place –>-->
                    <div class="input_wrap">
                        <label for="lastname">Last Name</label>
                        <input type="text" id="lname" name="lastname">
                    </div>
                </div>
<!--                Email Id input Place-->
                <div class="input_wrap">
                    <label for="email">Email Address</label>
                    <input type="text" id="email" name="email">
                </div>

                <!--                Phone no input Place-->
                <div class="input_wrap">
                    <label for="phoneno">Phone no</label>
                    <input type="text" id="phoneno" name="phoneno">
                </div>

                <!-- Gender -->
                <div class="input_wrap">
                    <label id="gender">gender</label>
                    <select id="dropdown" name="gender" required>
                        <option disabled selected value>
                            Select your gender
                        </option>
                        <option value="female">
                            Female
                        </option>
                        <option value="male">
                            Male
                        </option>
                    </select>
                </div>

                <div class="input_wrap">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>

                <div class="input_wrap">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="passwordConfirm" name="passwordConfirm">
                </div>
                <!– Submit button –>
                <div class="input_wrap">
                    <input type="submit" value= "Register Now" class="submit_btn">
                </div>
            </div>
        </form>
    </div>
</div>
