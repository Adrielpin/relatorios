$("#word-filter").keyup(function () {
    var searchString = $(this).val().toLowerCase();
    $("#word-from").empty().append($optsWord);
    $optsWord.each(function () {
        var text = $(this).text().toLowerCase();
        (text.indexOf(searchString) > -1) ? $(this).prop("disabled", false) : $(this).prop("disabled", true).detach();
    });
});


//Dual
$('#one-word-to-right').click(function(){
    $("#word-to option").remove();
    var left = $(this).parent().parent().find('#word-from option:selected');
    var right = $(this).parent().parent().find('#word-to');
    right.append(left);
    $("#word-to").append($("#word-to option").remove().sort(function(a, b) {
        var at = $(a).text(), bt = $(b).text();
        return (at > bt)?1:((at < bt)?-1:0);
    }));
});

$('#one-word-to-left').click(function(){
    var left = $(this).parent().parent().find('#word-from');
    var right = $(this).parent().parent().find('#word-to option:selected');
    left.append(right);
    $("#word-from").append($("#word-from option").remove().sort(function(a, b) {
        var at = $(a).text(), bt = $(b).text();
        return (at > bt)?1:((at < bt)?-1:0);
    }));
});