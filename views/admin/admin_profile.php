


<div class="admin_p_body">
<div class="admin_profile_body">

    <div class="profile_content">
        <div class="profile_img">
            <img src="/assets/img/user_profile/<?php echo $owner_details[0]['profile_img']?>" alt="" class="profile_img_img">
        </div>
        <div class="profile_details">
            <div class="details_heading"> 
                <p><b>Name:</b></p>
                <p><b>Email:</b></p>
                <p><b>Location:</b></p>
                <p><b>Phone No:</b></p>
                <p><b>Nic:</b></p>
                <p><b>License No:</b></p> 

            </div>
            <div class="details_values">

                <p> <?php echo(" ".$owner_details[0]['first_Name']." ".$owner_details[0]['last_Name']) ?></p>
                <p><?php echo(" ".$owner_details[0]['email'])  ?></p>
                <p><?php echo(" ".$owner_details[0]['Owner_area'])  ?></p>
                <p><?php echo(" ".$owner_details[0]['Phone_No'])  ?></p>
                <p><?php echo(" ".$owner_details[0]['NIC']) ?></p>
                <p><?php echo(" ".$owner_details[0]['email'])  ?></p>
            </div>

        </div>
        <div class="edit_profile">
            <button class="edit_profile_btn">Edit Profile</button>
        </div>
    
    </div>

</div>
</div>