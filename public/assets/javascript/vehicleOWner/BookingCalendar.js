const form = document.querySelector('.date-search');
const tableBody = document.getElementById('search-results');

form.addEventListener('submit', function(event) {
    event.preventDefault();

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

function displaySearchResults(results) {
    tableBody.innerHTML = '';

    for (const result of results) {
        console.log(result);
        const row = document.createElement('tr');
        row.classList.add('parent');

        row.innerHTML = `
      <td>${result.booking_id}</td>
      <td>
        <div class="parent-info">
          <img src="${result.vehicle_image}" alt="Vehicle Image">
          <div class="info">
            <p><strong>${result.vehicle_name}</strong></p>
            <p class="small">${result.vehicle_rent}</p>
          </div>
        </div>
      </td>
      <td><strong>${result.total_rent}</strong></td>
      <td><span class="status">${result.payment_status}</span></td>
      <td>
        <button id="cancelBookingBtn" class="cancel-btn" data-booking-id="${result.booking_id}">
          <i class='bx bx-trash'></i> Cancel
        </button>
      </td>
    `;

        tableBody.appendChild(row);
    }
}