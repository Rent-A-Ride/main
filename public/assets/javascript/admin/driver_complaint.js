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
                <strong>${complaint.comid}</strong>
                <strong>${complaint.customer}</strong>
                <strong>${complaint.driver}</strong>
                <img src="/assets/img/VehicleComplaintProof/${complaint.proof}"></img>
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