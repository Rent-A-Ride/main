console.log("Kalana");
const withDriver = document.getElementById('with-driver');
const withoutDriver = document.getElementById('without-driver');
const withDriverContainer = document.querySelector('.with-driver-container');
const withoutDriverContainer = document.querySelector('.without-driver-container');

withDriver.addEventListener('click', () => {
    withDriverContainer.style.display = 'block';
    withoutDriverContainer.style.display = 'none';
});

withoutDriver.addEventListener('click', () => {
    withoutDriverContainer.style.display = 'block';
    withDriverContainer.style.display = 'none';
});
