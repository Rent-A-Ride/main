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





const withDriverAccept = document.getElementById('with-driver-accepted');
const withoutDriverAccept = document.getElementById('without-driver-accepted');
const withDriverAcceptedContainer = document.querySelector('.with-driver-accepted-container');
const withoutDriverAcceptedContainer = document.querySelector('.without-driver-accepted-container');


//
//withDriverAccept.addEventListener('click', () => {
//    withDriverAcceptedContainer.style.display = 'block';
//    withoutDriverAcceptedContainer.style.display = 'none';
//});
//
//withoutDriverAccept.addEventListener('click', () => {
//    withoutDriverAcceptContainer.style.display = 'block';
//    withDriverAcceptContainer.style.display = 'none';
//});
//


function showWithDriver() {

  withDriverAcceptedContainer.style.display = 'block';
  withoutDriverAcceptedContainer.style.display = 'none';
}

function showWithoutDriver() {

  withoutDriverAcceptedContainer.style.display = 'block';
  withDriverAcceptedContainer.style.display = 'none';
}
