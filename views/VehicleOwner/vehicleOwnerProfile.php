<?php
// dump a value with <pre> tags
?>
<h2 class="page-name">Profile</h2>

<!--<div class="profile-container">-->
<!---->
<!--    <div class="profile-b">-->
<!--        <div class="EDIT-BUTTONS">-->
<!--            <button class="edit-pro-button" onclick="location.href='/vehicleOwner/editProfile'">Edit Profile</button>-->
<!--        </div>-->
<!---->
<!--        <div class="user-data">-->
<!--            <ul>-->
<!--                <li><span>Name:</span>--><?php //echo $vehicleowner[0]["owner_Fname"] ?><!-- --><?php //echo $vehicleowner[0]["owner_Lname"] ?><!--</li><br>-->
<!--                <li><span>Email:</span><span> --><?php //echo $vehicleowner[0]["email"] ?><!-- </span></li><br>-->
<!--                <li><span>Location:</span><span> --><?php //echo $vehicleowner[0]["owner_area"] ?><!-- </span></li><br>-->
<!--                <li><span>Phone No:</span><span>  --><?php //echo $vehicleowner[0]["phone_No"] ?><!-- </span></span></li><br>-->
<!--                <li><span>NIC:</span><span>  --><?php //echo $vehicleowner[0]["Owner_Nic"] ?><!-- </span></span></li><br>-->
<!--                <li><span>License No:</span><span>  --><?php //echo $vehicleowner[0]["license_No"] ?><!-- </span></span></li><br>-->
<!---->
<!--            </ul>-->
<!---->
<!---->
<!---->
<!--        </div>-->
<!---->
<!--        <div class="gallery">-->
<!--            <div class="content">-->
<!--                <h3 class="box-text">View own vehicles</h3>-->
<!--                <img class="pro-moto" src="/assets/img/vehicle_owner/motorcycle.png">-->
<!---->
<!--            </div>-->
<!---->
<!--            <div class="content">-->
<!--                <h3 class="box-text">Calendar</h3>-->
<!--                <img class="pro-cal" src="/assets/img/vehicle_owner//calendar.png">-->
<!--            </div>-->
<!---->
<!--            <div class="content">-->
<!--                <h3 class="box-text">Payments</h3>-->
<!--                <img class="pro-pay" src="/assets/img/vehicle_owner/credit-card.png">-->
<!--            </div>-->
<!---->
<!--            <div class="content">-->
<!--                <h3 class="box-text">Reviews</h3>-->
<!--                <img class="pro-review" src="/assets/img/vehicle_owner/feedback.png">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->


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
                    <p><?php echo $vehicleowner[0]["Owner_Nic"] ?></p>
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
                    <p><?php echo $vehicleowner[0]["owner_area"] ?></p>
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
