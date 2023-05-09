import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
const confirmbtn = document.querySelectorAll(".payment-confirm");
const confirmdbtn = document.querySelectorAll(".payment-confirmd")

confirmbtn.forEach(function (btn) {
    btn.addEventListener("click", function () {
        
        const vo_id=btn.dataset.vo_id;
        const month=btn.dataset.month;
        console.log(vo_id);

        const vehicle ={
            vo_id
        };

        const confirmpayment = htmlToElement(
            `<div class="modal-body">
                <div>
                    <p>Are You Sure? You paied Rent Successfully??</p>
                    <div>
                        <form action="/admin/managepayment" method="post" enctype="multipart/form-data" id="confirm_vehPayment">
                            <div> <input type="number" style="display:none" name='vo_Id' placeholder='' required  value='${vehicle.vo_id}' /> </div>
                            <div> <input type="text" style="display:none" name='month' placeholder='' required  value='${vehicle.month}' /> </div>
                            <div> 
                                <label for="invoice"><h3>Invoice:</h3></label>
                                <input type="file"  name="invoice"/> 
                            </div>
                            <div> 
                                <label for="pay_proof"><h3>Payment Slip:</h3></label>
                                <input type="file"  name="pay_proof" /> 
                            </div>
                            <div class="flex-centered-y justify-between mt-4">
                                <button class="btn btn--thin" id="payment-confirm-modal-btn" style="background-color:green" type="button">
                                    Confirm
                                </button>
                
                            </div>
                        </form>
                    </div>
                </div>
            </div>`
        );

        const submitButton = confirmpayment.querySelector('#payment-confirm-modal-btn');
        submitButton.addEventListener('click', function() {
            const form = confirmpayment.querySelector('#confirm_vehPayment');
            form.submit();
        });
        
        Modal.show({
            
            key:"vehicledisable",
            content: confirmpayment,
            closable: true,
        });
        // console.log("kalana");
    });

    
confirmdbtn.forEach(function (btn) {
        btn.addEventListener("click", function () {
        
        const vo_id=btn.dataset.vo_id;
        const month=btn.dataset.month;
        console.log(vo_id);

        const vehicle ={
            vo_id,
            month
        };

        const confirmpayment = htmlToElement(
            `<div class="modal-body">
                <div>
                    <p>Are You Sure? You paied Rent Successfully??</p>
                    <div>
                        <form action="/admin/managepayment" method="post" enctype="multipart/form-data" id="confirm_vehPayment">
                            <div> <input type="number" style="display:none" name='vo_Id' placeholder='' required  value='${vehicle.vo_id}' /> </div>
                            <div> <input type="text" style="display:none" name='month' placeholder='' required  value='${vehicle.month}' /> </div>
                            <div> 
                                <label for="invoice"><h3>Invoice:</h3></label>
                                <input type="file"  name="invoice" class="input"> 
                            </div>
                            <div> 
                                <label for="pay_proof"><h3>Payment Slip:</h3></label>
                                <input type="file"  name="pay_proof" class="input"> 
                            </div>
                            <div class="flex-centered-y justify-between mt-4">
                                <button class="btn btn--thin" id="payment-confirm-modal-btn" style="background-color:green" type="button">
                                    Confirm
                                </button>
                
                            </div>
                        </form
                    </div>
                </div>
            </div>`
        );

        const submitButton = confirmpayment.querySelector('#payment-confirm-modal-btn');
        submitButton.addEventListener('click', function() {
            const form = confirmpayment.querySelector('#confirm_vehPayment');
            form.submit();
        });
        
        Modal.show({
            
            key:"vehicledisable",
            content: confirmpayment,
            closable: true,
        });
        // console.log("kalana");
    })
})
});