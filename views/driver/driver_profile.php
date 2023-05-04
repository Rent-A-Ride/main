<?php
/** @var $model Customer */

use app\models\Customer;
use app\core\Application;

?>
<h2 class="page-name">Driver Profile</h2>



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

        <h4><?php echo($driver[0]["driver_Fname"]." ".$driver[0]["driver_Lname"]) ?></h4>
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
                    <p><?php echo($driver[0]["Nic"]) ?></p>
                </div>
                <div class="data">
                    <h6>First Name</h6>
                    <p><?php echo($driver[0]["driver_Fname"])?></p>
                </div>
                <div class="data">
                    <h6>Last Name</h6>
                    <p><?php echo($driver[0]["driver_Lname"])?></p>
                </div>

                <div class="data">
                    <h6>Email</h6>
                    <p><?php echo($driver[0]["email"])  ?></p>
                </div>
                <div class="data">
                    <h6>Phone No</h6>
                    <p><?php echo($driver[0]['phoneNo'])  ?></p>
                </div>
                <div class="data">
                    <h6>Address</h6>
                    <p><?php echo($driver[0]["area"])  ?></p>
                </div>
                <!-- <div class="data">
                    <h6>License Number</h6>
                    <p><?php echo(" ".$owner_details[0]['license_No'])  ?></p>
                </div> -->
			<div>Customer Reviews</div>

                        <div class="star-rating">
                            <?php
                                $stars=floor($reviews);
                                $remainder=$reviews * 100 - $stars*100;
                                for($i=0;$i<$stars;$i++):
                            ?>
                            <!-- <i class="fa-regular fa-star"></i> -->
                            <img class="strs-rev" src ='/assets/img/driver/fullStar.png'>
                            <?php
                            endfor;
                            if($remainder===50):
                                echo ("<img src ='/assets/img/driver/halfStar.png' >");
                            endif;

                            echo($stars. "." .$remainder);
                            
                            ?>
                        </div>

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
        <form class="up-profile" id="edit-profile-form" action="/driver/driver_profile" method="post">
            <label for="nic">NIC:</label>
            <input disabled value="<?php echo $driver[0]["Nic"] ?>" type="text" id="nic" name="nic">

            <label for="fname">First Name:</label>
            <input value="<?php echo $driver[0]["driver_Fname"] ?>" type="text" id="fname" name="firstname">

            <label for="lname">Last Name:</label>
            <input value="<?php echo $driver[0]["driver_Lname"] ?>" type="text" id="lname" name="lastname">

            <label for="email">Email:</label>
            <input disabled value="<?php echo $driver[0]["email"] ?>" type="email" id="email" name="email">

            <label for="phoneNo">Phone Number:</label>
            <input value="<?php echo $driver[0]["phoneNo"] ?>" type="tel" id="phone" name="phoneNo">

            <label for="area">Area:</label>
            <input value="<?php echo $driver[0]["area"] ?>" type="text" id="fname" name="area">

            <label for="address">Address:</label>
            <textarea id="address" name="address"><?php echo $driver[0]["address"] ?></textarea>

            <input type="submit" value="Save Changes">
        </form>
    </div>
</div>



<script>

const loadFile = function (event) {
    const image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);
    const form=new FormData();
    form.append('image',event.target.files[0]);
    fetch('/upload', {
        method: 'POST',
        body: form
    }).then(res => res.json())
        .then(res => {
            if (res.status){
                alert("Image uploaded successfully");
            }
        });

    console.log(image.src);
};

// Get the modal
const modal = document.getElementById("profileModal");

// Get the button that opens the modal
const btn = document.getElementById("button28");

// Get the <span> element that closes the modal
const span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal() {
    if (modal !== null) {
        modal.style.display = "block";
    } else {
        console.log("Error: modal element not found");
    }
}

// When the user clicks on <span> (x), close the modal
function closeModal() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

