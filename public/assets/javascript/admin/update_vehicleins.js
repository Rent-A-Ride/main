import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
console.log("kalana");
const vehiclelinscanCopyButton = document.querySelector(".vehicle-ins-update");

console.log(vehiclelinscanCopyButton);
vehiclelinscanCopyButton.addEventListener("click", function () {
       
        const veh_id=vehiclelinscanCopyButton.dataset.vehid;
        const insno=vehiclelinscanCopyButton.dataset.insno;
        const vehno = vehiclelinscanCopyButton.dataset.vehno;
        const fromdate = vehiclelinscanCopyButton.dataset.fromdate;
        const exdate = vehiclelinscanCopyButton.dataset.exdate;
        const scancopy = vehiclelinscanCopyButton.dataset.scancopy;
        const inscom = vehiclelinscanCopyButton.dataset.inscom;
        const instype = vehiclelinscanCopyButton.dataset.instype;

        const vehicle ={
            veh_id,
            insno,
            vehno,
            fromdate,
            exdate,
            scancopy,
            inscom,
            instype
        };

        const updatevehicleForm = htmlToElement(
            `<div class="modal-body">
                <form action="/admin/vehicle_ins/update" method="post" enctype="multipart/form-data" id="vehicle-ins-update">
                            
            
                    <div class="grid gap-4">
                        <div><input type='number' style="display:none" name='veh_Id' id='veh_Id' placeholder='' required  value='${vehicle.veh_id}' readonly></div>
                        <div class='form-item'>
                            <label for='veh_No'>Vehicle No:</label>
                            <input type='text' name='veh_No' id='veh_No' placeholder='' required  value='${vehicle.vehno}' readonly>
                        </div>
                        <div class='form-item'>
                            <label for='ins_No'>Insurance Policy No:</label>
                            <input type='text' name='ins_No' id='ins_No' placeholder='' required  value='${vehicle.insno}' readonly>
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
                            <label for='ins_com'>Insuarance Company:</label>
                            <input type='text' name='ins_com' id='ins_com' placeholder='' required  value='${vehicle.inscom}' readonly>
                        </div>
                        <div class='form-item'>
                            <label for='ins_type'>Insuarance Type:</label>
                            <input type='text' name='ins_type' id='ins_type' placeholder='' required  value='${vehicle.instype}' readonly>
                        </div>
                        <div class='form-item'>
                            <img src="/assets/img/VehicleComplaintProof/${vehicle.scancopy}"></img>        
                        </div>
                        <div><input type='text' style="display:none" name='scan_copy' id='scan_copy' placeholder='' required  value='${vehicle.scancopy}' readonly></div>
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
                const form = updatevehicleForm?.querySelector('#vehicle-ins-update');
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
