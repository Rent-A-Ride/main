

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

    // Date Validation New

    // const startDateInput = document.getElementById('from-date');
    // const endDateInput = document.getElementById('to-date');
    // const today = new Date();
    // startDateInput.max = today.toISOString().slice(0, 10);
    //
    // startDateInput.addEventListener('change', function() {
    //     endDateInput.min = startDateInput.value;
    //     endDateInput.value = getOneYearAfter(startDateInput.value);
    //     endDateInput.disabled = false;
    // });
    //
    // endDateInput.addEventListener('change', function() {
    //     startDateInput.max = endDateInput.value;
    // });
    //
    // function getOneYearAfter(dateString) {
    //     const date = new Date(dateString);
    //     date.setFullYear(date.getFullYear()+1);
    //     return date.toISOString().slice(0, 10);
    // }
    //
    //


    // Date Validation New for any number of date inputs
    const startDateInputs = document.querySelectorAll('input[type="date"][id^="from-date"]');
    const endDateInputs = document.querySelectorAll('input[type="date"][id^="to-date"]');

    const today = new Date();

    for (let i = 0; i < startDateInputs.length; i++) {
        const startDateInput = startDateInputs[i];
        const endDateInput = endDateInputs[i];
            // endDateInput.disabled = false;I];

        startDateInput.max = today.toISOString().slice(0, 10);

        startDateInput.addEventListener('change', function() {
            endDateInput.min = startDateInput.value;
            endDateInput.value = getOneYearAfter(startDateInput.value);
            endDateInput.disabled = false;
        });

        endDateInput.addEventListener('change', function() {
            startDateInput.max = endDateInput.value;
        });
    }

    function getOneYearAfter(dateString) {
        const date = new Date(dateString);
        date.setFullYear(date.getFullYear() + 1);
        return date.toISOString().slice(0, 10);
    }
    teInput.min = startDateInput.value;
    endDateInput.value = getOneYearAfter(startDateInput.value);