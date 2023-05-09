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
        <h3>Driver Name:</h3>
        <h3>Driver Address:</h3>
     </div>
     <div class="invoice-vowner-details-d">
      <h3><?= $driver[0]['driver_Fname'].' '.$driver[0]['driver_Lname'] ?></h3>
      <h3><?= $driver[0]['address'] ?></h3>
   </div>
  </div>
            
  <div class="invoice-items">
    <table>
      <thead>
        <tr>
          <th>Pick Up Location</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Destination</th>
          <th>Driving Fee</th>
        </tr>
      </thead>
            <?php 
            $totalfee=0;
            foreach($requests as $req){
                
                        # code...
                   
            ?>
      <tbody>
        <tr>
          <td><?= $req['pickupLocation'] ?></td>
          <td><?= $req['startDate'] ?></td>
          <td><?= $req['endDate'] ?></td>
          <td><?= $req['Destination'] ?></td>
          <?php 
        $price = 1000;
          // Two sample dates as strings
        $date_str1 = $req['startDate'];
        $date_str2 = $req['endDate'];

        // Convert the date strings to DateTime objects
        $date1 = new DateTime($date_str1);
        $date2 = new DateTime($date_str2);

        // Calculate the difference between the two dates
        $interval = $date1->diff($date2);
        $total=$interval->days*$price;
        $totalfee=$totalfee+$total;
         ?>
          <td><?= $total ?></td>
        </tr>
        <?php 
                    
                }
                ?>
        <tr>
            <td colspan="4">Total</td>
            <td><?= $totalfee  ?></td>
        </tr>
      </tbody>
      
    </table>
  </div>
  
  <div>
    
  Total = <?= $totalfee ?>
  </div>

  <div>
    <button class="book-button createPdf">PDF</button>
  </div>
