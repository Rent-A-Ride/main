// Get the modal
let modal = document.getElementById("cancelModal");

// Get the button that opens the modal
let cancelButtons = document.querySelectorAll(".cancel-btn");

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];

// Get the booking id
const bookingIdField = modal.querySelector("#bookingId");

// When the user clicks the button, open the modal
cancelButtons.forEach((button) => {
    button.addEventListener("click", () => {
        const bookingId = button.dataset.bookingId;
        bookingIdField.value = bookingId;
        console.log(bookingIdField.value);
        modal.style.display = "block";
    });
});

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

const form = document.querySelector("#booking-cancel-form");
form.addEventListener("submit", (event) => {
    event.preventDefault();
    const formData = new FormData(form);
    fetch("/cancelBooking", {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(response => {
            if (response.status) {
                alert("Booking cancelled successfully");
                // reload the page
                location.reload();
            }
        });
    location.reload();
});

