<!--new view-->

<?php

/* @var $vehicle vehicle */

use app\models\vehicle;

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

<!--<button class="add-new-veh-button" onclick="location.href='/vehicleOwner/addNewVehicle'"> <i class='bx bx-plus  ' ></i> Add New <i class='bx bx-car'></i></button>-->






<!-- Table -->
<h2 class="page-name">Payments</h2>


<div class="table-container">
    <div id="table" class="table">
        <div class="table-header">
<!--            <div class="header__item"><a id="name" class="filter__link" href="#"></a></div>-->
            <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#"> Year</a></div>

            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Month</a></div>
            <!--             <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#"></a></div>-->
            <!--            <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Status</a></div>-->

            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Invoice</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Payment Status</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Amount</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Payment Slip</a></div>



        </div>
        <div class="table-content" >
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
            <div class="table-row">

                <div class="table-data"><?php echo $invyear ?></div>
                <div class="table-data"><?php echo $invmonth ?></div>
                <div class="table-data"><a href="/assets/Invoice/DriverInvoice/<?= $a['invoice']  ?>" download>Invoice</a></div>
                                    <?php if ($row['pay_status']==0) {
                                        ?>
                                        <div class="table-data"><span class="status-txt pending">Pending!</span></div>
                                        <?php
                                    }else {

                                        ?>
                                        <div class="table-data"><span class="status-txt confirmed">Completed!</span></div>
                                        <?php
                                    }
                                    ?>
                                    <div class="table-data"><?php echo $row["vownerAmount"] ?></div>
                                    <div class="table-data"><a href="/assets/img/PaymentSlip/<?= $row['Payment_slip']  ?>" download>Payment Slip</a></div>





                                </tr>
                            </tboady>

                            <?php
                        }
                    }
                }
            }
            ?>

        </div>
    </div>
</div>

