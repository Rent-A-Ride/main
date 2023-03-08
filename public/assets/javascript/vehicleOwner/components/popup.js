// Get the button and the popup container
// const acceptbutton = document.querySelectorAll('.accept-button');
var accept = document.getElementById("accept");
var reject = document.getElementById("reject")


// Get the yes and no buttons from the popup box
// const yesButton = document.getElementById("yes-button");
// const noButton = document.getElementById("no-button");


function openPopup(booking_Id) {
    accept.style.display = "block";
    accept.dataset.booking_Id = booking_Id;
}

function closePopup() {
    accept.style.display = "none";
}

// When the user clicks the confirm button, show the popup box
// acceptbutton.addEventListener("click", function() {
//   popupContainer.style.display = "block";
// });

// When the user clicks the yes button, confirm the request and hide the popup box
// yesButton.addEventListener("click", function() {
//   // Add your code here to confirm the request
//   accept.style.display = "none";
// });

// When the user clicks the no button, hide the popup box without confirming the request
// noButton.addEventListener("click", function() {
//   accept.style.display = "none";
// });


function acceptBooking(booking_Id) {
    console.log(booking_Id);
    // Show confirmation popup dialog
    if (confirm("Are you sure you want to accept this booking?")) {
        // If user clicked "yes", update the booking status in the database
        fetch('/vehicleOwner/acceptBooking', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                booking_Id: booking_Id
            })
        }).then(res => res.json())
            .then(res => {
                if (res.status) {
                    alert("Booking accepted successfully");
                    location.reload();
                }
            });
    }

    // Close the popup dialog (assuming you have a function called closePopup)
    closePopup();
}

function displayRejectPopup() {
    const popup = document.getElementById("reject");
    popup.style.display = "block";
}


