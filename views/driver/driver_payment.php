<div class="review-container">
        <div class="review-head-topic">
            <h2 class="topic"><center>Invoices</center></h2>
        </div>
        <div class="show-rew">
            <table class="rew-show">
                <thead>
                <tr>
                  <th>Document name</th>
                  <th>Invoice number</th>
                  <th>Date</th>
                  <th>Period</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
                </thead>

                
                <?php
              

              if ($driver){
                  foreach ($driver as $row){

//                       print_r($row);
            ?>
                <tboady>
                <tr>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["invoice_no"] ?></td>
                    <td><?php echo $row["payment_date"] ?></td>
                    <td><?php echo $row["period"] ?></td>
                    <td><?php echo $row["Amount"] ?></td>
                    <td>
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

                    </td>

                </tr>
                </tboady>

              <?php
                  }
                ?>

              </table>
            

        </div>
</div>

<?php
    }
?>
