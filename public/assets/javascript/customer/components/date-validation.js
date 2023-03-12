const fromDateInput = document.getElementById('start-date');
const toDateInput = document.getElementById('end-date');
const today = new Date();
fromDateInput.min = today.toISOString().slice(0, 10);

fromDateInput.addEventListener('change', function() {
    toDateInput.min = fromDateInput.value;
    toDateInput.disabled = false;
});

toDateInput.addEventListener('change', function() {
    fromDateInput.max = toDateInput.value;
});


function setToDateLimits() {
    toDateInput.min = fromDateInput.value;
    fromDateInput.max = toDateInput.value;

    var maxDate = new Date(fromDateInput.value);
    maxDate.setFullYear(maxDate.getFullYear() + 1);
    toDateInput.max = maxDate.toISOString().split("T")[0];
}
