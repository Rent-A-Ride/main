<?php ?>

<!--<div class="date-search-container">-->
<!--    <form class="date-search" method="post">-->
<!--        <label class="date-label" for="search-date">Search by Date:</label>-->
<!--        <div class="date-input-container">-->
<!--            <input type="date" id="search-date" name="search-date" required>-->
<!--            <button type="submit"><i class='bx bx-search-alt bx-sm'></i></button>-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->

<!-- Date Search when start and End date select-->


<div class="date-search-container">
    <form id="date-search" class="date-search" method="post">
        <label class="date-label" for="start-date">Start Date:</label>
        <div class="date-input-container">
            <input type="date" id="start-date" name="start-date" required>
        </div>
        <label class="date-label" for="end-date">End Date:</label>
        <div class="date-input-container">
            <input type="date" id="end-date" name="end-date" required>
        </div>
        <button id="date-search" class="search-date" type="submit" name="search-date"><i class='bx bx-search-alt bx-sm'></i></button>
    </form>
</div>





<h2 id="bookings-heading">Scheduled Bookings for Today </h2>



<div class="table-wrapper" id="schedule-table" style="display: none">
    <table id="myTable" class="bookingTable">
        <thead>
        <tr>
            <th>Booking ID</th>
            <th>Vehicle</th>
            <th>Total Rent</th>
            <th>Payment Method</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="search-results">
        <!-- Existing table rows -->
        </tbody>

    </table>
</div>