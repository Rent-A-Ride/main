const createPdfButton = document.querySelector(".createPdf");

createPdfButton.addEventListener('click',function() {

  // Wait a short period of time to allow the PDF viewer to finish rendering the PDF file
  setTimeout(function() {

    // Print the current window using the browser's print dialog
    window.print();

  }, 1000);

});
