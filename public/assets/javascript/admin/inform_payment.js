
import {Modal} from "../component/Modal.js";
import {htmlToElement} from "../utils/index.js"
const inform_pay = document.querySelectorAll(".informPayment");


inform_pay.forEach(function (btn) {
    btn.addEventListener("click", function () {
        const cusid= btn.dataset.cusid;
        const cusname=btn.dataset.cusname;
        
        const payment ={
           cusid,
           cusname 
        };

        const profileform = htmlToElement(
            `<div id="profileModal" class="profileModal">
                <div class="modal-content">
                    <span class="close" >&times;</span>
                        <form action="/admin/manageCustomerPayment" method="post" class="up-profile" id="update_profile">
                            
        
                            <input style="display:none" value="${payment.cusid}" type="number" id="fname" name="cus_Id">
                            <label for="cus_name">Customer Name:</label>
                            <input value="${payment.cusname}" type="text" id="lname" name="cus_name">
        
                            <label for="msg">Message:</label>
                            <input value="" type="text" id="lname" name="msg">
        
                            <button  id="profile" value="Send>>">Send>></button>
                        </form>
                </div>
            </div>`
        );

        const updateconfirm = profileform?.querySelector("#profile");
        
        updateconfirm?.addEventListener("click",function(){

            const viewupdate = htmlToElement(
                `<div class="modal-body">
                    <div>
                        <p>Are You Sure You Want Update Details</p>
                        <div class="flex-centered-y justify-between mt-4">
                            <button class="btn btn--thin" id="update-confirm-btn" style="background-color:green" >
                                Confirm
                            </button>
                    
                        </div>
                    </div>
                </div>`
            );
            const confirm = viewupdate?.querySelector('#update-confirm-btn')
            confirm.addEventListener("click",function(){
                const form = profileform?.querySelector('#update_profile');
                form.submit();
            });
            
            Modal.show({
            
                key:"updatelin",
                content: viewupdate,
                closable: true,
            });

        });

        
        
        Modal.show({
            
            key:"profileform",
            content: profileform,
            closable: true,
        });
        
})
})



