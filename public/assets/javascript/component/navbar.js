const toggleBtn = document.getElementById('toggle-btn');
const navList = document.getElementById('nav-list');

toggleBtn.addEventListener('click', () => {
    navList.classList.toggle('active');
});

function myFunction(x) {
    x.classList.toggle("change");
}

// Profile Menu
document.querySelector(".img-cont").addEventListener("click", function() {
    // Show the profile menu.
    document.querySelector(".profile-menu").style.display = "block";
});

document.addEventListener("click", function(event) {
    // Hide the profile menu if the user clicks outside of it.
    if (!event.target.closest(".img-cont")) {
        document.querySelector(".profile-menu").style.display = "none";
    }
});