import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
const driverComplaintResolveButtons = document.querySelectorAll(".license_exp")


driverComplaintResolveButtons.forEach(function (btn) {
    btn.addEventListener("click", function () {
        const voID=btn.dataset.voID;
        const veh_Id=btn.dataset.veh_Id;
        // const driverid=btn.dataset.driverid;

        const tableRow=btn.parentElement.parentElement;
        const veh_No=tableRow.querySelector('td:nth-child(2)');
        const plateNo=veh_No.textContent;
        console.log(plateNo);
        const ownerName=tableRow.querySelector('td:nth-child(3)');
        const owner=ownerName.textContent;
        const ownerEmail=tableRow.querySelector('td:nth-child(4)');
        const ownermail=ownerEmail.textContent;
        const exp_date=tableRow.querySelector('td:nth-child(5)');
        const exp=exp_date.textContent;
        const noof_date=tableRow.querySelector('td:nth-child(6)');
        const no_date=noof_date.textContent;
        // const proof = btn.dataset.driverproof;

        const complaint ={
            voID,
            veh_Id,
            plateNo,
            owner,
            ownermail,
            exp,
            no_date
            
        };

        const viewcomplaintResolve = htmlToElement(
            `<div class="modal-body">
                <div class="modal-header">
                    <h3>
                        Send Notification  
                    </h3>
                    <button class="modal-close-btn"  onclick="location.href='/admin/license_Exp'">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <form action="/admin/license_Exp" method="post" enctype="multipart/form-data" id="driver-complaint-resolve">
                        
        
                        <div class="grid gap-4">
                        <div> <input type='number' style="display:none" name='vo_ID' id='vo_ID' placeholder='' required  value='${complaint.voID}' readonly></div>
                        <div> <input type='number' style="display:none" name='veh_Id' id='veh_Id' placeholder='' required  value='${complaint.veh_Id}' readonly></div>
                        <div class='form-item'>
                                <label for='plate_No'>Vehicle No:</label>
                                <input type='text' name='plate_No' id='plate_No' placeholder='' required  value='${complaint.plateNo}' readonly>
                        </div>

                        <div class='form-item'>
                                <label for='owner'>Owner Name:</label>
                                <input type='text' name='owner' id='owner' placeholder='' required  value='${complaint.owner}' readonly>
                        </div>

                        <div class='form-item'>
                                <label for='owner_email'>Owner Email:</label>
                                <input type='text' name='owner_email' id='owner_email' placeholder='' required  value='${complaint.ownermail}' readonly>      
                        </div>

                        <div class='form-item'>
                                <label for='exp_date'>Expire Date:</label>
                                <input type='date' name='exp_date' id='exp_date placeholder='' required  value='${complaint.exp}' readonly>      
                        </div>
                        <div class='form-item'>
                                <label for='no_of_date'>No of Date/Expired:</label>
                                <input type='text' name='no_of_date' id='no_of_date' placeholder='' required  value='${complaint.no_date}' readonly>      
                        </div>
                        <div class='form-item'>
                                <label for='message'>Message:</label> 
                                <textarea  rows="4" cols="50" name="message">
                                    
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

