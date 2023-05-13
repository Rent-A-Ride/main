const dateSearch = document.querySelector('#date-search');
const tableBody = document.querySelector('#search-results');
const scheduleTable = document.querySelector('#schedule-table');
const bookHeading = document.getElementById('bookings-heading');


dateSearch.addEventListener('submit', function(event) {
    event.preventDefault();

    const startDateInput = document.getElementById('start-date');
    const endDateInput = document.getElementById('end-date');

    const startDate = startDateInput.value;
    const endDate = endDateInput.value;

    // Update the heading based on the search dates
    if (startDate && endDate) {
        bookHeading.textContent = 'Scheduled Bookings from ' + startDate + ' to ' + endDate;
    } else {
        const today = new Date().toLocaleDateString();
        bookHeading.textContent = 'Scheduled Bookings for ' + today;
    }

    scheduleTable.style.display = 'flex';

    fetch('/vehicleOwner/bookingCalendar', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `start-date=${startDate}&end-date=${endDate}`,
    })
        .then(response => response.json())
        .then(data => {
            displaySearchResults(data);
        })

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
          <img src="/assets/img/uploads/vehicle/${result.veh_Image}" alt="Vehicle Image">
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
