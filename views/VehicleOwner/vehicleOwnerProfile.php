<?php
use app\core\Application;

/* @var $vehicleowner \app\models\vehicleowner */
?>
<h2 class="page-name">Profile</h2>

<!--New Profile of Vehicle Owner-->
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


                <img src="/assets/img/uploads/userProfile/<?php echo $vehicleowner->getProfilePic() ?>" id="output" width="150" />
            </div>
        </form>

        <h4></h4>
        <p>
            Vehicle owner
        </p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Info</h3>

            <div class="info_data">
                <div class="data">
                    <h6>NIC</h6>
                    <p><?php echo $vehicleowner->getNic() ?></p>
                </div>
                <div class="data">
                    <h6>First Name</h6>
                    <p><?php echo $vehicleowner->getOwnerFname() ?></p>
                </div>
                <div class="data">
                    <h6>Last Name</h6>
                    <p><?php echo $vehicleowner->getOwnerLname() ?></p>
                </div>

                <div class="data">
                    <h6>Email</h6>
                    <p><?php echo $vehicleowner->getEmail() ?></p>
                </div>
                <div class="data">
                    <h6>Phone No</h6>
                    <p><?php echo $vehicleowner->getPhoneNo() ?></p>
                </div>
                <div class="data">
                    <h6>Address</h6>
                    <p><?php echo $vehicleowner->getOwnerAddress() ?></p>
                </div>
                <div class="data">
                    <h6>Gender</h6>
                    <p><?php echo $vehicleowner->getGender() ?></p>
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
        <form method="post" class="up-profile">
            <input hidden name="vo_ID" value="<?= $vehicleowner->vo_ID?>">
            <label for="nic">NIC:</label>
            <input readonly  value="<?= $vehicleowner->getNic() ?>" type="text" id="nic" name="Nic">

            <label for="fname">First Name:</label>
            <input value="<?= $vehicleowner->getOwnerFname() ?>" type="text" id="fname" name="owner_Fname">

            <label for="lname">Last Name:</label>
            <input value="<?= $vehicleowner->getOwnerLname() ?>" type="text" id="lname" name="owner_Lname">

            <label for="email">Email:</label>
            <input disabled value="<?= $vehicleowner->getEmail() ?>" type="email" id="email" name="email">

            <label for="phone">Phone Number:</label>
            <input value="<?= $vehicleowner->getPhoneNo() ?>" type="tel" id="phone" name="phone_No">

            <label for="address">Address:</label>
            <textarea id="address" name="owner_address"><?=$vehicleowner->getOwnerAddress()?></textarea>

<!--            <label for="licenseNo">License No:</label>-->
<!--            <textarea id="address" name="license_No">--><?php //=$vehicleowner[0]["license_No"]?><!--</textarea>-->

            <div class="errors">
                <span class="form-error"></span>
            </div>

            <input type="submit" value="Save Changes">
        </form>
    </div>
</div>

