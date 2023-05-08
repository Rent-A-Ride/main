<?php
/** @var $model Customer */

use app\models\Customer;
use app\core\Application;

?>
<h2 class="page-name">Customer Profile</h2>



<div class="profile-wrapper">
    <div class="left">
        <!--        <img src="assets/img/profile.png"-->
        <!--             alt="user" width="100">-->

        <!-- New profile pic -->
        <form method="post" enctype="multipart/form-data">
            <div class="profile-pic">
                <label class="-label" for="file">
                    <span class="glyphicon glyphicon-camera"><i class='bx bxs-camera'></i></span>
                    <span>Change Image</span>
                </label>

                <input id="file" type="file" onchange="loadFile(event)"/>


                <img src="/assets/img/uploads/userProfile/<?= Application::$app->user->userProfile('profile_pic')?>" id="output" width="150" />
            </div>
        </form>

        <h4><?= $model->firstname.' '.$model->lastname ?></h4>
        <p>
            Customer
        </p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Info</h3>

            <div class="info_data">
                <div class="data">
                    <h6>NIC</h6>
                    <p><?= Application::$app->user->userprofile('nic')?></p>
                </div>
                <div class="data">
                    <h6>First Name</h6>
                    <p><?= Application::$app->user->userprofile('firstname')?></p>
                </div>
                <div class="data">
                    <h6>Last Name</h6>
                    <p><?= Application::$app->user->userprofile('lastname')?></p>
                </div>

                <div class="data">
                    <h6>Email</h6>
                    <p><?= Application::$app->user->userprofile('email')?></p>
                </div>
                <div class="data">
                    <h6>Phone No</h6>
                    <p><?= Application::$app->user->userprofile('phoneno')?></p>
                </div>
                <div class="data">
                    <h6>Address</h6>
                    <p><?=$model->address?></p>
                </div>
                <div class="data">
                    <h6>License Number</h6>
                    <p>-</p>
                </div>

            </div>
            <div class="editProfileBtn">
                <button id="button28" onclick="openModal()" class="button28" role="button">Edit Profile</button>
            </div>
        </div>
    </div>
</div>

<div id="profileModal" class="profileModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <form action="" method="post" class="up-profile">
            <label for="nic">NIC:</label>
            <input disabled value="<?= $model->nic ?>" type="text" id="nic" name="nic">

            <label for="fname">First Name:</label>
            <input value="<?= $model->firstname ?>" type="text" id="fname" name="firstname">

            <label for="lname">Last Name:</label>
            <input value="<?= $model->lastname ?>" type="text" id="lname" name="lastname">

            <label for="email">Email:</label>
            <input disabled value="<?= $model->email ?>" type="email" id="email" name="email">

            <label for="phone">Phone Number:</label>
            <input value="<?= $model->phoneno ?>" type="tel" id="phone" name="phoneno">

            <label for="address">Address:</label>
            <textarea id="address" name="address"><?=$model->address?></textarea>

            <div class="errors">
                <span class="form-error"></span>
            </div>

            <input type="submit" value="Save Changes">
        </form>
    </div>
</div>

