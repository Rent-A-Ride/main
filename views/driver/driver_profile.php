<div class="container">
        <div class="head-topic">
            <h2 class="topic"><center>Profile</center></h2>
        </div>

        <div class="profile-details">
            <div class="driver-img">
                <div class="driver-pic "><img  src="/assets/img/driver.jpg"></div>
                
            </div>
            <div class="driver-list">
                <ul>
                    <li>Name:       Sujith Silva</li>
                    <li>Email:      sujith@gmail.com</li>
                    <li>Location:       Slave Island, Colombo2</li>
                    <li>Phone No:       0780000000</li>
                    <li>NIC:        892566455V</li>
                    <li>License Number:     B4607086</li>
                </ul>
            </div>
            <div class="review">
                <div>Customer Reviews</div>
                <!-- <img src="./review.webp"> -->
                <div class="star-rating">
                    <i class="bx bx-star"></i>
                    <i class="bx bx-star"></i>
                    <i class="bx bx-star"></i>
                    <i class="bx bx-star"></i>
                    <i class="bx bx-star"></i>
                </div>
                <div >
                    <button class="submit-btn" onclick="location.href='/driver/editprofile'">Edit Profile</button>
                    <!-- <input type="submit" value="Edit Profile"> -->
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById("edit-button").addEventListener("click", function(){
    document.getElementById("profile-photo").style.display = "block";
  });
</script>