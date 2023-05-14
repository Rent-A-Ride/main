import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
const vehicleComplaintResolveButtons = document.querySelectorAll(".vehicleComplaintresolve")

vehicleComplaintResolveButtons.forEach(function (btn) {
    btn.addEventListener("click", function () {
        const comid=btn.dataset.compalintid;
        const cusid=btn.dataset.customerid;
        const tableRow=btn.parentElement.parentElement;
        const customerName=tableRow.querySelector('td:nth-child(2)');
        const customer=customerName.textContent;
        const vehicleNo=tableRow.querySelector('td:nth-child(3)');
        const veh_no=vehicleNo.textContent;
        // const proof = btn.dataset.proof;
       
        const complaint ={
            comid,
            customer,
            veh_no,
            cusid
            
        };


        const viewcomplaintResolve = htmlToElement(
            `<div class="modal-body">
            <div class="modal-header">
                <h3>
                Send Notification  
                </h3>
            <button class="modal-close-btn" onclick="location.href='/admin/vehicleComplaint'">
                <i class="fas fa-times"></i>
            </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data" id="vehicle-complaint-resolve">
            

            <div class="grid gap-4">
            
            <div class='form-item'>
                    <label for='com_ID'>Complaint No:</label>
                    <input type="text" name='com_ID' id='com_no' placeholder='' required  value='${complaint.comid}' readonly />
            </div>
            <div> <input type="number" style="display:none" name='cus_ID' placeholder='' required  value='${complaint.cusid}' /> </div>

            <div class='form-item'>
                    <label for='cus_Name'>Customer Name:</label>
                    <input type='text' name='cus_Name' id='customer_name' placeholder='' required  value='${complaint.customer}' readonly>
            </div>

            <div class='form-item'>
                    <label for='vehicle_No'>Vehicle No:</label>
                    <input type='text' name='vehicle_No' id='driver_name' placeholder='' required  value='${complaint.veh_no}' readonly>      
            </div>
            <div class='form-item'>
                    <label for='action'>Message:</label> 
                    <textarea rows="4" cols="50" name="action">
                        
                    </textarea>     
            </div>
            
            
            </div>

            <div class="flex-centered-y justify-between mt-4">
                
                <button class="btn btn--thin" id="vehicle-complaint-resolve-modal-btn" type="button">
                    Submit
                </button>
                
            </div>
        </form>
                
            </div>`
        );

        
        const submitButton = viewcomplaintResolve.querySelector('#vehicle-complaint-resolve-modal-btn');
        submitButton.addEventListener('click', function() {
            const form = viewcomplaintResolve.querySelector('#vehicle-complaint-resolve');
            form.submit();
        });

        
        Modal.show({
            
            key:"viewcomplaintResolve",
            content: viewcomplaintResolve,
            closable: false,
        });
        
        // console.log("kalana");
    })
})