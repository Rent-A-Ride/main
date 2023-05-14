
<?php

?>
<section class="requests">

    <div class="topnav">

        <a  href="/driver/requests">Pending Requests</a>
        <a href="/driver/driver_AcceptedRequest">Accepted Requests</a>
        <a id="active" href="/driver/driver_RejectedRequests">Rejected Requests</a>


    </div>


    <div class="requests-list">


        <table class="table">

            <thead>
            <tr>
                <th>Reservation ID</th>
                <th>Customer Name</th>
                <th>Contact Number</th>
                <th>Pick-up</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Destination</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>

            <?php
              

              if ($driver):
                  foreach ($driver as $row):
                    if($row["accept"]==2):

//                       print_r($row);
            ?>

            <tr>
                    <td><?php echo $row["reservation_id"] ?></td>
                    <td><?php echo $customer[$row['user_ID']]->getFirstname().' '.$customer[$row['user_ID']]->getLastname() ?></td>
                    <td><?php echo $customer[$row['user_ID']]->getPhoneno() ?></td>
                    <td><?php echo $row["pickup_location"] ?></td>
                    <td><?php echo $row["start_date"] ?></td>
                    <td><?php echo $row["end_date"] ?></td>
                    <td><?php echo $row["destination"] ?></td>
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
            <?php
                endif;
                endforeach;
                endif;
                ?>


            </tbody>
        </table>
    </div>
</section>
</section>
</div>