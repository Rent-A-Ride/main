import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
const confirmbtn = document.querySelectorAll(".payment-confirm");
const confirmdbtn = document.querySelectorAll(".payment-confirmd")

confirmbtn.forEach(function (btn) {
    btn.addEventListener("click", function () {
        
        const vo_id=btn.dataset.vo_id;
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
    });

    
confirmdbtn.forEach(function (btn) {
        btn.addEventListener("click", function () {
        
        const vo_id=btn.dataset.vo_id;
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