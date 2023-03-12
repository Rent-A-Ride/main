<div class="review-container">
        <div class="review-head-topic">
            <h2 class="topic"><center>Reviews</center></h2>
        </div>
        <div class="show-rew">
            <table class="rew-show">
                <thead>
                <tr>
                  <th>Reservation ID</th>
                  <th>Customer Name</th>
                  <th>Comment</th>
                  <th>Stars</th>
                </tr>
                </thead>

                
                <?php
              

              if ($driver){
                  foreach ($driver as $row){

//                       print_r($row);
            ?>
                <tboady>
                <tr>
                    <td><?php echo $row["reservation_id"] ?></td>
                    <td><?php echo $row["Customer_name"] ?></td>
                    <td><?php echo $row["comment"] ?></td>
                    <td><?php echo $row["points"] ?></td>

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