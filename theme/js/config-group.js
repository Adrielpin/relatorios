$("#group-filter").keyup(function () {
    var searchString = $(this).val().toLowerCase();
    $("#group-from").empty().append($optsGroup);
    $optsGroup.each(function () {
        var text = $(this).text().toLowerCase();
        (text.indexOf(searchString) > -1) ? $(this).prop("disabled", false) : $(this).prop("disabled", true).detach();
    });
});

//Dual
$('#one-group-to-right').click(function(){
    $('#word-from').empty().append('<option>Aguarde...<option>');
    var left = $(this).parent().parent().find('#group-from option:selected');
    var right = $(this).parent().parent().find('#group-to');
    right.append(left);
    $("#group-to").append($("#group-to option").remove().sort(function(a, b) {
        var at = $(a).text(), bt = $(b).text();
        return (at > bt)?1:((at < bt)?-1:0);
    }));
    $.post('acoes/GetKeywords.php', {'contas':$('#contas').val(), 'group':$("#group-to").val()}, function (response) {
        $('#word-from').empty().append(response);
        $('#word-to').empty();
        $optsWord = $("#word-from option");
    });
});

$('#all-group-to-right').click(function(){
    $('#word-from').empty().append('<option>Aguarde...<option>');
    $("#group-from").find("option").appendTo("#group-to");
    $("#group-to").append($("#group-to option").remove().sort(function(a, b) {
        var at = $(a).text(), bt = $(b).text();
        return (at > bt)?1:((at < bt)?-1:0);
    }));
    $.post('acoes/GetKeywords.php', {'contas':$('#contas').val(), 'group':$("#group-to").val()}, function (response) {
        $('#word-from').empty().append(response);
        $('#word-to').empty();
        $optsWord = $("#word-from option");
    });
});

$('#one-group-to-left').click(function(){
    $('#word-from').empty().append('<option>Aguarde...<option>');
    var left = $(this).parent().parent().find('#group-from');
    var right = $(this).parent().parent().find('#group-to option:selected');
    left.append(right);
    $("#group-from").append($("#group-from option").remove().sort(function(a, b) {
        var at = $(a).text(), bt = $(b).text();
        return (at > bt)?1:((at < bt)?-1:0);
    }));
    $.post('acoes/GetKeywords.php', {'contas':$('#contas').val(), 'group':$("#group-to").val()}, function (response) {
        $('#word-from').empty().append(response);
        $('#word-to').empty();
        $optsWord = $("#word-from option");
    });
});

$('#all-group-to-left').click(function(){
    $('#word-from').empty().append('<option>Aguarde...<option>');
    $("#group-to").find("option").appendTo("#group-from");
    $("#group-from").append($("#group-from option").remove().sort(function(a, b) {
        var at = $(a).text(), bt = $(b).text();
        return (at > bt)?1:((at < bt)?-1:0);
    }));
    $.post('acoes/GetKeywords.php', {'contas':$('#contas').val(), 'group':$("#group-to").val()}, function (response) {
        $('#word-from').empty().append(response);
        $('#word-to').empty();
        $optsWord = $("#word-from option");
    });
});