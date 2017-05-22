<head id="imprime">
<title><?=$titulo_pagina?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<!-- Instruções -->

<div class="tamanho">
  <DIV ALIGN="CENTER"> Instru&ccedil;&otilde;es de Impress&atilde;o </DIV>
  <DIV ALIGN="left" style="font-size:13px">
    <p>
    <li> Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal
      ou alta (N&atilde;o use modo econ&ocirc;mico). <br>
    </li>
    <li> Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens m&iacute;nimas &agrave; esquerda e &agrave; direita do formul&aacute;rio.
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Chrome, utiliza a opção "+mais Configura&ccedil;&otilde;es" e em seguida mude margens para "nenhum".<br>
    </li>
    <li> Corte na linha indicada. N&atilde;o rasure, risque, fure ou dobre a regi&atilde;o onde se encontra o c&oacute;digo de barras. <br>
    </li>
    <li> Caso n&atilde;o apare&ccedil;a o c&oacute;digo de barras no final, clique em F5 para atualizar esta tela. </li>
    <li> Caso tenha problemas ao imprimir, copie a sequencia num&eacute;rica abaixo e pague no caixa eletr&ocirc;nico ou no internet banking: <br>
    </li>
    </p>
    <br>
  </div>
  <div align="left" style="font-size:16px; color:#000000;"> <b> Linha Digit&aacute;vel: <?php echo $dadosboleto[ "linha_digitavel"]?> <br>
    Valor:  R$ <?php echo $dadosboleto[ "valor_boleto"]?> </b> <br>
  </div>
</div>
<!-- Instruções fim --> 

<!-- Inicia impressão -->
<div id="imprime"> 
  <!-- Inicia Impressão FIM -->
  
  <style type="text/css">
.float {
	float:left;
	position:inherit;
}
.logobanco {
	font: bold 10px Arial;
	color: black;
	float:left;
	width:150px;
	height:40px;
	background-image:url(paginas/boleto/imagens/<?=$dadosboleto["imagem_dtbnc"]?>);
}
.tamanho {
	max-width:700px;
	width:700px;
	min-width:700px;
}
.barravertical {
	width:3px;
	height:39px;
	background-color:#000;
	background-repeat:repeat-y;
}
.barravertical2 {
	width:3px;
	height:85px;
	background-color:#000;
	background-repeat:repeat-y;
}
.barrahorizontal {
	height:2px;
	width:690px;
	background-color:#000;
	background-repeat:repeat-x;
}
.barrahorizontalmini{
	height:2px;
	width:200px;
	background-color:#000;
	background-repeat:repeat-x;
}
.codigo_banco_com_dv {
	width:55px;
	float:left;
	padding-top:15px;
	font: bold 18px Arial;
	color:#000000;
}
.linha_digitavel {
	width:680px;
	padding-top:20px;
	font: bold 16px Arial;
	color: #000000
}
.divisaotit {
	width:455px;
}
.caixatexto {
	height:40px;
}
.titulo{
	FONT: 9px "Arial Narrow";
	COLOR: #000033;
	padding-top:3px;
	padding-left: 2px;
	padding-right: 2px;
}
.campo{
	padding-left:3px;
}
hr {
      border-top: 1px dashed #000;
      color: #000000;
      background-color: #fff;
      height: 2px;
	  min-width:690px;
    }
