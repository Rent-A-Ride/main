<h2 class="renew-page-name">Update Vehicle Documents</h2>

<div class="doc-update-container">

    <div class="documents">
        <div class="doc-update-buttons">
            <button class="update-button">Renew License Document</button>

            <button class="update-button">Renew Eco Test Document</button>

            <button class="update-button">Renew Insurance Document</button>
        </div>
    </div>


    <div class="wrapper-container">
        <div  class="wrapper">
            <form action="" method="post" class="form_1">
                <h3>Renew Eco Test Details</h3>
                <div class="inputBox">

                    <label for="vehicleno">Vehicle No:</label>
                    <input type="text" id="vehicleno" name="vehicleno" required>

                    <label for="Ecotestreceipt">Scanned Copy of Eco Test Receipt</label>

                    <input type="file" accept="image/*" id="Ecotestreceipt" name="Ecotestreceipt" required>
                </div>



                <!--  DATE VALIDATION ~ CSS PART TO BE ADDED-->

                From Date : <input id="TxtFrom">
                To Date : <input id="TxtTo">
                <script>

                    $(function() {

                        $("#TxtFrom") .datepicker({

                            numberOfMonths: 1,
                            dateFormat : 'DD,d MM,yy',
                            onSelect : function(selectdate) {
                                var dt=new Date(selectdate);
                                dt.setDate (dt.getDate()+1)
                                $("#TxtTo").datepicker("option","minDate",dt);

                            }
                        });

                        $("#TxtTo") .datepicker({

                            numberOfMonths: 1,
                            dateFormat : 'DD,d MM,yy',
                            onSelect : function(selectdate) {
                                var dt=new Date(selectdate);
                                dt.setDate (dt.getDate()-1)
                                $("#TxtFrom").datepicker("option","maxDate",dt);

                            }
                        });

                    });
                </script>

                <div>
                    <button type="submit" class="btn" onclick="location.href='/vehicleowner_vehicle'">Submit</button>
                </div>

            </form>
        </div>


    </div>

</div>