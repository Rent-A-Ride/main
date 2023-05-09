<?php
    use app\models\VehBooking;
/* @var $booking VehBooking */
?>

    <div class="complaint-wrapper-container">
        <div class="complaint-wrapper">
            <form method="post" class="form_1" enctype="multipart/form-data">
                <h2 class="complaint-form-title"> Customer Complaints </h2>
                <div class="complaint-inputBox">
                    <div class="complain-form">
                            <div class="form-group">
                                <label class="complaint-label" for="complaint-about">Complaint about:</label>
                                <select name="complaint-about" class="complaint-form" id="complaint-form" onchange="showAdditionalFields()" required>
                                    <option disabled selected value="">Select an option</option>
                                    <option value="vehicle-owner">Vehicle Owner</option>
                                    <option value="vehicle">Vehicle</option>
                                    <option value="driver">Driver</option>
                                    <option value="system">System</option>
                                </select>
                            </div>
                            <div class="form-group" id="additional-fields">
                                <!-- Additional fields will be added here dynamically -->
                            </div>
                            <div class="form-group">
                                <label for="complaint">Complaint:</label>
                                <textarea cols="5" name="complaint" class="form-control myTextArea" placeholder="What's the issue you had?" id="complaint" rows="3" required></textarea>
                            </div>
                        <div class="form-group">
                            <label for="images">Upload images (Optional):</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="images" name="images[]" multiple>
<!--                                <label class="custom-file-label" for="images">Choose files</label>-->
                            </div>
<!--                            Add an error-->
<!--                            <span class="error">--><?php //echo $complaint->errors; ?><!--</span>-->
                        </div>

                        <div class="output"></div>
                            <div class="btn-container">
                                <button name="submit" type="submit" class="complaint-submit-btn">Submit</button>
                            </div>
                    </div>
                </div>
            </form>
        </div>


    </div>


<script>
    function showAdditionalFields() {
        const complaintAbout = document.getElementById('complaint-form').value;
        const additionalFields = document.getElementById('additional-fields');

        // Remove any existing fields
        while (additionalFields.firstChild) {
            additionalFields.removeChild(additionalFields.firstChild);
        }

        // Add new fields based on the selected option
        if (complaintAbout === 'vehicle-owner') {
            const select = document.createElement('select');
            select.classList.add('complaint-form');
            select.setAttribute('name','vo_ID');
            select.innerHTML = `
        <option selected disabled value="">Select a vehicle owner from your last rides</option>
        <?php foreach ($bookings as $booking): ?>
        <option value="<?=$booking->getVoId()?>"><?= $vehOwners[$booking->getVoId()]->getOwnerFname().' '.$vehOwners[$booking->getVoId()]->getOwnerLname()?></option>
        <?php endforeach; ?>
      `;
            additionalFields.appendChild(select);
            additionalFields.style.display = 'block';
        } else if (complaintAbout === 'vehicle') {
            const select = document.createElement('select');
            select.classList.add('complaint-form');
            select.setAttribute('name','veh_Id');
            select.innerHTML = `
        <option value="" selected disabled>Select a vehicle</option>
        <?php foreach ($bookings as $booking): ?>
        <option value="<?=$booking->getVehId()?>"><?= $vehicles[$booking->getVehId()]->getPlateNo().' '.$vehicles[$booking->getVehId()]->getVehBrand().' '.$vehicles[$booking->getVehId()]->getVehModel()?></option>
        <?php endforeach; ?>
      `;
            additionalFields.appendChild(select);
            additionalFields.style.display = 'block';
        } else if (complaintAbout === 'driver') {
            const select = document.createElement('select');
            select.classList.add('complaint-form');
            select.innerHTML = `
        <option value="">Select a driver</option>
        <option value="driver1">Driver 1</option>
        <option value="driver2">Driver 2</option>
        <option value="driver3">Driver 3</option>
      `;
            additionalFields.appendChild(select);
            additionalFields.style.display = 'block';
        } else {
            additionalFields.style.display = 'none';
        }
    }
</script>
