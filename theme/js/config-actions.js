$("#redefinir").click(function(){
    var senhaAntiga = $('#senha-antiga').val();
    var senhaNova = $('#senha-nova').val();
    if(senhaNova != $('#confirma-nova').val()){
        alert('senhas não conferem.');
        $('#senha-antiga').val('');
        $('#senha-nova').val('');
        $('#confirma-nova').val('');
    }

    else {
        $.post('conteudo/pass/pass.php', {'senhaAntiga':senhaAntiga, 'senhaNova':senhaNova}, function(response){
            alert('senha Alterada com sucesso!');
        });
        $('#senha-antiga').val('');
        $('#senha-nova').val('');
        $('#confirma-nova').val('');
    }
});
