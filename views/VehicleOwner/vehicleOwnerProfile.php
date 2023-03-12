<?php
use app\core\Application;

/* @var $vehicleowner \app\models\vehicle_Owner */
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


                <img src="/assets/img/driver.jpg" id="output" width="150" />
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
                    <p><?php echo $vehicleowner[0]["Nic"] ?></p>
                </div>
                <div class="data">
                    <h6>First Name</h6>
                    <p><?php echo $vehicleowner[0]["owner_Fname"] ?></p>
                </div>
                <div class="data">
                    <h6>Last Name</h6>
                    <p><?php echo $vehicleowner[0]["owner_Lname"] ?></p>
                </div>

                <div class="data">
                    <h6>Email</h6>
                    <p><?php echo $vehicleowner[0]["email"] ?></p>
                </div>
                <div class="data">
                    <h6>Phone No</h6>
                    <p><?php echo $vehicleowner[0]["phone_No"] ?></p>
                </div>
                <div class="data">
                    <h6>Address</h6>
                    <p><?php echo $vehicleowner[0]["owner_address"] ?></p>
                </div>
                <div class="data">
                    <h6>Gender</h6>
                    <p><?php echo $vehicleowner[0]['gender'] ?></p>
                </div>
                <div class="data">
                    <h6>License Number</h6>
                    <p><?php echo $vehicleowner[0]["license_No"] ?></p>
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
            <label for="nic">NIC:</label>
            <input disabled value="<?= $vehicleowner[0]["Nic"] ?>" type="text" id="nic" name="Owner_Nic">

            <label for="fname">First Name:</label>
            <input value="<?= $vehicleowner[0]["owner_Fname"] ?>" type="text" id="fname" name="owner_Fname">

            <label for="lname">Last Name:</label>
            <input value="<?= $vehicleowner[0]["owner_Lname"] ?>" type="text" id="lname" name="owner_Lname">

            <label for="email">Email:</label>
            <input disabled value="<?= $vehicleowner[0]["email"] ?>" type="email" id="email" name="email">

            <label for="phone">Phone Number:</label>
            <input value="<?= $vehicleowner[0]["phone_No"] ?>" type="tel" id="phone" name="phone_No">

            <label for="address">Address:</label>
            <textarea id="address" name="owner_address"><?=$vehicleowner[0]["owner_address"]?></textarea>

            <label for="licenseNo">License No:</label>
            <textarea id="address" name="license_No"><?=$vehicleowner[0]["license_No"]?></textarea>

            <div class="errors">
                <span class="form-error"></span>
            </div>

            <input type="submit" value="Save Changes">
        </form>
    </div>
</div>

