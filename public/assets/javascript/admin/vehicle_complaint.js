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
                <strong>${complaint.comid}</strong>
                <strong>${complaint.customer}</strong>
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