const toggleBtn = document.getElementById('toggle-btn');
const navList = document.getElementById('nav-list');

toggleBtn.addEventListener('click', () => {
    navList.classList.toggle('active');
});

function myFunction(x) {
    x.classList.toggle("change");
}