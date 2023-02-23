<div class="body">       
    <section id="rest">        
        <div class="complaintlist-table">
            <table>
                <thead>
                <th>No</th>
                <th>Complaint ID</th>
                <th>Customer Name</th>
                <th>Driver Name</th>
                <th>Complaint</th>
                </thead>
                <tbody>
                <?php
                $num=1;
                
                if ($complaint){
                   foreach ($complaint as $row){

//                       print_r($row);
                ?>
                    <tr>
                        <td><?php echo($num); ?></td>
                        <td><?php echo($row['com_ID']); ?></td>
                        <td><?php echo($row['cus_Name']); ?></td>
                        <td><?php echo($row['driver_Name']); ?></td>
                        <td><?php echo($row['complaint']); ?></td>
                    </tr>

                <?php
                  $num=$num+1;
                   }
                }
                ?>
                
                </tbody>
            </table>
        </div>
    </section>
</div>