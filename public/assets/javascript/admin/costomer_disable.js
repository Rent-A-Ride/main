import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
const vehicleDisableButtons = document.querySelectorAll(".disable_customer")

vehicleDisableButtons.forEach(function (btn) {
    btn.addEventListener("click", function () {
        
        const cusid=btn.dataset.cusid;
        const cusname=btn.dataset.cusname;
        

        const customer ={
            cusid,
           cusname
        };

        const viewdisable = htmlToElement(
            `<div class="modal-body">
                <div>
                    <p>Are You Sure You Want Disable ${customer.cusname}</p>
                    <div>
                        <form action="/admin/customer/disable" method="post" enctype="multipart/form-data" id="customer_disable">
                            <div> <input type="number" style="display:none" name='cus_Id' placeholder='' required  value='${customer.cusid}' /> </div>
                            <div class="flex-centered-y justify-between mt-4">
                                <button class="btn btn--thin" id="customer-disable-modal-btn" style="background-color:green" type="button">
                                    Confirm
                                </button>
                
                            </div>
                        </form
                    </div>
                </div>
            </div>`
        );

        const submitButton = viewdisable.querySelector('#customer-disable-modal-btn');
        submitButton.addEventListener('click', function() {
            const form = viewdisable.querySelector('#customer_disable');
            form.submit();
        });
        
        Modal.show({
            
            key:"viewcomplaintProof",
            content: viewdisable,
            closable: true,
        });
        // console.log("kalana");
    })
})