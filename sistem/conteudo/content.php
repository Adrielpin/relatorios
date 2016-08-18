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




	<div class='corpo'>
		<div class='head'>
			<div style='height: 50px'>
				<img  src='../theme/img/LogoClinks.png' style='display: block;float: left; margin-left: 61px; margin-top: 10px'>
				<img  src='../theme/img/LogoPartner.png' style='display: block;float: right; margin-right: 61px; margin-top: 10px'>
			</div>
			<div class='head-2' style="background-color: #3861a4">
				<h1 id='nome-do-cliente'>Bem vindo <?php echo $_SESSION['nome']?></h1>
			</div>
		</div>
		<div class='conteudo'>
			<div class='col-1'>
				<div style='margin-top: 12px'>
						<img name='icon' title="Exibe filtros para o relatório" src='../theme/icons/icon-report.png' style='display: block; margin: 0 auto 3 auto; cursor:pointer'>
						<div name='icon-select' class='selector'></div>

						<img name='icon' title='Usuários' src='../theme/icons/icon-users.png' style='display: block; margin: 0 auto 3 auto; cursor:pointer'>
						<div name='icon-select' class='selector'></div>

						<img name='icon' title='exibe configurações' src='../theme/icons/icon-user.png' style='display: block; margin: 0 auto 3 auto; cursor:pointer'>
						<div name='icon-select' class='selector'></div>

						<img name='icon' title='exibe suporte' src='../theme/icons/icon-support.png' style='display: block; margin: 0 auto 3 auto; cursor:pointer'>
						<div name='icon-select' class='selector'></div>

						<img id='sair' title='Sair' src='../theme/icons/icon-logout.png' style='display: block; margin: 0 auto 3 auto; cursor:pointer'>

				</div>
			</div>
			
			<div class='col-2'>
				<div style="width: 194px; height:100%; float: left;" id='forms'>
					<div id='form'>
						<div id='menu-1'>
							<?php include 'menus/filtros.php';?>
						</div>

						<div id='menu-2' hidden>
							<?php include 'menus/usuarios.php';?>
						</div>

						<div id='menu-3' hidden>
							<?php include 'menus/contato.php';?>
						</div>

						<div id='menu-4' hidden>
							<?php include 'menus/email.php';?>
						</div>
					</div>
				</div>

				<div style="width: 10px; height:100%; background-color: #D8D9DD; float: left;" id='hide'><img id='seta-hide' src='../theme/icons/seta-01.png' style='display: block; margin: 250 auto 21 auto'></div>
			</div>

			<div class='col-3'>
				
			</div>
			
		</div>
	</div>
</body>