<div class="container">
        <div class="head-topic">
            <h2 class="topic"><center>Profile</center></h2>
        </div>

        <div class="profile-details">
            <div class="driver-img">
                <div class="driver-pic "><img  src="./driver.png"></div>

                <div class="edit-pic">
                    <input type="file" id="profile-photo" accept="image/*">
                    <button id="edit-button">Edit</button>
                    
                </div>
                
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
                <a href="#">Customer Reviews</a>
                <img src="./review.webp">
                <div class="submit-btn">
                    <input type="submit" value="Edit Profile">
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById("edit-button").addEventListener("click", function(){
    document.getElementById("profile-photo").style.display = "block";
  });
</script>