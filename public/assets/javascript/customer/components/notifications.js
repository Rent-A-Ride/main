const notificationIcon = document.querySelector('.notification-icon');
const notificationPanel = document.querySelector('.notification-panel');
const closeBtn = document.querySelector('.close-btn');

notificationIcon.addEventListener('click', () => {
    notificationPanel.classList.toggle('active');
});

closeBtn.addEventListener('click', () => {
    notificationPanel.classList.remove('active');
});
