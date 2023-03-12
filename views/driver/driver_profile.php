<div class="profile-container">
        <div class="profile-head-topic">
            <h2 class="topic"><center>Profile</center></h2>
        </div>

        <div class="profile-details">
            <div class="driver-img">
                <div class="driver-pic "><img  src="/assets/img/driver.jpg"></div>
                
            </div>
            <div>
          <form class="driver-list">
                        <div>
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="<?php echo $driver[0]["driver_Fname"] ?>  <?php echo $driver[0]["driver_Lname"] ?>" readonly>
                        </div>

                        <div>
                            <label for="vehicle">NIC:</label>
                            <input type="text" id="vehicle" name="vehicle" value="<?php echo $driver[0]["Nic"] ?>" readonly>
                        </div>

                        <div>
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" value="<?php echo $driver[0]["email"] ?>" readonly>        
                        </div>

                        <div>
                            <label for="phone">Area:</label>
                            <input type="text" id="phone" name="phone" value="<?php echo $driver[0]["area"] ?>" readonly>
                        </div>
                        
                        <div>
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" value="<?php echo $driver[0]["address"] ?>" readonly>
                        </div>

                        <!-- <div>
                            <label for="license">License Number:</label>
                            <input type="text" id="license" name="license" value="<?php echo $driver[0]["license_No"] ?>" readonly>
                        </div> -->

                        
                </form>
               
            </div>
            <div class="review">
                <div>
                    
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
                <!-- <img src="./review.webp"> -->
                
                <div >
                    <button class="submit-btn" onclick="openModal()" >Edit Profile</button>
                    <!-- <input type="submit" value="Edit Profile"> -->
                </div>
            </div>
        </div>
    </div>





<div id="profileModal" class="profileModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <form class="up-profile" id="edit-profile-form" action="profile_controller.php?action=edit_profile" method="post">
            <label for="nic">NIC:</label>
            <input disabled value="<?php echo $driver[0]["Nic"] ?>" type="text" id="nic" name="nic">

            <label for="fname">First Name:</label>
            <input value="<?php echo $driver[0]["driver_Fname"] ?>" type="text" id="fname" name="firstname">

            <label for="lname">Last Name:</label>
            <input value="<?php echo $driver[0]["driver_Lname"] ?>" type="text" id="lname" name="lastname">

            <label for="email">Email:</label>
            <input disabled value="<?php echo $driver[0]["email"] ?>" type="email" id="email" name="email">

            <!-- <label for="phone">Phone Number:</label>
            <input value="<?php echo $driver[0]["phone_No"] ?>" type="tel" id="phone" name="phone"> -->

            <label for="address">Address:</label>
            <textarea id="address" name="address"><?php echo $driver[0]["address"] ?></textarea>

            <input type="submit" value="Save Changes">
        </form>
    </div>
</div>


<!-- <script>
    document.getElementById("edit-button").addEventListener("click", function(){
    document.getElementById("profile-photo").style.display = "block";
  });

        const modal = document.getElementById("profileModal");

        // Get the button that opens the modal
        const btn = document.getElementById("button28");

        // Get the <span> element that closes the modal
        const span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        function openModal() {
            console.log("Hello")
            modal.style.display = "block";
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
</script> -->