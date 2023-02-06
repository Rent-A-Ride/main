const inputs = document.querySelectorAll(".input-field");
var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");

inputs.forEach(inp => {
    inp.addEventListener('focus', () => {
        inp.classList.add('active');
    });
    inp.addEventListener('blur', () => {
        if(inp.value != "") return;
        inp.classList.remove('active');
    });
});

// toggle_btn.forEach((btn) => {
//     btn.addEventListener("click", () => {
//         main.classList.toggle("sign-up-mode");
//     });
// });

function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

