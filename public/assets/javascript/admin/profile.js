// const loadFile = function (event) {
//     const image = document.getElementById("output");
//     image.src = URL.createObjectURL(event.target.files[0]);
//     const form=new FormData();
//     form.append('image',event.target.files[0]);
//     fetch('/upload', {
//         method: 'POST',
//         body: form
//     }).then(res => res.json())
//         .then(res => {
//             if (res.status){
//                 alert("Image uploaded successfully");
//             }
//         });

//     console.log(image.src);
// };

// Get the modal
// const modal = document.getElementById("profileModal");

// Get the button that opens the modal
// const btn = document.getElementById("button28");

// Get the <span> element that closes the modal
// const span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
// function openModal() {
//     if (modal !== null) {
//         modal.style.display = "block";
//     } else {
//         console.log("Error: modal element not found");
//     }
// }

// When the user clicks on <span> (x), close the modal
// function closeModal() {
//     modal.style.display = "none";
// }

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }
import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
const adminprofile = document.querySelector(".button28");


adminprofile.addEventListener("click", function () {
        console.log(adminprofile.dataset);
        const area=adminprofile.dataset.area;
        const phoneno=adminprofile.dataset.phoneno;
        const nic=adminprofile.dataset.nic;
        const firstname=adminprofile.dataset.firstname;
        const lastname=adminprofile.dataset.lastname;
        const email=adminprofile.dataset.email;
        const licenseno=adminprofile.dataset.licenseno;
        const userid=adminprofile.dataset.userid;
        
        
        const profile ={
            area,
            phoneno,
            nic,
            firstname,
            lastname,
            email,
            licenseno,
            userid
        };

        const profileform = htmlToElement(
            `<div id="profileModal" class="profileModal">
                <div class="modal-content">
                    <span class="close" >&times;</span>
                        <form action="/ownerProfile" method="post" class="up-profile" id="update_profile">
                            <label for="nic">NIC:</label>
                            <input disabled value="${profile.nic}" type="text" id="nic" name="nic">
        
                            <label for="fname">First Name:</label>
                            <input value="${profile.firstname}" type="text" id="fname" name="firstname">
        
                            <label for="lname">Last Name:</label>
                            <input value="${profile.lastname}" type="text" id="lname" name="lastname">
        
                            <label for="email">Email:</label>
                            <input disabled value="${profile.email}" type="email" id="email" name="email">
        
                            <label for="phone">Phone Number:</label>
                            <input value="${profile.phoneno}" type="tel" id="phone" name="phoneno">
        
                            <label for="address">Address:</label>
                            <textarea id="address" name="address">${profile.area}</textarea>

                            <label for="license_No">License No:</label>
                            <input value="${profile.licenseno}" type="text" id="license_No" name="license_No">
        
                            <!-- <div class="errors">
                                <span class="form-error"><?= $model->lastname ?></span>
                            </div> -->
        
                            <button  id="profile" value="Save Changes">Save Changes</button>
                        </form>
                </div>
            </div>`
        );

        const updateconfirm = profileform?.querySelector("#profile");
        
        updateconfirm?.addEventListener("click",function(){

            const viewupdate = htmlToElement(
                `<div class="modal-body">
                    <div>
                        <p>Are You Sure You Want Update Details</p>
                        <div class="flex-centered-y justify-between mt-4">
                            <button class="btn btn--thin" id="update-confirm-btn" style="background-color:green" >
                                Confirm
                            </button>
                    
                        </div>
                    </div>
                </div>`
            );
            const confirm = viewupdate?.querySelector('#update-confirm-btn')
            confirm.addEventListener("click",function(){
                const form = profileform?.querySelector('#update_profile');
                form.submit();
            });
            
            Modal.show({
            
                key:"updatelin",
                content: viewupdate,
                closable: true,
            });

        });

        
        
        Modal.show({
            
            key:"profileform",
            content: profileform,
            closable: true,
        });
        
})



