import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
const driverComplaintProofButtons = document.querySelectorAll(".driver_complaintProof")

driverComplaintProofButtons.forEach(function (btn) {
    btn.addEventListener("click", function () {
        const comid=btn.dataset.compalintid;
        const customerid=btn.dataset.customerid;
        const driverid=btn.dataset.driverid;

        const tableRow=btn.parentElement.parentElement;
        const customerName=tableRow.querySelector('td:nth-child(2)');
        const customer=customerName.textContent;
        const driverName=tableRow.querySelector('td:nth-child(3)');
        const driver=driverName.textContent;
        const proof = btn.dataset.driverproof;

        const complaint ={
            comid,
            customerid,
            driverid,
            driver,
            customer,
            proof,
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
                        <label for='driver_name'>Driver Name:</label>
                        <input type='text' name='driver_Name' id='driver_name' placeholder='' required  value='${complaint.driver}' readonly>      
                    </div>
                    <div class='form-item'>
                        <img src="/assets/img/cus_complaints/${complaint.proof}"></img>        
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