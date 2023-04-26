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
                    
                      <button class="submit-btn" onclick="openModal()" >View</button>
                      

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
