const output = document.querySelector(".output");
const input = document.querySelector("#images");

let imagesArray = [];

input.addEventListener("change", function () {
    let files = Array.from(this.files);
    let fileType = files[0].type;

    if (fileType === "image/jpeg" || fileType === "image/png") {
        imagesArray = [...imagesArray, ...files];
        displayImages();
    } else {
        alert("Please upload only jpeg or png files.");
    }

    // limit the number of images to 3
    if (imagesArray.length > 3) {
        imagesArray.splice(0, 1);
        displayImages();
        alert("You can upload only 3 images.")
    }
});

function displayImages() {
    let images = "";
    imagesArray.forEach((image, index) => {
        images += `<div class="image">
                <img src="${URL.createObjectURL(image)}" alt="image">
                <span onclick="deleteImage(${index})">&times;</span>
              </div>`;
    });
    output.innerHTML = images;

}

function deleteImage(index) {
    imagesArray.splice(index, 1);
    input.value = ""; // clear the input field
    displayImages();


}
