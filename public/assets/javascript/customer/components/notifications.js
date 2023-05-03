const notificationIcon = document.querySelector('.notification-icon');
const notificationPanel = document.querySelector('.notification-panel');
const closeBtn8 = document.querySelector('.close-btn');

notificationIcon.addEventListener('click', () => {
    notificationPanel.classList.toggle('active');
});

closeBtn8.addEventListener('click', () => {
    notificationPanel.classList.remove('active');
});

console.log("notifications.js loaded")
