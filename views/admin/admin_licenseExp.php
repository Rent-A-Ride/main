<div class="body">  
    <section id="rest">
        <div class="complaintlist-table">
            <table>
                <thead>
                <th>No</th>
                <th>Vehicle No</th>
                <th>Vehicle Owner Name</th>
                <th>Vehicle Owner Email</th>
                <th>Expiaring Date</th>
                <th>Send</th>
                
                <!-- <th>Status</th> -->
                </thead>
                <tbody>
                <?php
                $num=1;
                
                if ($complaint){
                    // var_dump($complaint);
                    // die();
                   foreach ($complaint as $row){
                    $string_date = $row['ex_date']; // A string representing a date
                    $dateObject = date("Y-m-d",strtotime($string_date));
                    // echo gettype($dateObject);
                    var_dump($dateObject);
                    
                    die();
                    $period=$date-strtotime($row['ex_date']);
                    $year = (int)date('Y', $period); // extract the year from the timestamp
                    $month = (int)date('m', $period); // extract the month from the timestamp
                    $day = (int)date('d', $period);
                    if ($year==0 && $month==0 && $day<=7) {
                        # code...
                    
//                 
                ?>
                    <tr>
                        <td><?php echo($num); ?></td>
                        <td><?php echo($row['plate_No']); ?></td>
                        <td><?php echo($row['owner_Fname'].' '.$row['owner_Lname']); ?></td>
                        <td><?php echo($row['email']); ?></td>
                        <td><?php echo($row['ex_date']); ?></td>
                        <td></td>
                    </tr>

                <?php
                  $num=$num+1;
                    }
                   }
                }
                ?>
                </tbody>
            </table>
        </div>
    </section>
</div>