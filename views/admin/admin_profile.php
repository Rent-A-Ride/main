<?php
/** @var $model Customer */

use app\models\Customer;
use app\core\Application;

?>
<h2 class="page-name">Admin Profile</h2>



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


                <img src="assets/img/uploads/userProfile/<?php echo $owner_details[0]['profile_pic']?>" id="output" width="150" />
            </div>
        </form>

        <h4><?php echo($owner_details[0]['first_Name']." ".$owner_details[0]['last_Name']) ?></h4>
        <p>
            Admin
        </p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Info</h3>

            <div class="info_data">
                <div class="data">
                    <h6>NIC</h6>
                    <p><?php echo($owner_details[0]['Nic']) ?></p>
                </div>
                <div class="data">
                    <h6>First Name</h6>
                    <p><?php echo($owner_details[0]['first_Name'])?></p>
                </div>
                <div class="data">
                    <h6>Last Name</h6>
                    <p><?php echo($owner_details[0]['last_Name'])?></p>
                </div>

                <div class="data">
                    <h6>Email</h6>
                    <p><?php echo($owner_details[0]['email'])  ?></p>
                </div>
                <div class="data">
                    <h6>Phone No</h6>
                    <p><?php echo($owner_details[0]['phone_No'])  ?></p>
                </div>
                <div class="data">
                    <h6>Address</h6>
                    <p><?php echo($owner_details[0]['Owner_area'])  ?></p>
                </div>
<!--                <div class="data">-->
<!--                    <h6>License Number</h6>-->
<!--                    <p>--><?php //echo(" ".$owner_details[0]['license_No'])  ?><!--</p>-->
<!--                </div>-->

            </div>
            <div class="editProfileBtn">
                <button id="button28"  data-area="<?php echo($owner_details[0]['Owner_area'])  ?>" data-phoneno="<?php echo($owner_details[0]['phone_No'])  ?>" data-nic="<?php echo($owner_details[0]['Nic']) ?>" data-firstname="<?php echo($owner_details[0]['first_Name'])?>" data-lastname="<?php echo($owner_details[0]['last_Name'])?>" data-email="<?php echo($owner_details[0]['email'])  ?>" data-licenseno="<?php echo(" ".$owner_details[0]['license_No'])  ?>" data-userid="<?php echo($owner_details[0]['user_ID'])  ?>" class="button28" role="button">Edit Profile</button>
            </div>
        </div>
    </div>
</div>



<script>

const loadFile = function (event) {
    const image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);
    const form=new FormData();
    form.append('image',event.target.files[0]);
    fetch('/adminprofile_pic', {
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

