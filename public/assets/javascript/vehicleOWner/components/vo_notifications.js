const notificationIcon = document.querySelector('.notification-icon');
const notificationPanel = document.querySelector('.notification-panel');
const closeBtn8 = document.querySelector('.close-btn');
const notificationList = document.querySelector('.notification-list');
const notificationCount = document.querySelector('.notification-count');



notificationIcon.addEventListener('click', () => {
    notificationPanel.classList.toggle('activeY');
    fetchNotifications();
});

closeBtn8.addEventListener('click', () => {
    notificationPanel.classList.remove('activeY');

});


// call fetchNotifications() when the page is loaded
window.addEventListener('load', fetchNotifications);

// call fetchNotifications() every 10 seconds
setInterval(fetchNotifications, 10000);


console.log("notifications.js loaded");

function fetchNotifications() {
    fetch('/vo_notification',{
        method: 'GET',
        headers: {
            contentType: 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error);
                return;
            }
            if (data[0].output) {
                notificationList.innerHTML = data[0].output;
                notificationCount.textContent = data[0].count;
            } else {
                notificationList.innerHTML = '<li style="text-align: center"><p>--No notifications available.--</p></li>';
                notificationCount.textContent = '0';
            }
        })
    // .catch(error => {
    //     console.error(error)
    // });
}

function markAsRead(notificationId) {
    const formdata = new FormData();
    formdata.append('notificationId', notificationId);
    fetch('/update-vo-notification-status', {
        method: 'POST',
        body: formdata
    })
        .then(response => response.json())
        .then(data => {
            // Handle the response as needed
            fetchNotifications();
            console.log(data);
        })

}
