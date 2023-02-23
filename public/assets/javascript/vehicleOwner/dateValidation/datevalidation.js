

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
        $("#TxtFrom1") .datepicker({

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
        $("#TxtTo1") .datepicker({

            numberOfMonths: 1,
            dateFormat : 'DD,d MM,yy',
            onSelect : function(selectdate) {
                var dt=new Date(selectdate);
                dt.setDate (dt.getDate()-1)
                $("#TxtFrom").datepicker("option","maxDate",dt);

            }
        });

});
