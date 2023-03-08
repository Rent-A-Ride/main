import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
const vehicleComplaintProofButtons = document.querySelectorAll(".vehicleComplaintproof")

vehicleComplaintProofButtons.forEach(function (btn) {
    btn.addEventListener("click", function () {
        const comid=btn.dataset.compalintid;
        const tableRow=btn.parentElement.parentElement;
        const customerName=tableRow.querySelector('td:nth-child(2)');
        const customer=customerName.textContent;
        const proof = btn.dataset.proof;

        const complaint ={
            comid,
            customer,
            proof
        };

        const viewcomplaintProof = htmlToElement(
            `<div class="modal-body">
                <form action="/admin/driverComplaint" method="post" enctype="multipart/form-data" id="driver-complaint-resolve">
                            
            
                    <div class="grid gap-4">
            
                        <div class='form-item'>
                            <label for='com_ID'>Complaint No:</label>
                            <input type='number' name='com_ID' id='com_no' placeholder='' required  value='${complaint.comid}' readonly>
                        </div>
                        <div class='form-item'>
                            <label for='customer_name'>Customer Name:</label>
                            <input type='text' name='cus_Name' id='customer_name' placeholder='' required  value='${complaint.customer}' readonly>
                        </div>
                        <div class='form-item'>
                            <img src="/assets/img/VehicleComplaintProof/${complaint.proof}"></img>        
                        </div>
            
            
                    </div>

            
                </form>
                
            </div>`
        );
        
        Modal.show({
            
            key:"viewcomplaintProof",
            content: viewcomplaintProof,
            closable: true,
        });
        // console.log("kalana");
    })
})