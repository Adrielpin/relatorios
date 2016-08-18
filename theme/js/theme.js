$(document).ready(function(){

    icon = $('[name=icon]');
    select = $('[name=icon-select]');
    $(select[0]).css({'background-color': '#00A99D'});

    var conta=$('#contas').val();
    var rede=$('#tipo').val();

    $.post('acoes/GetCampaigns.php', {'conta': conta, 'rede':rede}, function (response) {
        $('#camp-from').empty().append(response)
        $optsCamp = $("#camp-from option");
    });

    // função barra ocultar;
    $("#hide").click(function (){
        if($('#form').is(':visible')){
            $('#forms').hide(300);
            $('#seta-hide').css({ transform : 'rotate(180deg)' });
            $('.col-2').animate({width: '10px'});
        }

        else{
            $('#forms').show(300);
            $('#seta-hide').css({ transform : 'rotate(0deg)' });
            $('.col-2').animate({width: '204px'});
        }

    });

    //Botão relatório
    $(icon[0]).click(function (){
        $('.selector').css({'background-color': 'transparent'});
        $(select[0]).css({'background-color': '#00A99D'});
        $('#menu-2, #menu-3, #menu-4').hide();

        if ($('#menu-1').is(':visible')){
            $('#forms').hide(300);
            $('#seta-hide').css({ transform : 'rotate(180deg)' });
            $('.col-2').animate({width: '10px'});
        }

        else {
            $('#forms').show(300);
            $('#seta-hide').css({ transform : 'rotate(0deg)' });
            $('#menu-1').show(300);
            $('.col-2').animate({width: '204px'});
        }
    });
/*
    //Botão usuarios
    $(icon[1]).click(function (){
        $('.selector').css({'background-color': 'transparent'});
        $(select[1]).css({'background-color': '#00A99D'});
        $('#menu-1, #menu-3, #menu-4').hide();

        if ($('#menu-2').is(':visible')){
            $('#forms').hide(300);
            $('#seta-hide').css({ transform : 'rotate(180deg)' });
            $('.col-2').animate({width: '10px'});
        }

        else {
            $('#forms').show(300);
            $('#seta-hide').css({ transform : 'rotate(0deg)' });
            $('#menu-2').show(300);
            $('.col-2').animate({width: '204px'});
        }
    });
*/
    //Botão config
    $(icon[2]).click(function (){
        $('.selector').css({'background-color': 'transparent'});
        $(select[2]).css({'background-color': '#00A99D'});
        $('#menu-1, #menu-2, #menu-4').hide();

        if ($('#menu-3').is(':visible')){
            $('#forms').hide(300);
            $('#seta-hide').css({ transform : 'rotate(180deg)' });
            $('.col-2').animate({width: '10px'});
        }

        else {
            $('#forms').show(300);
            $('#seta-hide').css({ transform : 'rotate(0deg)' });
            $('#menu-3').show(300);
            $('.col-2').animate({width: '204px'});
        }
    });
/*
    //Botão suporte
    $(icon[3]).click(function (){
        $('.selector').css({'background-color': 'transparent'});
        $(select[3]).css({'background-color': '#00A99D'});
        $('#menu-1, #menu-2, #menu-3').hide();

        if ($('#menu-4').is(':visible')){
            $('#forms').hide(300);
            $('#seta-hide').css({ transform : 'rotate(180deg)' });
            $('.col-2').animate({width: '10px'});
        }

        else {
            $('#forms').show(300);
            $('#seta-hide').css({ transform : 'rotate(0deg)' });
            $('#menu-4').show(300);
            $('.col-2').animate({width: '204px'});
        }
    });
*/
    //botão sair
    $('#sair').click(function(){
        var sair = confirm('Deseja realmente sair?');
        if(sair){
            window.location.href= "../logout.php";
        }

        else{
            event.preventDefault();
        }
    });

    $('#camp-show').click(function(){
        $('#drag-camp').show();
    });

    $('#fecha-camp,#camp-hide').click(function(){
        $('#drag-camp').hide();
    });

    $('#group-show').click(function(){
        $('#drag-group').show();
    });

    $('#fecha-group,#group-hide').click(function(){
        $('#drag-group').hide();
    });

    $('#word-show').click(function(){
        $('#drag-word').show();
    });

    $('#fecha-word,#word-hide').click(function(){
        $('#drag-word').hide();
    });


    $("#gerar").click(function (){

        var texto = "<div class='border' style='margin-top:200px; background-color: transparent;;'>"+
        "<div class='borda' style='background-color: transparent;'>"+
        "<div id='Progress'>"+
        "<div id='Bar'>"+
        "<div id='labelBar'></div>"+
        "</div>"+
        "</div>"+
        "<h5> Aguarde coletando dados de "+$('#contas option:selected').text()+"</h5></div>"+
        "</div>";

        $('.col-3').html(texto);

        var contas = $('#contas').val();
        var tipo = $('#tipo').val();
        var range = $('#range').val();
        var geo = $('#geo').val();
        var conta = $('#contas option:selected').text();
        var camp = $('#camp-to').val();
        var group = $('#group-to').val();
        var word = $('#word-to').val();
        var dt_ini = $('#dt_inicial').val();
        var dt_fin = $('#dt_final').val();
        var wordlabel = $('#word-to').text();
        wordlabel = wordlabel.replace('"','');
        wordlabel = wordlabel.replace('"','');
        wordlabel = wordlabel.replace('[','');
        wordlabel = wordlabel.replace(']','');

        var elem = document.getElementById("Bar"); 
        var width = Math.floor((Math.random() * 10) + 1);
        var id = setInterval(frame, 350);

        function frame() {
            if (width >= 99) {
                elem.style.backgroundColor = '#445c7f';
                clearInterval(id);
            }
            else {
                width = width+Math.floor((Math.random() * 3) + 1);
                if(width >= 1 && width <= 25){
                    elem.style.backgroundColor = '#b54450';
                }
                if(width >= 26 && width <= 50){
                    elem.style.backgroundColor = '#e6b54a';
                }
                if(width >= 51 && width <= 75){
                    elem.style.backgroundColor = '#369e4e';
                }
                if(width >= 76 && width <= 100){
                    elem.style.backgroundColor = '#445c7f';
                }
            }

            elem.style.width = width + '%'; 
            document.getElementById("labelBar").innerHTML = width + '%';
        }

        var reusult = $.post('conteudo/relatorio/file.php',{'contas':contas, 'conta':conta, 'tipo':tipo, 'range':range, 'dt_final':dt_fin, 'dt_inicial':dt_ini, 'geo':geo, 'camp':camp, 'group':group, 'word':word, 'wordlabel':wordlabel});

        reusult.done(function(response){
            width = 100;
            frame();
            setTimeout(function(){
                $('.col-3').html(response);
            }, 150);      
        });
    });

$("#show-Proj").click(function (){
    $('#bi-content').show();
    $('#relatorio-clinks').hide();
    $(".col-3").animate({ scrollTop: 0 }, "slow");
    $('title').html($('title').html().replace('Relatório','Projeção'));
});

$('#fecha-camp,#camp-hide').click(function(){
    $('#drag-camp').hide();
});

$("#show-Des").click(function (){
    $('#bi-content').hide();
    $('#relatorio-clinks').show();
    $(".col-3").animate({ scrollTop: 0 }, "slow");
    $('title').html($('title').html().replace('Projeção','Relatório'));
});
});