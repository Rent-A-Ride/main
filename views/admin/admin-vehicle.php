<?php
/*  @var $row \app\models\cusVehicle*/
?>

<!-- SEARCH -->
<div class="search">
    <label class="label-l" for="search"><i class='bx bx-search'></i>Search </label>
    <input type="search" id="search" placeholder="Type to search">
    <div class="location-select">
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
    </div>
    
    <div id='filter'>
        <button class='scooter'>Scooter</button>
        <button class='Car'>Cars</button>
        <button class='vans'>Vans</button>
        <button class=''>Clear</button>
    </div>
    <div class="date-select">

        <button onclick="location.href='/admin/vehicle/add_vehicle'" class="book-button1"><i class="fa-solid fa-plus"></i></button>
        
    </div>
    <div>
        <button onclick="location.href='/admin/vehicle/disable_vehicle'" class="book-button1"><i class="fa-regular fa-thumbs-up"></i></button>
    </div>
</div>

<!-- Table -->

<div class="table-container">
    <div id="table" class="table">
        <div class="table-header">
            <div class="header__item"><a id="name" class="filter__link" href="#"></a></div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Vehicle</a></div>
            <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Location</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Rent(P/D)</a></div>
		    <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"> <i class="fa-regular fa-user"></i></a></div>
		    <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"><i class="fa-solid fa-sliders"></i></a></div>
		    <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"> <i class="fa-solid fa-gas-pump"></i></a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
        </div>
        <div class="table-content" >
            <?php
            foreach ($result as $row):
                ?>
                <div class="table-row <?=$row['veh_type']?>">
                    <?php $vehicle_id=$row["veh_Id"] ?> 
                    <div class="table-data"><img src="/assets/img/Vehicle_img/<?php echo $row['front_view']?>" width="56px"></div>
                    <div class="table-data"><?= $row['veh_brand'].' '.$row['veh_model'] ?></div>
                    <div class="table-data"><?= $row['veh_location']?></div>
                    <div class="table-data">Rs <?= $row['price'].'.00' ?></div>
                    <div class="table-data"><?php echo $row["seatsCount"]?></div>
                    <div class="table-data"><?php echo $row["transmission"]?></div>
                    <div class="table-data"><?php echo $row["fuel_type"]?></div>
                    <div class="table-data"><button onclick="location.href='/viewVehicleProfile?id=<?php echo $vehicle_id; ?>'" class="book-button"><i class="fa-regular fa-eye"></i></button></div>
                    <div class="table-data"><button onclick="location.href='/admin/vehicle/update?id=<?php echo $vehicle_id; ?>'" class="book-button"><i class="fa-regular fa-pen-to-square"></i></button></div>
			  <div class="table-data"><button data-vehId='<?php echo($row['veh_Id'])?>' data-vehNo='<?php echo($row['plate_No'])?>' class="book-button disable_vehicle disable_vehicle"><i class="fa-solid fa-trash-can"></i></button></div>
                </div>
            <?php
            endforeach;
            ?>
            
        </div>
    </div>
</div>
