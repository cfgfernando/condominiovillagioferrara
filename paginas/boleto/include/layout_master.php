<table width=666 cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td valign="top" class=cp><DIV ALIGN="CENTER"> Instru&ccedil;&otilde;es de Impress&atilde;o </DIV></TD>
  </TR>
  <TR>
    <TD valign="top" class=cp>
    <DIV ALIGN="left" style="margin-left:20px; margin-right:30px; font-size:12px;">
        <p>
        <li> Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal
          ou alta (N&atilde;o use modo econ&ocirc;mico). <br>
        <li> Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens m&iacute;nimas
          &agrave; esquerda e &agrave; direita do formul&aacute;rio. <br>
        <li> Corte na linha indicada. N&atilde;o rasure, risque, fure ou dobre a regi&atilde;o
          onde se encontra o c&oacute;digo de barras. <br>
        <li> Caso n&atilde;o apare&ccedil;a o c&oacute;digo de barras no final, clique
          em F5 para atualizar esta tela.
        <li> Caso tenha problemas ao imprimir, copie a sequencia num&eacute;rica abaixo
          e pague no caixa eletr&ocirc;nico ou no internet banking: <br>
          <br>
      </DIV>
      </td>
  </tr>
</table>
<div id="imprime">
<TITLE><?php echo $dadosboleto[ "identificacao"]; ?></TITLE>
  <style type="text/css">
#boleto_parceiro {
	height: 100%;
	width: 666px;
	font-family: Arial, Helvetica, sans-serif;
	margin-bottom: 15px;
	border-bottom-width: 1px;
	border-bottom-style: dashed;
	border-bottom-color: #000000;
}
.am {
	font-size: 9px;
	color: #333333;
	height: 100%;
	font-weight: bold;
	margin-bottom: 2px;
	text-align: center;
	width: 320px;
	border-top-width: 1px;
	border-right-width: 2px;
	border-left-width: 2px;
	border-top-style: solid;
	border-right-style: solid;
	border-left-style: solid;
	border-top-color: #000000;
	border-right-color: #000000;
	border-left-color: #000000;
}
#boleto {
	height: 100%;
	width: 666px;
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
}
#tb_logo {
	height: 100%;
	width: 666px;
	border-bottom-width: 2px;
	border-bottom-style: solid;
	border-bottom-color: #000000;
}
#tb_logo #td_banco {
	height: 100%;
	width: 53px;
	border-right-width: 2px;
	border-left-width: 2px;
	border-right-style: solid;
	border-left-style: solid;
	border-right-color: #000000;
	border-left-color: #000000;
	font-size: 15px;
	font-weight: bold;
	text-align: center;
}
.ld {
	font: bold 15px Arial;
	color: #000000
}
.td_7_sb {
	height: 100%;
	width: 7px;
}
.td_7_cb {
	width: 7px;
	border-left-width: 1px;
	border-left-style: solid;
	border-left-color: #000000;
	height: 100%;
}
.td_2 {
	width: 2px;
}
.tabelas td {
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #000000;
}
.direito {
	width: 178px;
}
.titulo {
	font-size: 9px;
	color: #333333;
	height: 100%;
	font-weight: bold;
	margin-bottom: 2px;
}
.var {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	height: 100%;
}
.direito .var {
	text-align: right;
}
</style>
  <div class="boletoview" style="margin:0 auto; width: 700px;">
    <div id="boleto_parceiro imprime">
    <div style="margin:0 auto; width: 700px; max-width:700px;">
  <div rowspan="2" valign="bottom" style="width:25%; float:left;"><img src="paginas/boleto/imagens/<?=db_result($res_dtbnc,"imagem_dtbnc");?>" alt="Banco" width="150" height="40" title="Banco" /></div><div>&nbsp;</div>
  <div rowspan="2" align="right" valign="bottom" style="font-size: 15px; font-weight:bold; width:75%; alignment-adjust:middle">
  <span class="ld"><?php echo $dadosboleto[ "linha_digitavel"]?></span>
  </div>
  <? LimpaFloat(); ?>
