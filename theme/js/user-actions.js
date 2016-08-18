$('#usuarios-listar').click(function (){
	alert('here');
	$.post('conteudo/usuarios/listar.php',function(response){
            $('.col-3').html(response);
        });
});

$('#usuarios-adicionar').click(function (){
	alert('adicionar');
});


$('#usuarios-atualizar').click(function (){
	alert('atualizar');
});

$('#usuarios-remover').click(function (){
	alert('remover');
});