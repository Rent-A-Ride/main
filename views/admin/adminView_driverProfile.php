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
                    <!-- <span>Change Image</span> -->
                </label>

                <!-- <input id="file" type="file" onchange="loadFile(event)"/> -->


                <img src="/assets/img/user_profile/<?php echo $owner_details[0]['profile_pic']?>" id="output" width="150" />
            </div>
        </form>

        <h4></h4>
        <p>
            Driver
        </p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Info</h3>

            <div class="info_data">
                <div class="data">
                    <h6>NIC</h6>
                    <p><?php echo $owner_details[0]['Nic'] ?></p>
                </div>
                <div class="data">
                    <h6>First Name</h6>
                    <p><?php echo $owner_details[0]['driver_Fname'] ?></p>
                </div>
                <div class="data">
                    <h6>Last Name</h6>
                    <p><?php echo $owner_details[0]['driver_Lname'] ?></p>
                </div>

                <div class="data">
                    <h6>Email</h6>
                    <p><?php echo $owner_details[0]['email'] ?></p>
                </div>
                <div class="data">
                    <h6>Phone No</h6>
                    <p><?php echo $owner_details[0]['phoneNo'] ?></p>
                </div>
                <div class="data">
                    <h6>Address</h6>
                    <p><?php echo $owner_details[0]['area'] ?></p>
                </div>
                <div class="data">
                    <h6>Gender</h6>
                    <p><?php echo $owner_details[0]['gender'] ?></p>
                </div>
                <!-- <div class="data">
                    <h6>License Number</h6>
                    <p><?php echo $vehicleowner[0]["license_No"] ?></p>
                </div> -->

            </div>
            <!-- <div class="editProfileBtn">
                <button id="button28" onclick="openModal()" class="button28" role="button">Edit Profile</button>
            </div> -->
        </div>
    </div>
</div>



