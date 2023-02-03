
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<div class="ownerVehicleowner_body">

<div>
     <div class="ownervehicleownerdsearchform">
        <div class="ownervehicleownerdsearchform1">
            <form action="" method="">
                <input type="search" class="VehicleownerSearch">
                <input type="submit" class="VehicleownerSearchbtn" value="Search">
            </form>
        </div>

        <!-- <div class="ownervehicleownerdsearchform1">
            <form>
                <select >
                    <option value="Ampara">Ampara</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Badulla">Badulla</option>
                    <option value="Batticaloa">Batticaloa</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Galle">Galle</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Hambatota">Hambatota</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Kaluthara">Kaluthara</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Kegalle">Kegalle</option>
                    <option value="Kilinochchi">Kilinochchi</option>
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Mannar">Mannar</option>
                    <option value="Matale">Matale</option>
                    <option value="Matara">Matara</option>
                    <option value="Moneragala">Moneragala</option>
                    <option value="Mullaitivu">Mullaitivu</option>
                    <option value="Nuwara Eliya">Nuwara Eliya</option>
                    <option value="Polonnaruwa">Polonnaruwa</option>
                    <option value="Puttalama">Puttalama</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Trincomalee">Trincomalee</option>
                    <option value="Vavuniya" >Vavuniya</option>
                </select>
                <input type="submit" class="VehicleownerSearchbtn VehicleownerSearchbtn2" value="Location">

            </form>
            

        </div> -->

        <!-- <div class="form-input-addvehicleowner"><a href="" class="add-vehicleowner"><i class="fa-solid fa-plus"></i>ADD NEW</a></div> -->
        
     </div>


    <div>
        <div class="Vehicleownerdetails_1">
            <div class="adminvehicleOwner_img">
                
            </div>
            <div class="adminvehicleOwner_name_1">
                <p>Name:</p>
            </div>
            <div class="adminvehicleOwner_location_1">
                <p>Location:</p>
            </div>
            <div class="adminvehicleOwner_Novehicles_1">
                <p>Nic:</p>
            </div>
            <div class="adminvehicleowner_btn">
                
            </div> 
        </div>
    <?php if ($vehicleowner){
                foreach ($vehicleowner as $row){ ?>
         <div class="Vehicleownerdetails">
            <div class="adminvehicleOwner_img">
                <img class="adminvehicleowner_img" src="/assests/img/user_profile/<?php echo $row['profile_img']?>" alt="" >
            </div>
            <div class="adminvehicleOwner_name">
                <?php echo ($row["owner_Fname"]." ".$row["owner_Lname"]); ?>
            </div>
            <div class="adminvehicleOwner_location">
                <?php echo ($row["owner_area"]); ?>
            </div>
            <div class="adminvehicleOwner_Novehicles">
                <?php echo ($row["Owner_Nic"]); ?>
            </div>
            <div class="adminvehicleowner_btn">
                <?php $user_id=$row["user_ID"];   ?>
                <div>
                    <button class="admin_vehicleOwnerView" onclick="location.href='/adminViewVehicleOwner?id=<?php echo $user_id; ?>'" ><i class="fa-regular fa-eye"></i>view</button>
                </div>
                <div>
                    <button class="admin_acceptvowner"><i class="fa-solid fa-check"></i></button>
                </div>
                <div>
                    <button class="admin_deletevowner"><i class="fa-solid fa-xmark"></i></button>
                </div>
                
            </div> 
              
         </div>
         <?php 
            }
        } ?>
    </div>

     
</div>



</div>