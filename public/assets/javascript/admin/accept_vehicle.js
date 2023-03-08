import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
const vehicleDisableButtons = document.querySelectorAll(".accept_vehicle")

vehicleDisableButtons.forEach(function (btn) {
    btn.addEventListener("click", function () {
        
        const vehid=btn.dataset.vehid;
        const vehno=btn.dataset.vehno;
        console.log(vehid);

        const vehicle ={
           vehid,
           vehno
        };

        const viewdisable = htmlToElement(
            `<div class="modal-body">
                <div>
                    <p>Are You Sure You Want Accept ${vehicle.vehno} Vehicle</p>
                    <div>
                        <form action="/admin/vehicle/add_vehicle" method="post" enctype="multipart/form-data" id="vehicle_accept">
                            <div> <input type="number" style="display:none" name='veh_Id' placeholder='' required  value='${vehicle.vehid}' /> </div>
                            <div class="flex-centered-y justify-between mt-4">
                                <button class="btn btn--thin" id="vehicle-accept-modal-btn" style="background-color:green" type="button">
                                    Confirm
                                </button>
                
                            </div>
                        </form
                    </div>
                </div>
            </div>`
        );

        const submitButton = viewdisable.querySelector('#vehicle-accept-modal-btn');
        submitButton.addEventListener('click', function() {
            const form = viewdisable.querySelector('#vehicle_accept');
            form.submit();
        });
        
        Modal.show({
            
            key:"vehicledisable",
            content: viewdisable,
            closable: true,
        });
        // console.log("kalana");
    })
})