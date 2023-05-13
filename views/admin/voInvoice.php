<div class="invoice-heder-container">
      <div class="invoice-heder-container-invoice">
        <div>
          <h1>INVOICE</h1>
        </div>
          
      </div>
      <div class="invoice-heder-container-details">
          <div class="invoice-heder-container-details-container">
            <!-- <h2>About Us</h2> -->
            <p><i class="fa-solid fa-at"></i> Email: askrenaride@gmail.com</p>
            <p><i class="fa-solid fa-phone-volume"></i> Phone: 0716894655</p>
            <p><i class="fa-solid fa-map-location-dot"></i> Address: Rent-A-Ride, Colombo 05</p>
          </div>
      </div>
      <div class="invoice-heder-container-contact">
        <div class="invoice-heder-container-details-container">
          
        </div>
      </div>
      <div class="invoice-heder-container-follow">
        <p><i class="fa-brands fa-facebook-f"></i>/rentAride</p>
        <p><i class="fa-brands fa-twitter"></i><i class="fa-solid fa-at"></i>rentaride</p>
        <p><i class="fa-brands fa-instagram"></i><i class="fa-solid fa-at"></i>rentAride</p>
      </div>
  </div>
  <div class="invoice-vowner-details">
     <div class="invoice-vowner-details-h">
        <h3>Vehicle Owner Name:</h3>
        <h3>Vehicle Owner Address:</h3>
     </div>
     <div class="invoice-vowner-details-d">
      <h3><?= $vowner[0]['owner_Fname'].' '.$vowner[0]['owner_Lname'] ?> </h3>
      <h3><?= $vowner[0]['owner_address'] ?></h3>
   </div>
  </div>
  <?php if ($vehicle) {
    
    $data=array();
            foreach($vehicle as $row){
                $data[$row['veh_Id']]=0;
                ?>
            
  <div class="invoice-items">
    <div class="invoice-items-voName">
        <p><?= $row['plate_No'] ?></p>    
    </div>
    <table>
      <thead>
        <tr>
          <th>Pick Up Location</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Destination</th>
          <th>Total Rent</th>
          <th>System Commission</th>
          <th>Your Amount</th>
        </tr>
      </thead>
            <?php 
            // var_dump($veh_booking);
            // exit;
                foreach($veh_booking as $veh){
                    if ($veh['veh_Id']==$row['veh_Id']) {
                        # code...
                   
            ?>
      <tbody>
        <tr>
          <td><?= $veh['pickupLocation'] ?></td>
          <td><?= $veh['startDate'] ?></td>
          <td><?= $veh['endDate'] ?></td>
          <td><?= $veh['Destination'] ?></td>
          <?php 
        $price = $row['price'];
          // Two sample dates as strings
        $date_str1 = $veh['startDate'];
        $date_str2 = $veh['endDate'];

        // Convert the date strings to DateTime objects
        $date1 = new DateTime($date_str1);
        $date2 = new DateTime($date_str2);

        // Calculate the difference between the two dates
        $interval = $date1->diff($date2);
        $total=$interval->days*$price;
        $comission = $total*0.2;
        $amount=$total-$comission;
        $data[$row['veh_Id']]=$data[$row['veh_Id']]+$amount;
         ?>
          <td><?= $total ?></td>
          <td><?= $comission ?></td>
          <td><?= $amount ?></td>
        </tr>
        <?php 
                    }
                }
                ?>
        <tr>
            <td colspan="6">Total</td>
            <td><?= $data[$row['veh_Id']];  ?></td>
        </tr>
      </tbody>
      
    </table>
  </div>
  <?php 
            }
        }
        ?>
    <?php 
    $total= array_sum($data);
    ?>
  <div class="voinvoiceTotal">
      <div class="voinvoiceTotaltotal">
        <b> Total : </b>
      </div>
      <div class="voinvoiceTotalValue">
        <b> <?= $total ?></b>
      </div>
   
  </div>
  <div>
    <button class="book-button createPdf">PDF</button>
  </div>
