// Get the button and the popup container
// const acceptbutton = document.querySelectorAll('.accept-button');
var accept = document.getElementById("accept");
var reject = document.getElementById("reject")


// Get the yes and no buttons from the popup box
// const yesButton = document.getElementById("yes-button");
// const noButton = document.getElementById("no-button");


function openPopup(str, btn = "") {

    if(btn == "yes") {
        function yesBtn() {
            console.log('this is inner');
            str.style.display = "none";
        }

        return yesBtn();
    } else if(btn == "no") {
        function noBtn() {
            str.style.display = "none";
        }
        return noBtn();
    } else {
        str.style.display = "block";
    }
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




