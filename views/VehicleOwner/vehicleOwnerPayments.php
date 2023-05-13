<?php 



?>


<div class="review-container">
        <div class="review-head-topic">
            <h2 class="topic"><center>Invoices</center></h2>
        </div>
        <div class="show-rew">
            <table class="rew-show">
                <thead>
                <tr>
                  <th>Year</th>
                  <th>Month</th>
                  <th>Invoice</th>
                  <th>Payment Status</th>
                  <th>Amount</th>
                  <th>Payment Slip</th>
                  
                </tr>
                </thead>

                
                <?php
              

              if ($vownerp){
                  foreach ($vownerp as $row){

                     foreach ($vownerinv as $a){
                      $payment_date_string = $row['month']; // example date string in "YYYY-MM-DD" format
                      $Paymonth = date("m", strtotime($payment_date_string)); // get the month from the date string
                      $payyear = date('Y', strtotime($payment_date_string)); 
                      $inv_date_string = $a['date']; // example date string in "YYYY-MM-DD" format
                      $invmonth = date("m", strtotime($inv_date_string)); // get the month from the date string
                      $invyear = date('Y', strtotime($inv_date_string)); 
                      if ($row['vo_Id']==$a['vo_ID']&& $Paymonth==$invmonth && $payyear==$invyear){
            ?>
                <tboady>
                <tr>
                    <td><?php echo $invyear ?></td>
                    <td><?php echo $invmonth ?></td>
                    <td><a href="/assets/Invoice/DriverInvoice/<?= $a['invoice']  ?>" download>Invoice</a></td>
                    <?php if ($row['pay_status']==0) {
                      ?>
                      <td>Pending</td>
                    <?php
                    }else {

                    ?>
                      <td>Paied</td>
                    <?php
                    }
                    ?>
                    
                    <td><?php echo $row["vownerAmount"] ?></td>
                    <td><a href="/assets/img/PaymentSlip/<?= $row['Payment_slip']  ?>" download>Payment Slip</a></td>
                    <!-- <td>
                      <div class="invoice-item">
                          <div class="invoice-item-header">
                            Invoice #1
                            <div class="invoice-item-dropdown-icon" onclick="toggleDetails(event)">
                              &#x25BC;
                            </div>
                          </div>
                          <div class="invoice-item-details">
                            <p>Customer Name: John Doe</p>
                            <p>Invoice Date: 01/01/2022</p>
                            <p>Amount: $100.00</p>
                          </div>
                      </div>


                      <script>
                          function toggleDetails(event) {
                          const details = event.target.parentNode.nextElementSibling;
                          if (details.style.display === 'none') {
                              details.style.display = 'block';
                              event.target.innerHTML = '&#x25B2;';
                          } else {
                              details.style.display = 'none';
                              event.target.innerHTML = '&#x25BC;';
                          }
                          }

                      </script>

                    </td> -->

                </tr>
                </tboady>

              <?php
                      }
                     }
                     }
                  }
                ?>

              </table>
            

        </div>
</div>


