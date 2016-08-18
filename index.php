<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex, nofollow" />
	<title>Relatórios Clinks</title>
	<link rel="stylesheet" type="text/css" href="theme/css/login.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<link rel="icon" href="favicon.ico" type="image/x-ico" >
	<script type="text/javascript">
	$(document).ready(function (){
		if(<?php echo $_SESSION["erro"] ?> == 1){
			$('#user').css('border-color', 'red');
			$('#password').css('border-color', 'red');
			$( "#error" ).show(300).fadeOut(5000);
		}
		if(<?php echo $_SESSION["erro"] ?> == 2){
			$('#user').css('border-color', 'red');
			$('#password').css('border-color', 'red');
			$( "#mensagens" ).append('SERVIÇO EM MANUTENÇÂO').fadeOut(5000);
		}
	});
	</script>
	<?php $_SESSION['erro'] = 0?>
</head>
<body>

	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5PXTF2"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5PXTF2');</script>
	<!-- End Google Tag Manager -->

	<div class='corp'>
		<img src='theme/img/LogoLogin.png' width='246' height='90' alt='LogoMarca'>

		<form id='entrar' action='login.php' method="post">
			<input placeholder="Usuário" type='Email' id='user' name='user' style="margin-top: 18px" />	
			<input placeholder="Senha" type='password' id='password' name='password' style=" margin-top: 29px"/>
			<input type='submit' value='Entrar' id='btn-entrar' style=" margin-top: 27px"/>
		</form>
		<span id='mensagens'></span>
		<div style=" margin-top: 10px; height: 32">
			<img src='theme/img/UsuarioIncorreto.png' width='241' height='32' alt='MsgErroSenha' id='error'  style='display: none'>
			<img src='theme/img/CamposObrigatorios.png' width='307' height='25' alt='MsgErroFocus' id='fucus' style='display: none'>
		</div>
		<img src='theme/img/Partnerlogin.png' width='132' height='50' alt='SeloGoogle' style=" margin-top: 10px">

		<div style='background-color: black; width:721; height: 1px; margin: 23 auto 0 auto'></div>
		<div style="width:100%; height: 16px; margin: 60px auto 0 auto">
			<p style="text-align: center;">Não é um cliente da Clinks e quer receber um relatório personalizado? <a href='https://www.clinks.com.br/shop/produtos/relatorios/relatorio-de-resultados-do-google-adwords/'><button type='button' class='sim'>Sim</button></a></p>
		</div>
		<div style="width:100%; margin: 60px auto 0 auto;">
			<p style="text-align: center;">Copyright © CLINKS - Agência Search Engine Marketing Certicada Google AdWords</p>
		</div>

	</div>
</body>
</html>

<script>
$( "#entrar" ).submit(function( event ) {
	if ( $("#user" ).val() == "" || $( "#password" ).val() == '') {
		if($("#user" ).val() == ""){
			$('#user').css('border-color', 'red');
		}
		if($("#password" ).val() == ""){
			$('#password').css('border-color', 'red');
		}
		$( "#fucus" ).show(300).fadeOut(5000);
		event.preventDefault();
	}
});
</script>