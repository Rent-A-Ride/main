var form_1 = document.querySelector(".form_1");
var form_2 = document.querySelector(".form_2");
var form_3 = document.querySelector(".form_3");


var form_1_btns = document.querySelector(".form_1_btns");
var form_2_btns = document.querySelector(".form_2_btns");
var form_3_btns = document.querySelector(".form_3_btns");


var form_1_next_btn = document.querySelector(".form_1_btns .btn_next");
var form_2_back_btn = document.querySelector(".form_2_btns .btn_back");
var form_2_next_btn = document.querySelector(".form_2_btns .btn_next");
var form_3_back_btn = document.querySelector(".form_3_btns .btn_back");

var form_2_progessbar = document.querySelector(".form_2_progessbar");
var form_3_progessbar = document.querySelector(".form_3_progessbar");

var btn_done = document.querySelector(".btn_done");
var modal_wrapper = document.querySelector(".modal_wrapper");
var shadow = document.querySelector(".shadow");

form_1_next_btn.addEventListener("click", function(){
    form_1.style.display = "none";
    form_2.style.display = "block";

    form_1_btns.style.display = "none";
    form_2_btns.style.display = "flex";

    form_2_progessbar.classList.add("active");
});

form_2_back_btn.addEventListener("click", function(){
    form_1.style.display = "block";
    form_2.style.display = "none";

    form_1_btns.style.display = "flex";
    form_2_btns.style.display = "none";

    form_2_progessbar.classList.remove("active");
});

form_2_next_btn.addEventListener("click", function(){
    form_2.style.display = "none";
    form_3.style.display = "block";

    form_3_btns.style.display = "flex";
    form_2_btns.style.display = "none";

    form_3_progessbar.classList.add("active");
});

form_3_back_btn.addEventListener("click", function(){
    form_2.style.display = "block";
    form_3.style.display = "none";

    form_3_btns.style.display = "none";
    form_2_btns.style.display = "flex";

    form_3_progessbar.classList.remove("active");
});

btn_done.addEventListener("click", function(){
    modal_wrapper.classList.add("active");
})

shadow.addEventListener("click", function(){
    modal_wrapper.classList.remove("active");
})

//range slider

const rangeSlider = document.getElementById("range-slider");
const rangeValue = document.getElementById("range-value");
const vehicleType = document.getElementById("vehicle-type");

vehicleType.addEventListener("input", () => {
  let min, max;
  switch(vehicleType.value.toLowerCase()) {
    case "car":
      min = 1000;
      max = 5000;
      break;
    case "van":
      min = 2000;
      max = 6000;
      break;
    case "bike":
      min = 400;
      max = 1000;
      break;
    case "scooter":
      min = 500;
      max = 1500;
      break;
    default:
      min = 0;
      max = 100;
      break;
  }
  rangeSlider.min = min;
  rangeSlider.max = max;
  rangeSlider.value = min;
  rangeValue.textContent = `Value: Rs. ${min}`; // set initial value
});

rangeSlider.addEventListener("input", () => {
  rangeValue.textContent = `Value: Rs. ${rangeSlider.value}`;
});







