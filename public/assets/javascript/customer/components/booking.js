// const toggle = document.querySelector("input[type='checkbox']");
const toggle = document.getElementById("checkbox1");
const toggle2 = document.getElementById("checkbox2");
  const driverDetails = document.getElementById("add-driver");
  const needDriver = document.getElementById("need-driver");

    const addtextbox = document.getElementById("add-textbox");
    const addnote = document.getElementById("add-note");

  toggle.addEventListener("change", function() {
    if (toggle.checked) {
      driverDetails.style.display = "block";
      needDriver.classList.add("yes");
    } else {
      driverDetails.style.display = "none";
      needDriver.classList.remove("yes");
    }
  });

    toggle2.addEventListener("change", function() {
    if (toggle2.checked) {
      addtextbox.style.display = "block";
      addnote.classList.add("yes");
    } else {
      addtextbox.style.display = "none";
      addnote.classList.remove("yes");
    }
  });



  // const driverNameSelect = document.querySelector('#driver-name');
  // const driverDetailsSection = document.querySelector('#driver-details');
  // const driverDetailsText = document.querySelector('#driver-details-text');
  //
  // driverNameSelect.addEventListener('change', function() {
  //   if (this.value === "") {
  //     driverDetailsSection.style.display = "none";
  //   } else {
  //     driverDetailsSection.style.display = "block";
  //     driverDetailsText.innerHTML = "Driver selected: " + this.value;
  //   }
  // });


  const textArea = document.getElementById("text-area");
  const charLimit = document.getElementById("char-limit");
  const maxChars = parseInt(textArea.dataset.maxChars);

  textArea.addEventListener("input", function() {
    if (this.value.length > maxChars) {
      this.value = this.value.substring(0, maxChars);
    }

    const remainingChars = maxChars - this.value.length;
    charLimit.innerHTML = `Character limit: ${remainingChars}`;

    if (remainingChars < 25) {
      charLimit.classList.add("warning");
    } else {
      charLimit.classList.remove("warning");
    }

    if (remainingChars <= 0) {
      charLimit.classList.add("exceeded");
    } else {
      charLimit.classList.remove("exceeded");
    }
  });


// Calculate the price of the booking


function calculatePrice() {
  console.log("Form loaded");
  // Get the selected start and end dates
  const startDate = new Date(document.getElementById("start-date").value);
  const endDate = new Date(document.getElementById("end-date").value);
  let timeDiff = Math.abs(endDate.getTime() - startDate.getTime());

// Calculate the number of days between the start and end dates
  const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
  let dayCount = Math.round(Math.abs((timeDiff) / oneDay));

// Get the price per day from the data attribute
  const pricePerDayElement = document.getElementById("price-per-day");
  let pricePerDay = parseFloat(pricePerDayElement.innerHTML.replace("Rs. ", ""));
  console.log(dayCount);

  let hasDriver = document.getElementById("checkbox1").checked;

  let total = document.getElementById("total-price");

  let driverPrice = 1000;

  if (hasDriver) {
    driverPrice = 1000 * dayCount;
    document.getElementById("driver-price").innerHTML = `Rs. ${driverPrice.toFixed(2)}`;
  }else {
    driverPrice = 0;
    document.getElementById("driver-price").innerHTML = `Rs. ${driverPrice.toFixed(2)}`;
  }

  let totalRent = pricePerDay * dayCount;
  document.getElementById("rent-price").innerHTML = `Rs. ${totalRent.toFixed(2)}`;


  const totalPrice = totalRent + driverPrice;

  total.innerHTML = `Rs. ${totalPrice.toFixed(2)}`;
  document.getElementById("setRentalPrice").value = totalPrice.toFixed(2);

};

document.getElementById("start-date").addEventListener("change", calculatePrice);
document.getElementById("end-date").addEventListener("change", calculatePrice);
document.getElementById("checkbox1").addEventListener("change",calculatePrice);


<<<<<<< HEAD
// access hasDriver const in the calculatePrice function, outside the function
=======
// show/hide license input fields
const checkbox = document.getElementById('checkSelf');
const licenseFields = document.getElementById('self-drive-terms');
checkbox.addEventListener('change', function() {
  if (this.checked) {
    licenseFields.style.display = 'block';
    licenseFields.classList.add("yes");
  } else {
    licenseFields.style.display = 'none';
    licenseFields.classList.remove("yes");
  }
});

>>>>>>> a3b4b81b7c9a1d231e73039103cc514f02c2c7fc







