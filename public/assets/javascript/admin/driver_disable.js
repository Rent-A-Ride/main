import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
const vehicleDisableButtons = document.querySelectorAll(".disable_driver")

vehicleDisableButtons.forEach(function (btn) {
    btn.addEventListener("click", function () {
        
        const driverid=btn.dataset.driverid;
        const drivername=btn.dataset.drivername;
        

        const driver ={
            driverid,
            drivername
        };

        const viewdisable = htmlToElement(
            `<div class="modal-body">
                <div>
                    <p>Are You Sure You Want Disable ${driver.drivername}</p>
                    <div>
                        <form action="/admin/driver/disable" method="post" enctype="multipart/form-data" id="driver_disable">
                            <div> <input type="number" style="display:none" name='driver_Id' placeholder='' required  value='${driver.driverid}' /> </div>
                            <div class="flex-centered-y justify-between mt-4">
                                <button class="btn btn--thin" id="driver-disable-modal-btn" style="background-color:green" type="button">
                                    Confirm
                                </button>
                
                            </div>
                        </form
                    </div>
                </div>
            </div>`
        );

        const submitButton = viewdisable.querySelector('#driver-disable-modal-btn');
        submitButton.addEventListener('click', function() {
            const form = viewdisable.querySelector('#driver_disable');
            form.submit();
        });
        
        Modal.show({
            
            key:"driverdisable",
            content: viewdisable,
            closable: true,
        });
        // console.log("kalana");
    })
})