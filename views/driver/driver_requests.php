       
    <div class="req-container">
        <div class="head-topic">
            <h2 class="topic"><center>Requests</center></h2>
        </div>
       
        <div class="show-req">
            <table class="req-show">
                <thead>
                <tr>
                  <th>Reservation ID</th>
                  <th>Customer Name</th>
                  <th>Contact Number</th>
                  <th>Pick-up</th>
                  <th>Destination</th>
                  <th>Total Distance(Two way)</th>
                  <th></th>
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
                    <td><?php echo $row["customer_name"] ?></td>
                    <td><?php echo $row["contact_no"] ?></td>
                    <td><?php echo $row["pick_up"] ?></td>
                    <td><?php echo $row["Destination"] ?></td>
                    <td><?php echo $row["TotalDistance"] ?></td>
                    <td class="req-btnName">
                    <?php
                    $status= $row["accept"];
                    if($status===1):
                        echo "Accepted";
                    endif;
                    if($status===2):
                        echo "Rejected";
                    endif;
                    if($status===0):

                     ?>
                        <div class ="req-btns"> 
                            <form style= "padding:0 0rem" action="" method="post">
                                <input type="text" name="action" value="Accept" hidden>
                                <input type="text" name="res_id" value="<?=$row["reservation_id"]?>" hidden>
                                <input class="accept" type="submit" value="Accept">
                            </form>
                            <form style= "padding:0 0rem" action="" method="post">
                                <input type="text" name="action" value="Reject" hidden>
                                <input type="text" name="res_id" value="<?=$row["reservation_id"]?>" hidden>
                                <input class="reject" type="submit" value="Reject">
                            </form>
                        </div>

                       
                        <?php
                        endif;
                        ?>

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

    <!-- <div class="accepted-requests">
        <h2>Accepted Requests</h2>
        <ul></ul>
    </div>

    <div class="rejected-requests">
        <h2>Rejected Requests</h2>
        <ul></ul>
    </div> -->

