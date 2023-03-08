// const bookBtn = document.querySelector('.book-btn');
//
// bookBtn.addEventListener('click', function() {
//   confirm('Are you sure you want to book this vehicle?');
// });

$(document).ready(function() {
    $('.thumbnails img').click(function() {
      var largeImage = $(this).data('large');
      $('.large-image img').attr('src', largeImage);
    });
  });
  
