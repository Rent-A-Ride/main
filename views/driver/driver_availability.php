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
<div class="cal-main">
<div class="cal">
        <div class="cal-header">
            <div class="MonthName"><p class="current-date"></p></div>
            <div class="icons">
            <span id="prev" class="material-icons-sharp"><i class='bx bxs-left-arrow'></i></span>
            <span id="next" class="material-icons-sharp"><i class='bx bxs-right-arrow'></i></span>
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

</div>

<div class="popup-container">
    <div class="popup-content">
        <p>gfdfhfhu</p>
    </div>
</div>



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
            liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</span></li>`;
        }
        for (let i = 1; i <= lastDateofMonth; i++) {
            let isBooked = bookedDates.includes(`${year}-${(month+1).toString().padStart(2, '0')}-${i.toString().padStart(2, '0')}`) ? "booked" : "";
            let isToday = i === date.getDate() && month === new Date().getMonth() && year === new Date().getFullYear() ? "active" : "";
            liTag += `<li class="${isToday} ${isBooked}"><span class="date-block">${i}</span></li>`;

            // liTag += `<li class="${isToday} ${isBooked}" data-date="${year}-${(month+1).toString().padStart(2, '0')}-${i.toString().padStart(2, '0')}">${i}</li>`;

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


    const booked = document.querySelectorAll(".booked");
    console.log(booked);

    booked.forEach(function(btn){
        btn.addEventListener("click",function() {
            alert("This date is booked");
            return console.log(btn.dataset.date);
            const date = btn.dataset.date; // get the date from the data-date attribute
            const url = `booking-details.php?date=${date}`; // create the URL with the date as a query parameter
            window.location.href = url; // redirect to the URL
        })
    })




</script>