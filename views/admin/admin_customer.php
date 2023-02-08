
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

        <div class="ownervehicleownerdsearchform1">
            <form>
                <select >
                    <option value="all">All</option>
                    <option value="foreign">Foreign</option>
                    <option value="local">Local</option>
                    <!-- <option value="Batticaloa">Batticaloa</option>
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
                    <option value="Vavuniya" >Vavuniya</option> -->
                </select>
                <input type="submit" class="VehicleownerSearchbtn VehicleownerSearchbtn2" value="Location">

            </form>
            

        </div>

        <!-- <div class="form-input-addvehicleowner"><a href="" class="add-vehicleowner"><i class="fa-solid fa-plus"></i>ADD NEW</a></div> -->
        
     </div>


    <div>
        <div class="Driverdetails_1">
            <div class="admindriver_img">
                
            </div>
            <div class="admindriver_name_1">
                <p>Name:</p>
            </div>
            <div class="admindriver_location_1">
                <p>Email:</p>
            </div>
            <div class="adminvehicleOwner_Novehicles_1">
                <p>Customer Type:</p>
            </div>
            <div class="admindriver_btn">
                
            </div> 
        </div>
    <?php if ($adminCustomer){
                foreach ($adminCustomer as $row){ ?>
         <div class="Driverdetails">
            <div class="admindriver_img">
                <img class="adminDriver_img" src="/assets/img/user_profile/<?php echo $row['profile_img']?>" alt="" >
            </div>
            <div class="admindriver_name">
                <?php echo ($row["cus_Fname"]." ".$row["cus_Lname"]); ?>
            </div>
            <div class="admindriver_location">
                <?php echo ($row["cus_email"]); ?>
            </div>
            <div class="admindriver_Novehicles">
                <?php echo ($row["cus_Type"]); ?>
            </div>
            <div class="admindriver_btn">
                <div>
                    <button class="admin_driverView"><i class="fa-regular fa-eye"></i>view</button>
                </div>
                <div>
                    <button class="admin_driverView"><i class="fa-solid fa-trash-can"></i>Delete</button>
                </div>
                
            </div> 
              
         </div>
         <?php 
            }
        } ?>
    </div>

     
</div>



</div>