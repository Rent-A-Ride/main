const loadFile = function (event) {
    const image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);
    const form=new FormData();
    form.append('image',event.target.files[0]);
    fetch('/upload', {
        method: 'POST',
        body: form
    }).then(res => res.json())
        .then(res => {
            if (res.status){
                alert("Image uploaded successfully");
            }
        });

    console.log(image.src);
};

// Get the modal
const modal = document.getElementById("profileModal");

// Get the button that opens the modal
const btn = document.getElementById("button28");

// Get the <span> element that closes the modal
const span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function closeModal() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}