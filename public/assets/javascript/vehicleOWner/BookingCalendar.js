const form = document.querySelector('.date-search');
const tableBody = document.getElementById('search-results');
const scheduleTable = document.getElementById('schedule-table');
const bookHeading = document.getElementById('bookings-heading');
let searchDate = document.getElementById('search-date');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    let searchDate = document.getElementById('search-date');

    let Date = searchDate.value;
    console.log(Date);

    // Update the heading based on the search date
    if (searchDate) {
        bookHeading.textContent = 'Scheduled Bookings for ' + Date;
    } else {
        const today = new Date().toLocaleDateString();
        bookHeading.textContent = 'Scheduled Bookings for ' + today;
    }

    scheduleTable.style.display = 'flex';

    const searchDateInput = document.getElementById('search-date');
    const selectedDate = searchDateInput.value;

    fetch('/vehicleOwner/bookingCalendar', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `search-date=${selectedDate}`,
    })
        .then(response => response.json())
        .then(data => {
            displaySearchResults(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

window.addEventListener('DOMContentLoaded', function() {
    const today = new Date().toLocaleDateString();
    fetch('/vehicleOwner/bookingCalendar', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `search-date=${today}`,
    })
        .then(response => response.json())
        .then(data => {
            displaySearchResults(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

function displaySearchResults(results) {
    tableBody.innerHTML = '';

    let rowChild;
    for (const result of results) {
        console.log(result);
        const row = document.createElement('tr');
        row.classList.add('parent');
        let status = result.status == 0 ? "Pending" : "Approved";

        row.innerHTML = `
      <td>${result.booking_Id}</td>
      <td>
        <div class="parent-info">
          <img src="/assets/img/vehicle/${result.veh_Image}" alt="Vehicle Image">
          <div class="info">
            <p><strong>${result.veh_Name}</strong></p>
            <p class="small">${result.veh_Plate_No}</p>
          </div>
        </div>
      </td>
      <td><strong>Rs. ${result.rental_Price}.00</strong></td>
      <td><strong>${result.pay_Method}</strong></td>
      <td><span class="status">${status}</span></td>
      <td>
        <button id="cancelBookingBtn" class="cancel-btn" data-booking-id="${result.booking_id}">
          <i class='bx bx-trash'></i> Cancel
        </button>
      </td>
      </tr>               
    `;

        const rowChild = document.createElement('tr');
        rowChild.classList.add('child');
        rowChild.style.display = 'table-row';



        rowChild.innerHTML = `
            <td colspan="5" class="child-td">
                        <div class="child-info">
                            <div class="booking-info">
                                <h3>Booking Info</h3>
                                <div class="booking-data">
                                    <div class="row">
                                        <div class="cell">
                                            <p><strong>Start Date:</strong> ${result.start_Date} </p>
                                        </div>
                                        <div class="cell">
                                            <p><strong>End Date:</strong> ${result.end_Date}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="cell">
                                            <p><strong>Destination:</strong>${result.destination}</p>
                                        </div>
                                        <div class="cell">
                                            <p><strong>Status:</strong>${status}</p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="driver-info">
                                    <div class="driver-image">
                                        <img src="/assets/img/uploads/default.jpg" alt="Driver Image">
                                    </div>
                                    <p style="text-align: center">
                                        No Driver Requested!</p>
                            </div>
                        </div>
                    </td>
        `;

        tableBody.appendChild(row);
        tableBody.appendChild(rowChild);
    }


}