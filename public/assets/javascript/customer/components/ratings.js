// Get all rating widget elements on the page
const ratingWidgets = document.querySelectorAll('.rating-widget');

// Loop through each rating widget element
ratingWidgets.forEach((widget) => {
    // Get the rating value from the data-rating attribute
    const ratingValue = parseFloat(widget.getAttribute('data-rating'));

    // Get all star input elements in the widget
    const starInputs = widget.querySelectorAll('.star-input');

    // Loop through each star input element
    starInputs.forEach((input, index) => {
        // Check the star input if its index is less than the rating value
        if (index < ratingValue) {
            input.checked = true;
        }
    });
});
