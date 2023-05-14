const dateSearch = document.querySelector('#date-search');
const tableBody = document.querySelector('#table-content');
const scheduleTable = document.querySelector('#schedule-table');


dateSearch.addEventListener('submit', function(event) {
    event.preventDefault();

    const startDateInput = document.getElementById('start-date');
    const endDateInput = document.getElementById('end-date');

    const startDate = startDateInput.value;
    const endDate = endDateInput.value;

    fetch('/customerSearchByDate', {
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

    for (const row of results) {

        const divRow = document.createElement('div');
        divRow.classList.add('table-row');
        divRow.classList.add('${row.veh_Id}');

        divRow.innerHTML = `
      <div class="table-data">
        <img src="/assets/img/uploads/vehicle/${row.veh_Img}" width="56px">
      </div>
      <div class="table-data">${row.veh_brand} ${row.veh_Model}</div>
      <div class="table-data">
        <form class="rating-widget" data-rating="${row.ratings}">
          <input disabled type="checkbox" class="star-input" id="1" />
          <label class="star-input-label" for="1">
            1
            <i class="fa fa-star"></i>
            <i class="fa fa-star orange"></i>
          </label>
          <input disabled type="checkbox" class="star-input" id="2" />
          <label class="star-input-label" for="2">
            2
            <i class="fa fa-star"></i>
            <i class="fa fa-star orange"></i>
          </label>
          <input disabled type="checkbox" class="star-input" id="3" />
          <label class="star-input-label" for="3">
            3
            <i class="fa fa-star"></i>
            <i class="fa fa-star orange"></i>
          </label>
          <input disabled type="checkbox" class="star-input" id="4" />
          <label class="star-input-label" for="4">
            4
            <i class="fa fa-star"></i>
            <i class="fa fa-star orange"></i>
          </label>
          <input disabled type="checkbox" class="star-input" id="5" />
          <label class="star-input-label" for="5">
            5
            <i class="fa fa-star"></i>
            <i class="fa fa-star orange"></i>
          </label>
        </form>
      </div>
      <div class="table-data">${row.veh_location}</div>
      <div class="table-data">Rs ${row.veh_Price}.00</div>
      <div class="table-data">
        <button onclick="location.href='/VehicleInfo?id=${row.veh_Id}'" class="view-button">
          <i class='bx bx-show'></i> View
        </button>
      </div>
    `;

        tableBody.appendChild(divRow);
    }
}