.corpoboleto{
	-webkit-print-color-adjust: exact;
}
</style>
  <div class="corpoboleto"> 
    <!-- Linha Corte aqui  -->
    <div class="tamanho">
      <div class="caixatexto">
        <div class="titulo" align=right> Corte na linha pontilhada </div>
        <div class=ct width=666>
          <hr>
        </div>
      </div>
    </div>
    <!-- Linha Corte aqui FIM --> 
    
    <!-- Cabeçalho -->
    <div class="tamanho">
      <div class="logobanco">&nbsp;</div>
      <div class="barravertical float">&nbsp;</div>
      <div class="codigo_banco_com_dv" align="center"> <?php echo $dadosboleto[ "codigo_banco_com_dv"]?> </div>
      <div class="barravertical float">&nbsp;</div>
      <div class="linha_digitavel" align="right">
        <div class="campotitulo"> <?php echo $dadosboleto[ "linha_digitavel"]?> </div>
      </div>
      <div style="clear: left;"></div>
      <div class="barrahorizontal">&nbsp;</div>
    </div>
    <!-- Cabeçalho FIM--> 
    
    <!-- Linha cedente -->
    <div class="tamanho"  align="left">
      <div class="barravertical float"> &nbsp; </div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:260px;">Cedente</div>
        <div class="campo"> <?php echo $dadosboleto["cedente"]; ?> </div>
      </div>
      <div class="barravertical float"> &nbsp; </div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:160px;">Ag&ecirc;ncia/C&oacute;digo do Cedente</div>
        <div class="campo"> <?php echo $dadosboleto["agencia_codigo"]?> </div>
      </div>
      <div class="barravertical float"> &nbsp; </div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:30px;">Esp&eacute;cie</div>
        <div class="campo"> <?php echo $dadosboleto["especie"]?> </div>
      </div>
      <div class="barravertical float"> &nbsp; </div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:30px;">Quantidade</div>
        <div class="campo"> <?php echo $dadosboleto["quantidade"]?> </div>
      </div>
      <div class="barravertical float"> &nbsp; </div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:140px;">Nosso n&uacute;mero</div>
        <div class="campo" align="right"> <?php echo $dadosboleto["nosso_numero"]?> </div>
      </div>
      <div style="clear: left;"></div>
      <div class="barrahorizontal">&nbsp;</div>
    </div>
    <!-- Linha cedente FIM --> 
    
    <!-- Linha Num Documento -->
    <div class="tamanho"  align="left">
      <div class="barravertical float"> </div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:166px;">N&uacute;mero do documento</div>
        <div class="campo"> <?php echo $dadosboleto["numero_documento"]?> </div>
      </div>
      <div class="barravertical float"> &nbsp; </div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:160px;">CPF/CNPJ</div>
        <div class="campo"> <?php echo $dadosboleto["cpf_cnpj"]?> </div>
      </div>
      <div class="barravertical float"> &nbsp; </div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:166px;">Vencimento</div>
        <div class="campo"> <?php echo $dadosboleto["data_vencimento"]?> </div>
      </div>
      <div class="barravertical float"> &nbsp; </div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:160px;">Valor documento</div>
        <div class="campo" align="right"> <?php echo $dadosboleto["valor_boleto"]?> </div>
      </div>
      <div style="clear: left;"></div>
      <div class="barrahorizontal">&nbsp;</div>
    </div>
    <!-- Linha Num Documento FIM --> 
    
    <!-- Linha Descontos e Acrescimos -->
    <div class="tamanho"  align="left">
      <div class="barravertical float"> &nbsp; </div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:130px;"> (-) Desconto / Abatimentos </div>
        <div class="campo"> &nbsp;</div>
      </div>
      <div class="barravertical float"> &nbsp; </div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:130px;"> (-) Outras dedu&ccedil;&otilde;es </div>
        <div class="campo"> &nbsp;</div>
      </div>
      <div class="barravertical float"> &nbsp; </div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:130px;"> (+) Mora / Multa </div>
        <div class="campo"> &nbsp;</div>
      </div>
      <div class="barravertical float"> &nbsp; </div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:130px;"> (+) Outros acr&eacute;scimos </div>
        <div class="campo"> &nbsp;</div>
      </div>
      <div class="barravertical float"> &nbsp; </div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:130px;"> (=) Valor cobrado </div>
        <div class="campo"> &nbsp;</div>
      </div>
      <div style="clear: left;"></div>
      <div class="barrahorizontal">&nbsp;</div>
    </div>
    <!-- Linha Descontos e Acrescimos FIM --> 
    
    <!-- Linha Sacado -->
    <div class="tamanho"  align="left">
      <div class="barravertical float"> &nbsp;</div>
      <div class="caixatexto">
        <div class="titulo" style="min-width:130px;"> Sacado </div>
        <div class="campo"> <?php echo $dadosboleto[ "sacado"]?> </div>
      </div>
      <div class="barrahorizontal">&nbsp;</div>
    </div>
    <!-- Linha Sacado --> 
    
    <!-- Linha Demonstrativo -->
    <div class="tamanho" style="min-height:80px;"  align="left">
      <div class="caixatexto float">
        <div class="titulo" style="min-width:350px; max-width:350px;"> Demonstrativo </div>
        <div class="campo"> <?php echo $dadosboleto[ "demonstrativo1"]."<br>";?>
          <?php if($valoracres1_dtmora!= "" || $valoracres1_dtmora != 0)echo $dadosboleto[ "demonstrativo2"]."<br>";?>
          <?php if($valoracres2_dtmora!= "" || $valoracres2_dtmora != 0)echo $dadosboleto[ "demonstrativo3"]."<br>";?>
        </div>
      </div>
      <div class="caixatexto float" style="padding-left:20px;">
        <div class="titulo" align="center" style="min-width:250px;"> Autenticação mecânica </div>
        <div>
          <div class="barravertical float"> &nbsp;</div>
          <div class="barrahorizontal float" style="width:250px;">&nbsp;</div>
          <div class="barravertical float"> &nbsp;</div>
        </div>
      </div>
    </div>
    <div style="clear: left;"></div>
    <!-- Linha Demonstrativo FIM  --> 
    
    <!-- Linha Corte aqui  -->
    <div class="tamanho">
      <div class="caixatexto">
        <div class="titulo" align=right> Corte na linha pontilhada </div>
        <div class=ct width=666>
          <hr>
        </div>
      </div>
    </div>
    <!-- Linha Corte aqui FIM --> 
    
    <!-- Cabeçalho -->
    <div class="tamanho">
      <div class="logobanco">&nbsp;</div>
      <div class="barravertical float">&nbsp;</div>
      <div class="codigo_banco_com_dv" align="center"> <?php echo $dadosboleto[ "codigo_banco_com_dv"]?></div>
      <div class="barravertical float">&nbsp;</div>
      <div class="linha_digitavel" align="right">
        <div class="campotitulo"> <?php echo $dadosboleto[ "linha_digitavel"]?> </div>
      </div>
      <div style="clear: left;"></div>
      <div class="barrahorizontal">&nbsp;</div>
    </div>
    <!-- Cabeçalho FIM--> 
    
    <!-- Local Pagamento -->
    <div class="tamanho" align="left">
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:480px;"> Local de pagamento </div>
        <div class="campo"> <?php echo $dadosboleto[ "local_pagamento"]?> </div>
      </div>
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:180px;"> Vencimento </div>
        <div class="campo" align="right"> <?php echo $dadosboleto[ "data_vencimento"]?> </div>
      </div>
    </div>
    <div style="clear: left;"></div>
    <div class="barrahorizontal">&nbsp;</div>
    <!-- Local Pagamento FIM--> 
    
    <!-- Linha cedente -->
    <div class="tamanho" align="left">
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:480px;"> Cedente </div>
        <div class="campo"> <?php echo $dadosboleto[ "cedente"]?> </div>
      </div>
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:180px;"> Ag&ecirc;ncia/C&oacute;digo cedente </div>
        <div class="campo" align="right"> <?php echo $dadosboleto[ "agencia_codigo"]?> </div>
      </div>
      <div style="clear: left;"></div>
      <div class="barrahorizontal">&nbsp;</div>
    </div>
    <!-- Linha cedente FIM --> 
    
    <!-- Linha data do documento -->
    <div class="tamanho" align="left">
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:110px;"> Data do documento </div>
        <div class="campo"> <?php echo $dadosboleto[ "data_documento"]?> </div>
      </div>
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:100px;"> N <u> o </u> documento </div>
        <div class="campo"> <?php echo $dadosboleto[ "numero_documento"]?> </div>
      </div>
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:70px;"> Esp&eacute;cie doc. </div>
        <div class="campo"> <?php echo $dadosboleto[ "especie_doc"]?> </div>
      </div>
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:69px;"> Aceite </div>
        <div class="campo"> <?php echo $dadosboleto[ "aceite"]?> </div>
      </div>
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:120px;"> Data processamento </div>
        <div class="campo"> <?php echo $dadosboleto[ "data_processamento"]?> </div>
      </div>
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:175px;"> Nosso n&uacute;mero </div>
        <div class="campo" align="right"> <?php echo $dadosboleto[ "nosso_numero"]?> </div>
      </div>
      <div style="clear: left;"></div>
      <div class="barrahorizontal">&nbsp;</div>
    </div>
    <!-- Linha data do documento FIM --> 
    
    <!-- Linha uso do banco -->
    <div class="tamanho" align="left">
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:110px;"> Uso do banco </div>
        <div class="campo"> &nbsp; </div>
      </div>
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:100px;"> Carteira </div>
        <div class="campo"> <?php echo $dadosboleto[ "carteira"]?> </div>
      </div>
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo"style="min-width:70px;"> Esp&eacute;cie </div>
        <div class="campo"> <?php echo $dadosboleto[ "especie"]?> </div>
      </div>
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:69px;"> Quantidade </div>
        <div class="campo"> <?php echo $dadosboleto[ "quantidade"]?> </div>
      </div>
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:120px;"> Valor Documento </div>
        <div class="campo" align="right"> <?php echo $dadosboleto[ "valor_unitario"]?> </div>
      </div>
      <div class="barravertical float">&nbsp;</div>
      <div class="caixatexto float">
        <div class="titulo" style="min-width:175px;"> (=) Valor documento </div>
        <div class="campo" align="right"> <?php echo $dadosboleto[ "valor_boleto"]?> </div>
      </div>
      <div style="clear: left;"></div>
      <div class="barrahorizontal">&nbsp;</div>
    </div>
    <!-- Linha uso do banco FIM --> 
    
    <!-- Linha instruções -->
    <div class="tamanho" align="left">
      <div class="caixatexto float">
        <div class="titulo" style="min-width:485px;"> Instru&ccedil;&otilde;es (Texto de responsabilidade do cedente)</div>
        <div class="campo" style="min-height:200px;"> <?php echo $dadosboleto[ "demonstrativo1"]?> <br>
          <?php if($valoracres1_dtmora!= "" || $valoracres1_dtmora != 0)echo $dadosboleto[ "demonstrativo2"]."<br>";?>
          <?php if($valoracres2_dtmora!= "" || $valoracres2_dtmora != 0)echo $dadosboleto[ "demonstrativo3"]."<br>";?> 
          <?php echo $dadosboleto[ "instrucoes1"]."<br>"; ?>
          <?php echo $dadosboleto[ "instrucoes2"]."<br>"; ?>
          <?php echo $dadosboleto[ "instrucoes3"]."<br>"; ?>
          <?php echo $dadosboleto[ "instrucoes4"]; ?> </div>
      </div>
      <div class="tamanhomais float" style="min-height:200px;">
        <div class="barravertical float">&nbsp;</div>
        <div class="caixatexto">
          <div class="titulo" style="min-width:175px;"> (-) Desconto / Abatimentos </div>
        </div>
        <div class="barrahorizontalmini">&nbsp;</div>
        <div class="barravertical float">&nbsp;</div>
        <div class="caixatexto">
          <div class="titulo" style="min-width:175px;"> (-) Outras dedu&ccedil;&otilde;es </div>
        </div>
        <div class="barrahorizontalmini">&nbsp;</div>
        <div class="barravertical float">&nbsp;</div>
        <div class="caixatexto">
          <div class="titulo" style="min-width:175px;"> (+) Mora / Multa </div>
        </div>
        <div class="barrahorizontalmini">&nbsp;</div>
        <div class="barravertical float">&nbsp;</div>
        <div class="caixatexto">
          <div class="titulo" style="min-width:175px;"> (+) Outros acr&eacute;scimos </div>
        </div>
        <div class="barrahorizontalmini">&nbsp;</div>
        <div class="barravertical float">&nbsp;</div>
        <div class="caixatexto">
          <div class="titulo" style="min-width:175px;"> (=) Valor cobrado </div>
        </div>
      </div>
      <div style="clear: left;"></div>
      <div class="barrahorizontal">&nbsp;</div>
    </div>
    <!-- Linha instruções FIM --> 
    
    <!-- Linha sacado -->
    <div class="tamanho" align="left">
      <div class="barravertical2 float">&nbsp;</div>
      <div class="caixatexto" style="min-height:50px;">
        <div class="titulo" style="min-width:485px;"> Sacado </div>
        <div class="campo"> <?php echo $dadosboleto[ "sacado"]?> </div>
        <div class="campo"> <?php echo $dadosboleto[ "endereco1"]?> </div>
        <div class="campo"> <?php echo $dadosboleto[ "endereco2"]?> </div>
      </div>
      <br />
      <br />
      <div class="barrahorizontal">&nbsp;</div>
      <div class="float" style="min-width:485px;">
        <div class="barravertical float">&nbsp;</div>
        <div class="caixatexto">
          <div class="titulo" style="min-width:485px;"> Sacador/Avalista </div>
          <div class="campo"> &nbsp; </div>
        </div>
      </div>
      <div class="tamanhomais float" style="min-width:175px;">
        <div class="barravertical float">&nbsp;</div>
        <div class="caixatexto float">
          <div class="titulo" style="min-width:174px;"> C&oacute;d. baixa </div>
          <div class="campo"> &nbsp; </div>
        </div>
      </div>
      <div style="clear: left;"></div>
      <div class="barrahorizontal">&nbsp;</div>
    </div>
    <!-- Linha sacado FIM --> 
    
    <!-- Linha autenticação mecanica -->
    <div class="tamanho" style="min-width:174px;" align="left">
      <div class="caixatexto float">
        <div class="titulo" style="min-width:460px;"> C&oacute;digo de barras </div>
        <div class="campo" style="min-height:50px; min-width:460px; max-width:460px;">
          <?php fbarcode($dadosboleto[ "codigo_barras"]); ?>
        </div>
      </div>
    </div>
    <div class="tamanhomais float" style="min-width:200px;"  align="right">
      <div class="caixatexto float">
        <div class="titulo" style="min-width:174px;"> Autentica&ccedil;&atilde;o mec&acirc;nica - Ficha de Compensa&ccedil;&atilde;o </div>
        <div class="campo" style="min-width:174px;"> &nbsp; </div>
      </div>
    </div>
    <div style="clear: left;"></div>
    <!-- Linha autenticação mecanica FIM --> 
    
    <!-- Linha Corte aqui  --> 
    <br />
    <div class="tamanho">
      <div class="caixatexto">
        <div class="titulo" align=right> Corte na linha pontilhada </div>
        <div class=ct width=666>
          <hr>
        </div>
      </div>
    </div>
    <br>
    <!-- Linha Corte aqui FIM --> 
    
    <!-- FIM --> 
  </div>
  <!-- termina impressão --> 
</div>
<!-- termina Impressão FIM -->