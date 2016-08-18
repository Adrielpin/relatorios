//seleção de contas   
$('#contas,#tipo').change(function(){
    var conta=$('#contas').val();
    var rede=$('#tipo').val();

    $('#camp-from').empty().append('<option>Aguarde...<option>');
    $('#camp-to').empty();

    $.post('acoes/GetCampaigns.php', {'conta': conta, 'rede':rede}, function (response) {
        $('#camp-from').empty().append(response);
        $('#camp-to').empty();
        $('#group-from').empty().append('<option value="">Selecione uma campanha</option>');
        $('#group-to').empty();
        $('#word-from').empty().append('<option value="">Selecione um grupo</option>');
        $('#word-to').empty();
        $optsCamp = $("#camp-from option");
    });
});


//Seleção de campanhas
// Filtro

$("#camp-filter").keyup(function () {
    var searchString = $(this).val().toLowerCase();
    $("#camp-from").empty().append($optsCamp);
    $optsCamp.each(function () {
        var text = $(this).text().toLowerCase();
        (text.indexOf(searchString) > -1) ? $(this).prop("disabled", false) : $(this).prop("disabled", true).detach();
    });
});


//Dual
$('#one-camp-to-right').click(function(){
    $('#group-from').empty().append('<option>Aguarde...<option>');
    var left = $(this).parent().parent().find('#camp-from option:selected');
    var right = $(this).parent().parent().find('#camp-to');
    right.append(left);
    $("#camp-to").append($("#camp-to option").remove().sort(function(a, b) {
        var at = $(a).text(), bt = $(b).text();
        return (at > bt)?1:((at < bt)?-1:0);
    }));
    $.post('acoes/GetAdGroups.php', {'contas':$('#contas').val(), 'camp':$("#camp-to").val()}, function (response) {
        $('#group-from').empty().append(response);
        $('#group-to').empty();
        $optsGroup = $("#group-from option");
    });
});

$('#all-camp-to-right').click(function(){
    $('#group-from').empty().append('<option>Aguarde...<option>');
    $("#camp-from").find("option").appendTo("#camp-to");
    $("#camp-to").append($("#camp-to option").remove().sort(function(a, b) {
        var at = $(a).text(), bt = $(b).text();
        return (at > bt)?1:((at < bt)?-1:0);
    }));
    $.post('acoes/GetAdGroups.php', {'contas':$('#contas').val(), 'camp':$("#camp-to").val()}, function (response) {
        $('#group-from').empty().append(response);
        $('#group-to').empty();
        $optsGroup = $("#group-from option");
    });
});

$('#one-camp-to-left').click(function(){
    $('#group-from').empty().append('<option>Aguarde...<option>');
    var left = $(this).parent().parent().find('#camp-from');
    var right = $(this).parent().parent().find('#camp-to option:selected');
    left.append(right);
    $("#camp-from").append($("#camp-from option").remove().sort(function(a, b) {
        var at = $(a).text(), bt = $(b).text();
        return (at > bt)?1:((at < bt)?-1:0);
    }));
    $.post('acoes/GetAdGroups.php', {'contas':$('#contas').val(), 'camp':$("#camp-to").val()}, function (response) {
        $('#group-from').empty().append(response);
        $('#group-to').empty();
        $optsGroup = $("#group-from option");
    });
});

$('#all-camp-to-left').click(function(){
    $('#group-from').empty().append('<option>Aguarde...<option>');
    $("#camp-to").find("option").appendTo("#camp-from");
    $("#camp-from").append($("#camp-from option").remove().sort(function(a, b) {
        var at = $(a).text(), bt = $(b).text();
        return (at > bt)?1:((at < bt)?-1:0);
    }));
    $.post('acoes/GetAdGroups.php', {'contas':$('#contas').val(), 'camp':$("#camp-to").val()}, function (response) {
        $('#group-from').empty().append(response);
        $('#group-to').empty();
        $optsGroup = $("#group-from option");
    });
});