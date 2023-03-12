const allSideMenu = document.querySelectorAll('#side-bar .side-bar-menu li a');


allSideMenu.forEach(item=> {
    const li = item.parentElement;

    item.addEventListener('click',function(){
        allSideMenu.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
})


//Toggle side bar
const menubar =document.querySelector('#content nav .bx');
const sidebar =document.getElementById('side-bar');

menubar.addEventListener('click',function () {
    sidebar.classList.toggle('hide');
})



// if (window.innerWidth < 768) {
//     alert("kalana weranga");
//     sidebar.classList.add('hide');
//     // console.log(Kalana);

// }

// $(window).on('resize', function() {

//     alert("weranga");
//     if($(window).width() <768) {
//         alert("kalana");
//         $('#body').classList.add('hide');
//         // $('#body').removeClass('limit400');
//     }
//     // else{
//     //     $('#body').addClass('limit400');
//     //     $('#body').removeClass('limit1200');
//     // }
// })

addEventListener("resize", function(){
    if (window.innerWidth < 768) {
        sidebar.classList.add('hide');
    }
    else if(window.innerWidth > 768){
        sidebar.classList.remove('hide');
    }
});

// onresize = (event) => {};

