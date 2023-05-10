<?php

$bookedDates = [];

foreach ($bookings as $booking) {
    $startDate = strtotime($booking['startDate']);
    $endDate = strtotime($booking['endDate']);
    $currentDate = $startDate;
    while ($currentDate <= $endDate) {
        $bookedDates[] = date('Y-m-d', $currentDate);
        $currentDate = strtotime('+1 day', $currentDate);
    }
}



?>

<!-- <div class="ownerProfile_body"> -->
<!-- <div class="ownerProfile_container">
    
    <div class="ownerProfile_containerbox">
        

        
        <hr>
        <div class="vehicleCustomerReviews">
            <h3>Reviews</h3>
            <div>
                <ol>
                    <li>Good Vehicle</li>
                </ol>
            </div>
        </div>
    </div>

</div>
<div class="ownerProfile_rest"></div> -->


<div class="vehicle-card">
    <h2 class="vehicle-name"><?php echo($veh_info[0]['veh_brand'].' '.$veh_info[0]['veh_model'])?><span style="color:#FAB84C ;"> •<?php echo($veh_info[0]['owner_Fname'].' '.$veh_info[0]['owner_Lname'])?> </span></h2>
    <div class="details-cont">
        <div id="gallery">
            <div class="row">
                <div class="large-image">
                    <img src="assets/img/Vehicle_img/gallery/front.jpg">
                </div>
            </div>
            <div class="row">
                <div class="thumbnails">
                    <img src="assets/img/Vehicle_img/gallery/front.jpg" data-large="assets/img/vehicle/gallery/front.jpg">
                    <img src="assets/img/Vehicle_img/gallery/side.jpg" data-large="assets/img/vehicle/gallery/side.jpg">
                    <img src="assets/img/Vehicle_img/gallery/inside.jpg" data-large="assets/img/vehicle/gallery/inside.jpg">
                </div>
            </div>

        </div>


        <div class="vehicle-details">
            <div class="vehicle-features">
                <span class="vehicle-seats"><i class='bx bx-user'></i> <?php echo($veh_info[0]['seatsCount'])?> seats</span>
                <span class="vehicle-fuel"><i class='bx bxs-gas-pump' ></i><?php echo($veh_info[0]['fuel_type'])?></span>
                <span class="vehicle-transmission"><i class='bx bx-slider bx-rotate-90' ></i> <?php echo($veh_info[0]['transmission'])?></span>
                <span class="vehicle-fpd"><i class='bx bx-tachometer' ></i>  <?php echo($veh_info[0]['avgfuel'])?> km/l</span>
            </div>

            <div class="vehicle-info">

                <div class="two-column-layout">
                    <div class="left-column">
                        <ul>
                            <li class="bold">Brand: <?php echo($veh_info[0]['veh_brand'])?></li>
                            <li class="bold">Model: <?php echo($veh_info[0]['veh_model']) ?></li>
                            <li class="bold">Type: <?php echo($veh_info[0]['veh_type'])?></li>
                            <li class="bold">Plate No: <?php echo($veh_info[0]['plate_No']) ?></li>
                            <li class="bold">Year: <?php echo($veh_info[0]['year'])?></li>
                        </ul>
                    </div>
                    <div class="right-column">
                        <ul>
                            <li class="bold">Color:  <?php echo($veh_info[0]['vehColor'])?></li>
                            <li class="bold">Seats:  <?php echo($veh_info[0]['seatsCount'])?></li>
                            <li class="bold">Transmission:  <?php echo($veh_info[0]['transmission'])?></li>
                            <li class="bold">Fuel:  <?php echo($veh_info[0]['fuel_type'])?></li>
                        </ul>
                    </div>
                </div>
                <div class="vehicle-description">
                    <p class="bold">Description</p>
                    <p><?php echo($veh_info[0]['Description'])?></p>
                </div>
                <div class="vehicle-price">
                    <span>Vehicle Rent Price (Per/ Day):</span>
                    <span class="price">Rs. <?php echo($veh_info[0]['price'])?>.00 </span>
                </div>

            </div>

        </div>

    </div>
    <div class="review-availability-container">
        <div class="availability-calender-container review-availability-container-child">
            <div class="cal">
                <div class="header">
                    <p class="current-date"></p>
                    <div class="icons">
                    <span id="prev" class="material-icons-sharp"><i class="fa-solid fa-chevron-left"></i></span>
                    <span id="next" class="material-icons-sharp"><i class="fa-solid fa-chevron-right"></i></span>
                    </div>
                </div>
                <div class="calendar">
                    <ul class="weeks">
                    <li>Sun</li>
                    <li>Mon</li>
                    <li>Tue</li>
                    <li>Wed</li>
                    <li>Thu</li>
                    <li>Fri</li>
                    <li>Sat</li>
                    </ul>
                    <ul class="days">

                    </ul>
                </div>
            </div>
        </div>
        <div class="review-container review-availability-container-child">
            <div id="table" class="table">
                <div class="table-header">
                    <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">No</a></div>
                    <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Reviews</a></div>
                    <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Rates</a></div>
                </div>
                <div class="table-content" >
                    <?php
                    foreach ($reviews as $row):
                        ?>
                        <div class="table-row">
                             
                            <div class="table-data"><?= $row['booking_id']?></div>
                            <div class="table-data"><?= $row['comment']?></div>
                            <div class="table-data"><?= $row['rates']?></div>
                        </div>
                    <?php
                    endforeach;
                    ?>
            
                </div>
            </div>

        </div>
    </div>



    


</div>
<!-- Your HTML code here -->
<script>
    const daysTag = document.querySelector(".days");
    const currentDate = document.querySelector(".current-date");
    const adjecentIcons = document.querySelectorAll(".icons span");

    let date = new Date();
    let year = date.getFullYear();
    let month = date.getMonth();

    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    const generateCalendar = (bookedDates) => {
        var firstDayofMonth = new Date(year, month, 1).getDay();
        var lastDateofMonth = new Date(year, month + 1, 0).getDate();
        var lastDayofMonth = new Date(year, month, lastDateofMonth).getDay();
        var lastDateofLastMonth = new Date(year, month, 0).getDate();
        let liTag = "";
        for (let i = firstDayofMonth; i > 0; i--) {
            liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
        }
        for (let i = 1; i <= lastDateofMonth; i++) {
            let isBooked = bookedDates.includes(`${year}-${(month+1).toString().padStart(2, '0')}-${i.toString().padStart(2, '0')}`) ? "booked" : "";
            let isToday = i === date.getDate() && month === new Date().getMonth() && year === new Date().getFullYear() ? "active" : "";
            liTag += `<li class="${isToday} ${isBooked}">${i}</li>`;
        }
        for (let i = lastDayofMonth; i < 6; i++) {
            liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
        }
        currentDate.innerText = `${months[month]} ${year}`;
        daysTag.innerHTML = liTag;
    }

    // Call the function with the booked dates array
    generateCalendar(<?php echo json_encode($bookedDates); ?>);

    adjecentIcons.forEach(icon => {
        icon.addEventListener("click", () => {
            month = icon.id === "prev" ? month - 1 : month + 1;
            if (month < 0 || month > 11) {
                date = new Date(year, month);
                year = date.getFullYear();
                month = date.getMonth();
            } else {
                date = new Date();
            }
            generateCalendar(<?php echo json_encode($bookedDates); ?>);
        });
    });
</script>








<!-- </div> -->
