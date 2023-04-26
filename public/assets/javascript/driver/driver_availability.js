const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
adjecentIcons = document.querySelectorAll(".icons span");

let date = new Date(),
year = date.getFullYear(),
month = date.getMonth();

const months = ["January", "February", "March", "April", "May", "June", "July","August", "September", "October", "November", "December"];

const generateCalendar = () => {
    var firstDayofMonth = new Date(year, month, 1).getDay();
    var lastDateofMonth = new Date(year, month + 1, 0).getDate();
    var lastDayofMonth = new Date(year, month, lastDateofMonth).getDay();
    var lastDateofLastMonth = new Date(year, month, 0).getDate(); 
    let liTag = "";
    for (let i = firstDayofMonth; i > 0; i--) { 
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }
    for (let i = 1; i <= lastDateofMonth; i++) {
        let isToday = i === date.getDate() && month === new Date().getMonth() && year === new Date().getFullYear() ? "active" : "";
        liTag += `<li class="${isToday}">${i}</li>`;
    }
    for (let i = lastDayofMonth; i < 6; i++) { 
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }
    currentDate.innerText = `${months[month]} ${year}`; 
    daysTag.innerHTML = liTag;
}

generateCalendar();

adjecentIcons.forEach(icon => { 
    icon.addEventListener("click", () => { 
        month = icon.id === "prev" ? month - 1 : month + 1;
        if(month < 0 || month > 11) {
            date = new Date(year, month);
            year = date.getFullYear(); 
            month = date.getMonth(); 
        } else {
            date = new Date(); 
        }
        generateCalendar(); 
    });
});