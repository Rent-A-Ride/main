import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
const vehicleDisableButtons = document.querySelectorAll(".accept_vehicleowner")

vehicleDisableButtons.forEach(function (btn) {
    btn.addEventListener("click", function () {
        
        const vid=btn.dataset.void;
        const voname=btn.dataset.voname;
        

        const vowner ={
            vid,
            voname
        };

        const viewdisable = htmlToElement(
            `<div class="modal-body">
                <div>
                    <p>Are You Sure You Want Accept ${vowner.voname}</p>
                    <div>
                        <form action="/adminadd_vowner" method="post" enctype="multipart/form-data" id="vehicleowner_disable">
                            <div> <input type="number" style="display:none" name='vo_Id' placeholder='' required  value='${vowner.vid}' /> </div>
                            <div class="flex-centered-y justify-between mt-4">
                                <button class="btn btn--thin" id="vehicleowner-disable-modal-btn" style="background-color:green" type="button">
                                    Confirm
                                </button>
                
                            </div>
                        </form
                    </div>
                </div>
            </div>`
        );

        const submitButton = viewdisable.querySelector('#vehicleowner-disable-modal-btn');
        submitButton.addEventListener('click', function() {
            const form = viewdisable.querySelector('#vehicleowner_disable');
            form.submit();
        });
        
        Modal.show({
            
            key:"disablevehicleowner",
            content: viewdisable,
            closable: true,
        });
        // console.log("kalana");
    })
})