import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
const driverComplaintResolveButtons = document.querySelectorAll(".driver_complaintResolve")


driverComplaintResolveButtons.forEach(function (btn) {
    btn.addEventListener("click", function () {
        const comid=btn.dataset.compalintid;
        const customerid=btn.dataset.customerid;
        const driverid=btn.dataset.driverid;

        const tableRow=btn.parentElement.parentElement;
        const customerName=tableRow.querySelector('td:nth-child(2)');
        const customer=customerName.textContent;
        const driverName=tableRow.querySelector('td:nth-child(3)');
        const driver=driverName.textContent;
        // const proof = btn.dataset.driverproof;

        const complaint ={
            comid,
            customerid,
            driverid,
            driver,
            customer,
            
        };

        const viewcomplaintResolve = htmlToElement(
            `<div class="modal-body">
                <div class="modal-header">
                    <h3>
                        Send Notification  
                    </h3>
                    <button class="modal-close-btn"  onclick="location.href='/admin/driverComplaint'">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <form action="/admin/driverComplaint" method="post" enctype="multipart/form-data" id="driver-complaint-resolve">
                        
        
                        <div class="grid gap-4">
                        
                        <div class='form-item'>
                                <label for='com_nID'>Complaint No:</label>
                                <input type='number' name='com_ID' id='com_no' placeholder='' required  value='${complaint.comid}' readonly>
                        </div>
                        <div> <input type='number' style="display:none" name='cus_ID' id='com_no' placeholder='' required  value='${complaint.customerid}' readonly></div>

                        <div class='form-item'>
                                <label for='customer_name'>Customer Name:</label>
                                <input type='text' name='cus_Name' id='customer_name' placeholder='' required  value='${complaint.customer}' readonly>
                        </div>
                        <div> <input type='number' style="display:none" name='driver_ID' id='com_no' placeholder='' required  value='${complaint. driverid}' readonly></div>

                        <div class='form-item'>
                                <label for='driver_name'>Driver Name:</label>
                                <input type='text' name='driver_Name' id='driver_name' placeholder='' required  value='${complaint.driver}' readonly>      
                        </div>
                        <div class='form-item'>
                                <label for='message'>Message:</label> 
                                <textarea rows="4" cols="50" name="action">
                                    
                                </textarea>     
                        </div>
                        
                        
                        </div>
        
                        <div class="flex-centered-y justify-between mt-4">
                            
                            <button class="btn btn--thin" id="driver-complaint-resolve-modal-btn" type="button">
                                Submit
                            </button>
                            
                        </div>
                    </form>
                
            </div>`
        );

        const submitButton = viewcomplaintResolve.querySelector('#driver-complaint-resolve-modal-btn');
        submitButton.addEventListener('click', function() {
            const form = viewcomplaintResolve.querySelector('#driver-complaint-resolve');
            form.submit();
        });
        
        Modal.show({
            
            key:"viewcomplaintProof",
            content: viewcomplaintResolve,
            closable: false,
        });
        

    })
        // console.log("kalana");
       

})

