<?php
/*  @var $row \app\models\cusVehicle*/
?>

<!-- SEARCH -->
<div class="search">
    <label class="label-l" for="search"><i class='bx bx-search'></i>Search </label>
    <input type="search" id="search" placeholder="Type to search">
    <!-- <div class="location-select">
        <select id="location" name="location">
            <option value="" disabled selected hidden>location</option>
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
    </div> -->
    
    <div class="date-select">

        <button onclick="location.href='/adminadd_vowner'" class="book-button1"><i class="fa-solid fa-plus"></i></button>
        
    </div>
    
</div>

<!-- Table -->

<div class="table-container">
    <div id="table" class="table">
        <div class="table-header">
            <div class="header__item"><a id="name" class="filter__link" href="#"></a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Name</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Location</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Contact No</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">No.Of Vehicles</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
        </div>
        <div class="table-content" >
            <?php
            foreach ($vehicleowner as $row):
                ?>
                <div class="table-row <?=$row['vo_ID']?>">
                    <?php $user_id=$row["vo_ID"];   ?>
                    <div class="table-data"><img src="/assets/img/user_profile/<?php echo $row['profile_pic']?>" width="56px"></div>
                    <div class="table-data"></div>
                    <div class="table-data"><?php echo ($row["owner_Fname"]." ".$row["owner_Lname"]); ?></div>
                    <div class="table-data"></div>
                    <div class="table-data"><?php echo ($row["owner_area"]); ?></div>
                    <div class="table-data"></div>
                    <div class="table-data"><?php echo ($row["phone_No"]); ?></div>
                    <div class="table-data"></div>
                    <div class="table-data">5</div>
                    <div class="table-data"></div>
                    <div class="table-data"><button onclick="location.href='/adminViewVehicleOwner?id=<?php echo $user_id; ?>'" class="book-button"><i class="fa-regular fa-eye"></i></button></div>
                    
			        <div class="table-data"><button data-void='<?php echo($row['vo_ID'])?>' data-voname='<?php echo ($row["owner_Fname"]." ".$row["owner_Lname"]); ?>' class="book-button disable_vehicleowner"><i class="fa-solid fa-trash-can"></i></button></div>
                </div>
            <?php
            endforeach;
            ?>
            
        </div>
    </div>
</div>
<!-- <script src="/assets/javascript/admin/component/search.js"></script> -->
