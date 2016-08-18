<!--escape de HTML saida de layout e visual-->
<div id='relatorio-clinks'>

  <!-- CAPA-SEARCH -->
  <div class='capa' id='capa-desempenho' style="width: 100%;height: 100%;background-image: url('img/Capa-Desempenho.png') !important;background-repeat: no-repeat !important; background-size:contain !important;">
    <div style="position: relative !important; float: left !important; margin: 408px 0px 0px 0px !important;">
      <p style="color: white !important; font-size: 14pt !important; font-weight: bold !important; margin-left: 75px !important;">Desempenho de Campanhas - <?php echo $tipo;?></p>
      <p style='color: #444242 !important; font-size: 14pt !important; margin-top: 25px !important; margin-left: 75px !important; font-weight: bold !important;'><?php echo $conta;?></p>
    </div>
  </div>

  <div name='search'>

    <div class='capa'>
      <img src='img/Glossario-Search.png'/>
    </div>

    <div class='capa'>
      <img src='img/Estrutura-Search.png'/>
    </div>
  </div>

  <!-- CAPA-SEARCH -->
  <div name='display' hidden=true>

    <div class='capa'>
      <img src='img/Glossario-Display.png'/>
    </div>

    <div class='capa'>
      <img src='img/Estrutura-Display.png'/>
    </div>
  </div>

  <!--Graficos por data-->
  <div id='data'>

    <div name='video'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_view' class='grafico'></div><div id='t_view'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_cpm' class='grafico'></div><div id='t_cpm'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_vtr' class='grafico'></div><div id='t_vtr'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>

    <div name='gmail'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_gmail_cliques' class='grafico'></div><div id='t_gmailClique'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_gmail_save' class='grafico'></div><div id='t_gmailSave'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_gmail_enc' class='grafico'></div><div id='t_gmailEnc'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
        <div id='chart_cliques' class='grafico'></div><div id='t_cliques'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
        <div id='chart_Impressoes' class='grafico'></div><div id='t_impressoes'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
        <div  id='chart_Cpc' class='grafico'></div><div id='t_cpc'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
        <div  id='chart_Cost' class='grafico'></div><div id='t_investimento'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
        <div  id='chart_Ctr' class='grafico'></div><div id='t_ctr'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div name='position'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_Posicao' class='grafico'></div><div id='t_posicao'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
        <div  id='chart_Conversao' class='grafico'></div><div id='t_conversao'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
        <div  id='chart_Custo_coversao' class='grafico'></div><div id='t_custo_por_conversao'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
        <div  id='chart_taxa_conversao' class='grafico'></div><div id='t_taxa_conversao'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div name='conversoes'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_visualisacao' class='grafico'></div><div id='t_conversao_visualizacao'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_conversao_total' class='grafico'></div><div id='t_conversao_total'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_taxa_conversao_total' class='grafico'></div><div id='t_taxa_conversao_total'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_custo_conversao_total' class='grafico'></div><div id='t_custo_conversao_total'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>

    <div name='chart_roi'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_faturamento_total' class='grafico'></div><div id='t_faturamento_total'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_faturamento_adwords' class='grafico'></div><div id='t_faturamento_adwords'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></h1></div>
          <div  id='chart_roi' class='grafico'></div><div id='t_roi'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>
  </div>

  <!--Graficos por dia da semana-->
  <div id='semana'>
    <div name='gmail'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='chart_gmail_cliques_week' class='grafico'></div><div id='t_gmailClique_week'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='chart_gmail_save_week' class='grafico'></div><div id='t_gmailSave_week'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='chart_gmail_enc_week' class='grafico'></div><div id='t_gmailEnc_week'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
        <div id='chart_cliques_week' class='grafico'></div><div id='t_cliques_week'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
        <div id='chart_Impressoes_week' class='grafico'></div><div id='t_impressoes_week'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
        <div  id='chart_Cpc_week' class='grafico'></div><div id='t_cpc_week'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
        <div  id='chart_Cost_week' class='grafico'></div><div id='t_investimento_week'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
        <div  id='chart_Ctr_week' class='grafico'></div><div id='t_ctr_week'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div name='position'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='chart_Posicao_week' class='grafico'></div><div id='t_posicao_week'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
        <div  id='chart_Conversao_week' class='grafico'></div><div id='t_conversao_week'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
        <div  id='chart_Custo_coversao_week' class='grafico'></div><div id='t_custo_por_conversao_week'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div class='border'>
      <div class='borda'>
        <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
        <div  id='chart_taxa_conversao_week' class='grafico'></div><div id='t_taxa_conversao_week'></div>
        <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
      </div>
    </div>

    <div name='conversoes'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='chart_visualisacao_week' class='grafico'></div><div id='t_conversao_visualizacao_week'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='chart_conversao_total_week' class='grafico'></div><div id='t_conversao_total_week'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='chart_taxa_conversao_total_week' class='grafico'></div><div id='t_taxa_conversao_total_week'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='chart_custo_conversao_total_week' class='grafico'></div><div id='t_custo_conversao_total_week'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>

    <div name='chart_roi'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='chart_faturamento_total_week' class='grafico'></div><div  id='t_faturamento_total_week'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='chart_faturamento_adwords_week' class='grafico'></div><div  id='t_faturamento_adwords_week'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por dia da semana</h1></div>
          <div  id='chart_roi_week' class='grafico'></div><div  id='t_roi_week'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>
    </div>
  </div>

  <div name='keyword'>
    <!--Graficos por hora do dia-->
    <div id='hora'>
      <div name='gmail'>
        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='chart_gmail_cliques_hour' class='grafico'></div><div id='t_gmailClique_hour'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>

        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='chart_gmail_save_hour' class='grafico'></div><div id='t_gmailSave_hour'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>

        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='chart_gmail_enc_hour' class='grafico'></div><div id='t_gmailEnc_hour'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>
      </div>
      
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
          <div id='chart_cliques_hour' class='grafico'></div><div id='t_cliques_hour'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
          <div id='chart_Impressoes_hour' class='grafico'></div><div id='t_impressoes_hour'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
          <div  id='chart_Cpc_hour' class='grafico'></div><div id='t_cpc_hour'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
          <div  id='chart_Cost_hour' class='grafico'></div><div id='t_investimento_hour'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
          <div  id='chart_Ctr_hour' class='grafico'></div><div id='t_ctr_hour'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div name='position'>
        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='chart_Posicao_hour' class='grafico'></div><div id='t_posicao_hour'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
          <div  id='chart_Conversao_hour' class='grafico'></div><div id='t_conversao_hour'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
          <div  id='chart_Custo_coversao_hour' class='grafico'></div><div id='t_custo_por_conversao_hour'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
          <div  id='chart_taxa_conversao_hour' class='grafico'></div><div id='t_taxa_conversao_hour'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div name='conversoes'>
        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='chart_visualisacao_hour' class='grafico'></div><div id='t_conversao_visualizacao_hour'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>

        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='chart_conversao_total_hour' class='grafico'></div><div id='t_conversao_total_hour'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>

        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='chart_taxa_conversao_total_hour' class='grafico'></div><div id='t_taxa_conversao_total_hour'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>

        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='chart_custo_conversao_total_hour' class='grafico'></div><div id='t_custo_conversao_total_hour'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>
      </div>

      <div name='chart_roi'>
        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='chart_faturamento_total_hour' class='grafico'></div><div  id='t_faturamento_total_hour'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>

        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='chart_faturamento_adwords_hour' class='grafico'></div><div  id='t_faturamento_adwords_hour'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>

        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Por hora do dia</h1></div>
            <div  id='chart_roi_hour' class='grafico'></div><div  id='t_roi_hour'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>
      </div>
    </div>

    <!--Graficos geograficos-->
    <div id='geografico'>
      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></a> - Geográfico</h1></div>
          <div  id='chart_cliques_geo' class='grafico'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></a> - Geográfico</h1></div>
          <div  id='chart_Impressoes_geo' class='grafico'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></a> - Geográfico</h1></div>
          <div  id='chart_Cpc_geo' class='grafico'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></a> - Geográfico</h1></div>
          <div  id='chart_Cost_geo' class='grafico'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></a> - Geográfico</h1></div>
          <div  id='chart_Ctr_geo' class='grafico'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div name='position'>
        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></a> - Geográfico</h1></div>
            <div  id='chart_Posicao_geo' class='grafico'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></a> - Geográfico</h1></div>
          <div  id='chart_Conversao_geo' class='grafico'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></a> - Geográfico</h1></div>
          <div  id='chart_Custo_coversao_geo' class='grafico'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div class='border'>
        <div class='borda'>
          <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></a> - Geográfico</h1></div>
          <div  id='chart_taxa_conversao_geo' class='grafico'></div>
          <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
        </div>
      </div>

      <div name='conversoes'>
        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></a> - Geográfico</h1></div>
            <div  id='chart_visualisacao_geo' class='grafico'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>

        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></a> - Geográfico</h1></div>
            <div  id='chart_conversao_total_geo' class='grafico'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>

        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></a> - Geográfico</h1></div>
            <div  id='chart_taxa_conversao_total_geo' class='grafico'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>

        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?></a> - Geográfico</h1></div>
            <div  id='chart_custo_conversao_total_geo' class='grafico'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>
      </div>

      <div name='chart_roi'>
        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Geográfico</h1></div>
            <div  id='chart_faturamento_total_geo' class='grafico'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>

        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Geográfico</h1></div>
            <div  id='chart_faturamento_adwords_geo' class='grafico'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>

        <div class='border'>
          <div class='borda'>
            <div class='title'><h1>Desempenho de Campanhas de <?php echo $tipo;?> - <?php echo $conta;?> - <?php echo ucfirst($month)?> - Geográfico</h1></div>
            <div  id='chart_roi_geo' class='grafico'></div>
            <div class='foot'><img name='logo-rodape' src='../theme/img/LogoClinks.png' width='100' height='38'/><img name='LogoPartner-rodape' src='../theme/img/LogoPartner.png'  width='100' height='38' style='float: right'/></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class='capa'>
    <img src='img/ContraCapa.png' width="100%" />
  </div>
</div>