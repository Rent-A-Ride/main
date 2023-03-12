var $rows = $('#table .table-row');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});


$("#filter button").each(function() {
    $(this).on("click", function(){
        var filtertag = $(this).attr('class');
        $('.table-row').show();
        $('.table-row:not(.' + filtertag + ')').hide();
    });
});