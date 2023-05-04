fetch('/vehicleOwner/bookingCalendar').then((res) => res.json())
    .then(response => {
        console.log(response);
    }).catch((err) => console.log(err));