</div>
      <table style="width:666px; border-bottom:solid; border-bottom-color:#000000; border-bottom-width:2px; border-top:solid; border-top-color:#000000; border-top-width:2px; margin-bottom: 5px;" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="td_7_sb"></td>
          <td><div class="titulo">Nosso N&uacute;mero</div>
            <div class="var"><?php echo $dadosboleto[ "nosso_numero"]?></div></td>
          <td class="td_7_cb"></td>
          <td><div class="titulo">Esp&eacute;cie.</div>
            <div class="var"><?php echo $dadosboleto[ "especie"]?></div></td>
          <td class="td_7_cb"></td>
          <td><div class="titulo">Quantidade</div>
            <div class="var"><?php echo $dadosboleto[ "quantidade"]?></div></td>
          <td class="td_7_cb"></td>
          <td><div class="titulo">Valor Documento</div>
            <div class="var"><?php echo $dadosboleto[ "valor_boleto"]?></div></td>
          <td class="td_7_cb"></td>
          <td><div class="titulo">Esp&eacute;cie Doc.</div>
            <div class="var">&nbsp;</div></td>
          <td class="td_7_cb"></td>
          <td><div class="titulo">Ag&ecirc;ncia / C&oacute;digo Cedente</div>
            <div class="var" style="text-align:right"><?php echo $dadosboleto[ "agencia_codigo"]?></div></td>
          <td class="td_2"></td>
        </tr>
      </table>
      <table width="95%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="td_7_sb"></td>
          <td><div class="titulo">Sacador / Avalista</div>
            <div class="var">
              <div class="var" style="margin-bottom:5px; height:auto"><?php echo $dadosboleto[ "cedente"]?><br />
              </div>
            </div></td>
          <td class="td_7_sb"></td>
          <td valign="top" style="width:320px;"><div class="am">Autentica&ccedil;&atilde;o Mec&acirc;nica</div></td>
          <td class="td_2"></td>
        </tr>
      </table>
    </div>
    <div align=right style="padding-right:15px;"> <br>
      Corte na linha pontilhada<br>
      <img height=1 src=paginas/boleto/imagens/6.png width="100%" border="0"> <br>
      <br>
    </div>
    <div id="boleto imprime">
      <table border="0" cellpadding="0" cellspacing="0" id="tb_logo">
        <tr>
          <td rowspan="2" valign="bottom" style="width:150px;"><img src="paginas/boleto/imagens/<?=db_result($res_dtbnc,"imagem_dtbnc");?>" alt="Banco Real" width="150" height="40" title="Banco" /></td>
          <td align="center" valign="bottom" style="font-size: 9px; border:none; height:10px;">Banco</td>
          <td rowspan="2" align="right" valign="bottom" style="width:6px;"></td>
          <td rowspan="2" align="right" valign="bottom" style="font-size: 15px; font-weight:bold; width:445px;"><span class="ld"><?php echo $dadosboleto[ "linha_digitavel"]?></span></td>
          <td rowspan="2" align="right" valign="bottom" style="width:2px;"></td>
        </tr>
        <tr>
          <td id="td_banco"><?php echo $dadosboleto[ "codigo_banco_com_dv"]?></td>
        </tr>
      </table>
      <table class="tabelas" style="width:666px; border-left:solid; border-left-width:2px; border-left-color:#000000;" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="td_7_sb"></td>
          <td style="width: 468px;"><div class="titulo">Local do Pagamento</div>
            <div class="var"><?php echo $dadosboleto[ "local_pagamento"]?></div></td>
          <td class="td_7_cb"></td>
          <td class="direito"><div class="titulo">Vencimento</div>
            <div class="var"><?php echo $dadosboleto[ "data_vencimento"]?></div></td>
          <td class="td_2"></td>
        </tr>
        <tr>
          <td class="td_7_sb"></td>
          <td><div class="titulo">Cedente</div>
            <div class="var"><?php echo $dadosboleto[ "cedente"]?></div></td>
          <td class="td_7_cb"></td>
          <td class="direito"><div class="titulo">Ag&ecirc;ncia / C&oacute;digo do Cedente</div>
            <div class="var"><?php echo $dadosboleto[ "agencia_codigo"]?></div></td>
          <td></td>
        </tr>
      </table>
      <table class="tabelas" style="width:666px; border-left:solid; border-left-width:2px; border-left-color:#000000;" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="td_7_sb"></td>
          <td style="width:103px;"><div class="titulo">Data  Documento</div>
            <div class="var"><?php echo $dadosboleto[ "data_documento"]?></div></td>
          <td class="td_7_cb"></td>
          <td style="width:133px;"><div class="titulo">N&uacute;mero Documento</div>
            <div class="var"><?php echo $dadosboleto[ "numero_documento"]?>&nbsp;</div></td>
          <td class="td_7_cb"></td>
          <td style="width:62px;"><div class="titulo">Esp&eacute;cie Doc.</div>
            <div class="var"><?php echo $dadosboleto[ "especie_doc"]?>&nbsp;</div></td>
          <td class="td_7_cb"></td>
          <td style="width:34px;"><div class="titulo">Aceite</div>
            <div class="var"><?php echo $dadosboleto[ "aceite"]?>&nbsp;</div></td>
          <td class="td_7_cb"></td>
          <td style="width:109px;"><div class="titulo">Data Processamento</div>
            <div class="var"><?php echo $dadosboleto[ "data_processamento"]?></div></td>
          <td class="td_7_cb"></td>
          <td class="direito"><div class="titulo">Nosso N&uacute;mero</div>
            <div class="var"><?php echo $dadosboleto[ "nosso_numero"]?></div></td>
          <td class="td_2"></td>
        </tr>
      </table>
      <table class="tabelas" style="width:666px; border-left:solid; border-left-width:2px; border-left-color:#000000;" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td class="td_7_sb"></td>
          <td style="width:118px;"><div class="titulo">Uso Banco</div>
            <div class="var">&nbsp; </div></td>
          <td class="td_7_cb"></td>
          <td style="width:55px;"><div class="titulo">Carteira</div>
            <div class="var"><?php echo $dadosboleto[ "carteira"]?>&nbsp;</div></td>
          <td class="td_7_cb"></td>
          <td style="width:55px;"><div class="titulo">Esp&eacute;cie</div>
            <div class="var"><?php echo $dadosboleto[ "especie"]?>&nbsp;</div></td>
          <td class="td_7_cb"></td>
          <td style="width:104px;"><div class="titulo">Quantidade</div>
            <div class="var"><?php echo $dadosboleto[ "quantidade"]?>&nbsp;</div></td>
          <td class="td_7_cb"></td>
          <td style="width:109px;"><div class="titulo">Valor</div>
            <div class="var"><?php echo $dadosboleto[ "valor_unitario"]?></div></td>
          <td class="td_7_cb"></td>
          <td class="direito"><div class="titulo">Valor do Documento</div>
            <div class="var"><?php echo $dadosboleto[ "valor_boleto"]?></div></td>
          <td class="td_2"></td>
        </tr>
      </table>
      <table class="tabelas" style="width:666px; border-left:solid; border-left-width:2px; border-left-color:#000000; height:auto;" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td rowspan="5" class="td_7_sb"></td>
          <td rowspan="5" valign="top"><div class="titulo" style="margin-bottom:18px;"> Instru&ccedil;&otilde;es (texto de responsabilidade do Cedente) </div>
            <p>
              <?
            if ($taxa_boleto != "")
			   echo $dadosboleto[ "demonstrativo1"]."<br>";
			if ($demonstrativo2 != "")
               echo $dadosboleto[ "demonstrativo2"]."<br>";
			if ($demonstrativo3 != "")
               echo $dadosboleto[ "demonstrativo3"]."<br>";
			echo "<br>";
			if ($instrucoes1 != "- ")
               echo $dadosboleto[ "instrucoes1"]."<br>";
			if ($instrucoes2 != "- ")
               echo $dadosboleto[ "instrucoes2"]."<br>";
			if ($instrucoes3 != "- ")
               echo $dadosboleto[ "instrucoes3"]."<br>";
			if ($instrucoes3 != "")
               echo $dadosboleto[ "instrucoes4"]."<br>";
			   ?>
            </p></td>
          <td class="td_7_cb"></td>
          <td class="direito"><div class="titulo">(-) Desconto / Abatimento</div>
            <div class="var">&nbsp; </div></td>
          <td class="td_2"></td>
        </tr>
        <tr>
          <td class="td_7_cb"></td>
          <td class="direito"><div class="titulo">(-) Outras Dedu&ccedil;&otilde;es</div>
            <div class="var">&nbsp;</div></td>
          <td class="td_2"></td>
        </tr>
        <tr>
          <td class="td_7_cb"></td>
          <td class="direito"><div class="titulo">(+) Multa / Mora</div>
            <div class="var">&nbsp;</div></td>
          <td class="td_2"></td>
        </tr>
        <tr>
          <td class="td_7_cb"></td>
          <td class="direito"><div class="titulo">(+) Outros Acr&eacute;scimos</div>
            <div class="var">&nbsp;</div></td>
          <td class="td_2"></td>
        </tr>
        <tr>
          <td class="td_7_cb"></td>
          <td class="direito"><div class="titulo">(=) Valor Cobrado</div>
            <div class="var">&nbsp;</div></td>
          <td class="td_2"></td>
        </tr>
      </table>
      <table class="tabelas" style="width:666px; border-left:solid; border-left-width:2px; border-left-color:#000000;" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="td_7_sb"></td>
          <td valign="top"><div class="titulo">Sacado</div>
            <div class="var" style="margin-bottom:5px; height:auto"><?php echo $dadosboleto[ "sacado"]?><br />
              <?php echo $dadosboleto[ "endereco1"]?><br />
              <?php echo $dadosboleto[ "endereco2"]?></div>
            </td>
          <td class="td_7_sb"></td>
          <td class="direito" valign="top"><div class="titulo">CPF / CNPJ</div>
            <div class="var" style="text-align:left;"><?php echo isset($dadosboleto[ "cpf_cnpj"]) ? "<br>".$dadosboleto[ "cpf_cnpj"] : '' ?></div></td>
          <td class="td_2"></td>
        </tr>
      </table>
      <table style="width:666px; border-top:solid; border-top-width:2px; border-top-color:#000000" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="td_7_sb"></td>
          <td style="width: 417px; height:72px;"><?php fbarcode($dadosboleto[ "codigo_barras"]); ?></td>
          <td class="td_7_sb"></td>
          <td valign="top"><div class="titulo" style="text-align:left;">Autentica&ccedil;&atilde;o Mec&acirc;nica / FICHA DE COMPENSA&Ccedil;&Atilde;O</div></td>
          <td class="td_2"></td>
        </tr>
      </table>
    </div>
  </div>
  <div align=right style="padding-right:15px;"> <br>
    Corte na linha pontilhada<br>
    <img height=1 src=paginas/boleto/imagens/6.png width="100%" border="0"> </div>
</div>
