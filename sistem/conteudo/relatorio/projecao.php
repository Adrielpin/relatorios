<div id='bi-content'>
  <div class='capa' id='capa-projecao' style="width: 100%;height: 100%;background-image: url('img/Capa-Projecao.png') !important;background-repeat: no-repeat !important; background-size:contain !important;">
    <div style="position: relative !important; float: left !important; margin: 408px 0px 0px 0px !important;">
      <p style="color: white !important; font-size: 14pt !important; font-weight: bold !important; margin-left: 75px !important;">Projeções de Resultados - <?php echo $tipo;?></p>
      <p style='color: #444242 !important; font-size: 14pt !important; margin-top: 25px !important; margin-left: 75px !important; font-weight: bold !important;'><?php echo $conta;?></p>
    </div>
  </div>
  <!-- capa search -->
  <div name='search'> 
    
    <div class='capa'>
      <img src='img/Glossario-Projecao-Search.png' />
    </div>

    <div class='capa'>
      <img src='img/Estrutura-Projecao-Search.png'/>
    </div>
  </div>

  <!-- capa display -->
  <div name='display'>

    <div class='capa'>
      <img src='img/Glossario-Projecao-Display.png'/>
    </div>

    <div class='capa'>
      <img src='img/Estrutura-Projecao-Display.png'/>
    </div>
  </div>

  <!--Prjeções por data-->
  <div class='data'>
    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
        <div id='chart_parcela_impresao' class='grafico'></div><div id='t_parcela_impresao'></div>
        <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
        <div  id='chart_progecao' class='grafico'></div><div id='t_progecao'></div>
        <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
        <div  id='chart_progecao_cliques' class='grafico'></div><div id='t_progecao_cliques'></div>
        <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
        <div  id='chart_progecao_impressoes' class='grafico'></div><div  id='t_progecao_impressoes'></div>
        <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div name='search'>  
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_progecao_conversoes' class='grafico'></div><div  id='t_progecao_conversoes'></div>
          <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>

    <div name='display'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_progecao_conversao_total' class='grafico'></div><div id='t_progecao_conversao_total'></div>
          <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>

    <div name='chart_roi'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div id='projecao_faturamento_total' class='grafico'></div><div id='t_projecao_faturamento_total'></div>
          <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div id='projecao_faturamento_adwords' class='grafico'></div><div id='t_projecao_faturamento_adwords'></div>
          <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>
  </div>

  <!--projeção por dia da semana-->
  <div class=semana>
    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
        <div id='chart_parcela_impresao_week' class='grafico'></div><div id='t_parcela_impresao_week'></div>
        <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
        <div  id='chart_progecao_week' class='grafico'></div><div id='t_progecao_week'></div>
        <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
        <div  id='chart_progecao_cliques_week' class='grafico'></div><div id='t_progecao_cliques_week'></div>
        <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
        <div  id='chart_progecao_impressoes_week' class='grafico'></div><div  id='t_progecao_impressoes_week'></div>
        <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div name='search'>  
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='chart_progecao_conversoes_week' class='grafico'></div><div  id='t_progecao_conversoes_week'></div>
          <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>
    
    <div name='display'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='chart_progecao_conversao_total_week' class='grafico'></div><div id='t_progecao_conversao_total_week'></div>
          <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>

    <div name='chart_roi'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='projecao_faturamento_total_week' class='grafico'></div><div  id='t_projecao_faturamento_total_week'></div>
          <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='projecao_faturamento_adwords_week' class='grafico'></div><div  id='t_projecao_faturamento_adwords_week'></div>
          <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>
  </div>

  <!--Projeção por hora do dia-->
  <div name='keyword'>
    <div class='hora'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
          <div id='chart_parcela_impresao_hour' class='grafico'></div><div id='t_parcela_impresao_hour'></div>
          <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
          <div  id='chart_progecao_hour' class='grafico'></div><div id='t_progecao_hour'></div>
          <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> -Por hora do dia</h1></div>
          <div  id='chart_progecao_cliques_hour' class='grafico'></div><div id='t_progecao_cliques_hour'></div>
          <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
          <div  id='chart_progecao_impressoes_hour' class='grafico'></div><div  id='t_progecao_impressoes_hour'></div>
          <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div name='search'>  
        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='chart_progecao_conversoes_hour' class='grafico'></div><div  id='t_progecao_conversoes_hour'></div>
            <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>
      </div>

      <div name='display'>
        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='chart_progecao_conversao_total_hour' class='grafico'></div><div id='t_progecao_conversao_total_hour'></div>
            <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>
      </div>

      <div name='chart_roi'>
        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='projecao_faturamento_total_hour' class='grafico'></div><div  id='t_projecao_faturamento_total_hour'></div>
            <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>

        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Projeções de Resultados - <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='projecao_faturamento_adwords_hour' class='grafico'></div><div  id='t_projecao_faturamento_adwords_hour'></div>
            <div class='foot'><img src='../theme/img/LogoClinks.png' width='100' height='38'/><img src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class='capa'>
    <img src='img/ContraCapa.png' width="100%" />
  </div>
</div>