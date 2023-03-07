import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
const vehiclelinscanCopyButton = document.querySelector(".vehiclelin_scan_copy");

// console.log(vehiclelinscanCopyButton);
vehiclelinscanCopyButton.addEventListener("click", function () {
       
        const veh_id=vehiclelinscanCopyButton.dataset.vehid;
        const linno=vehiclelinscanCopyButton.dataset.linno;
        const vehno = vehiclelinscanCopyButton.dataset.vehno;
        const fromdate = vehiclelinscanCopyButton.dataset.fromdate;
        const exdate = vehiclelinscanCopyButton.dataset.exdate;
        const scancopy = vehiclelinscanCopyButton.dataset.scancopy;

        const vehicle ={
            veh_id,
            linno,
            vehno,
            fromdate,
            exdate,
            scancopy
        };

        const updatevehicleForm = htmlToElement(
            `<div class="modal-body">
                <form action="/admin/vehicle/update" method="post" enctype="multipart/form-data" id="update_veh_lin">
                            
            
                    <div class="grid gap-4">
                        <div><input type='number' style="display:none" name='veh_Id' id='veh_Id' placeholder='' required  value='${vehicle.veh_id}' readonly></div>
                        <div class='form-item'>
                            <label for='license_No'>License No:</label>
                            <input type='text' name='license_No' id='license_No' placeholder='' required  value='${vehicle.linno}' readonly>
                        </div>
                        <div class='form-item'>
                            <label for='from_date'>From Date:</label>
                            <input type='text' name='from_date' id='from_date' placeholder='' required  value='${vehicle.fromdate}' readonly>
                        </div>
                        <div class='form-item'>
                            <label for='ex_date'>Exp. Date:</label>
                            <input type='text' name='ex_date' id='ex_date' placeholder='' required  value='${vehicle.exdate}' readonly>
                        </div>
                        <div class='form-item'>
                            <img src="/assets/img/VehicleComplaintProof/${vehicle.scancopy}"></img>        
                        </div>
                        <div class="flex-centered-y justify-between mt-4">
                            <button class="btn btn--thin " id="vehicle-lin-update-modal-btn" type="button">
                                Update
                            </button>
                
                        </div>
            
            
                    </div>

            
                </form>
                
            </div>`
        );

        const updateconfirm = updatevehicleForm?.querySelector("#vehicle-lin-update-modal-btn");
        console.log(updateconfirm);
        updateconfirm?.addEventListener("click",function(){

            const viewupdate = htmlToElement(
                `<div class="modal-body">
                    <div>
                        <p>Are You Sure You Want Update Details</p>
                        <div class="flex-centered-y justify-between mt-4">
                            <button class="btn btn--thin" id="update-lin-confirm-btn" style="background-color:green" type="button">
                                Confirm
                            </button>
                    
                        </div>
                    </div>
                </div>`
            );
            const confirm = viewupdate?.querySelector('#update-lin-confirm-btn')
            confirm.addEventListener("click",function(){
                const form = updatevehicleForm?.querySelector('#update_veh_lin');
                form.submit();
            });
            
            Modal.show({
            
                key:"updatelin",
                content: viewupdate,
                closable: true,
            });

        });

        
        
        Modal.show({
            
            key:"viewcomplaintProof",
            content: updatevehicleForm,
            closable: true,
        });
        // console.log("kalana");
})
