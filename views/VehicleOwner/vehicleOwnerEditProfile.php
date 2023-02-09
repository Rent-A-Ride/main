<?php
?>

<div class="wrapper-container">
    <div  class="wrapper_1">
    
        <form action="" method="post"  class="form">
            <h2>Edit Profile</h2><br>

            <div class="inputBox">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>

            <div class="inputBox">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>

            <div class="inputBox">
                <label for="nic">NIC:</label>
                <input type="text" id="nic" name="nic" required>
            </div>

            <!-- <div class="inputBox">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            -->
            <div class="inputBox">
                <label for="phoneno">Phone No:</label>
                <input type="text" id="phoneno" name="phoneno" required>
            </div>

            <div class="inputBox">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>

            <div class="inputBox">
                <label for="city">City/Town:</label>
                <input type="text" id="city" name="city" required>
            </div>

            <div class="inputBox">
                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="gender" required>
            </div>

            <div class="inputBox">
                <label for="lisenceno">License No:</label>
                <input type="text" id="lisenceno" name="lisenceno" required>
            </div>
            <br>

            <div>
                <button type="submit" class="btn">Save Changes</button>
            </div>
        </form>
    </div>

    <div  class="wrapper_2">
        <form action="" method="post"  class="form">
            <h2>Change Password</h2>
            <br>
            <br>
            <div class="inputBox">
                <label for="CPassword">Current Password:</label>
                <input type="password" id="CPassword" name="CPassword" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="NPassword">New Password:</label>
                <input type="password" id="NPassword" name="NPassword" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="ConPassword">Confirm Password:</label>
                <input type="password" id="ConPassword" name="ConPassword" required>
            </div>
            <br>
            <div>
                <button type="submit" class="btn">Save Changes</button>
            </div>
        </form>
    </div>
</div>