<div style="width:710px; min-width:710px; max-width:710px; background-color:#FFFFFF;">
<style type="text/css">
.btn {
  display: inline-block;
  margin-bottom: 0;
  font-weight: normal;
  text-align: center;
  vertical-align: middle;
  cursor: pointer;
  background-image: none;
  border: 1px solid transparent;
  white-space: nowrap;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.428571429;
  border-radius: 5px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.btn:focus,
.btn:active:focus,
.btn.active:focus {
  outline: thin dotted;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;
}
.btn:hover,
.btn:focus {
  color: #333333;
  text-decoration: none;
}
.btn:active,
.btn.active {
  outline: 0;
  background-image: none;
  -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
  box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}
.btn.disabled,
.btn[disabled],
fieldset[disabled] .btn {
  cursor: not-allowed;
  pointer-events: none;
  opacity: 0.65;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
  box-shadow: none;
}
.btn-primary {
  color: #ffffff;
  background-color: #33747a;
  border-color: #2b6368;
}
.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active,
.btn-primary.active,
.open .dropdown-toggle.btn-primary {
  color: #ffffff;
  background-color: #27595d;
  border-color: #193a3d;
}
.btn-primary:active,
.btn-primary.active,
.open .dropdown-toggle.btn-primary {
  background-image: none;
}
.btn-primary.disabled,
.btn-primary[disabled],
fieldset[disabled] .btn-primary,
.btn-primary.disabled:hover,
.btn-primary[disabled]:hover,
fieldset[disabled] .btn-primary:hover,
.btn-primary.disabled:focus,
.btn-primary[disabled]:focus,
fieldset[disabled] .btn-primary:focus,
.btn-primary.disabled:active,
.btn-primary[disabled]:active,
fieldset[disabled] .btn-primary:active,
.btn-primary.disabled.active,
.btn-primary[disabled].active,
fieldset[disabled] .btn-primary.active {
  background-color: #33747a;
  border-color: #2b6368;
}
.btn-primary .badge {
  color: #33747a;
  background-color: #ffffff;
}
</style>
<div align="center"><input class="btn btn-primary" type="button" name="imprimir" value="Imprimir" onclick="imprimir();"></div>
<?php
include_once "../../mostra_erros.php";
include_once ("../config.php");

function ConverterData($Data){
		 if (strstr($Data, "/")){//verifica se tem a barra /
		   $d = explode ("/", $Data);//tira a barra
		   $rstData = "$d[2]-$d[1]-$d[0]";//separa as datas $d[2] = ano $d[1] = mes etc...
		   return $rstData;
		 } elseif(strstr($Data, "-")){
		   $d = explode ("-", $Data);
		   $rstData = "$d[2]/$d[1]/$d[0]";
		   return $rstData;
		 }else{
		   return "Data invalida";
		 }
    }



//Pega dados do morador
$cd_morador = $_GET['id'];
$mes_dtmora = $_GET['mes'];

$sql_mora  = " SELECT * FROM morador WHERE cd_morador = ".$cd_morador;
$res_mora  = db_query($sql_mora);
$rows_mora = db_num_rows($res_mora);

$sql_dtmora  = " SELECT * FROM  dados_morador WHERE  idmorador_dtmora LIKE  '".$cd_morador."' AND  mes_dtmora LIKE  '".$mes_dtmora."' ";
$res_dtmora  = db_query($sql_dtmora);
$rows_dtmora = db_num_rows($res_dtmora);
$valoracres1_dtmora = db_result($res_dtmora,"valoracres1_dtmora");
$valoracres2_dtmora = db_result($res_dtmora,"valoracres2_dtmora");
$demonstrativo2 = db_result($res_dtmora,"demonstrativo2_dtmora");
$demonstrativo3 = db_result($res_dtmora,"demonstrativo3_dtmora");
$dadosboleto["nosso_numero"] = db_result($res_dtmora,"nossonum_dtmora");  // Nosso numero sem o DV - REGRA: Máximo de 11 caracteres!
$dadosboleto["numero_documento"] = db_result($res_dtmora,"numdoc_dtmora");	// Se for bradesco, numero do documento = nosso numero

$valor_cobrado = db_result($res_dtmora,"valor_dtmora");

$dadosboleto["data_vencimento"] = ConverterData(db_result($res_dtmora,"venc_dtmora"));

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = db_result($res_mora,"nm_morador"); //"Nome do seu Cliente";
$dadosboleto["endereco1"] = db_result($res_mora,"ds_endereco").", ".db_result($res_mora,"nr_endereco")." - ".db_result($res_mora,"ds_complemento")." - ".db_result($res_mora,"nm_bairro") ; //"Endereço do seu Cliente";
$dadosboleto["endereco2"] = db_result($res_mora,"nm_cidade")." - ".db_result($res_mora,"sg_uf")." - CEP: ".db_result($res_mora,"nr_cep");//"Cidade - Estado -  CEP: 00000-000";


//Pega os dados do banco ativo
$id_dtbnc = $_GET['bol']+1;
$sql_dtbnc  = " SELECT * FROM dados_banco WHERE id_dtbnc = $id_dtbnc ";
$res_dtbnc  = db_query($sql_dtbnc);
$rows_dtbnc = db_num_rows($res_dtbnc);

$status = 	db_result($res_dtbnc,"status_dtbnc");


//$dadosboleto["data_vencimento"] = ConverterData(db_result($res_dtbnc,"datavenc_dtbnc"));
$dadosboleto["data_documento"] = date("d/m/Y");
$dadosboleto["data_processamento"] = date("d/m/Y");
$dadosboleto["local_pagamento"] = db_result($res_dtbnc,"localpgto_dtbnc");
$taxa_boleto = db_result($res_dtbnc,"txboleto_dtbnc");

$dadosboleto["imagem_dtbnc"] = db_result($res_dtbnc,"imagem_dtbnc");

$dadosboleto["carteira"] = db_result($res_dtbnc,"carteira_dtbnc");
$contaCedente = db_result($res_dtbnc,"contacedente_dtbnc");
$dadosboleto["conta_cedente"] = $contaCedente;
$dadosboleto["codigo_cedente"] = $contaCedente;
$dadosboleto["codigo_cliente"] = $contaCedente;
$dadosboleto["conta_cedente_dv"] = db_result($res_dtbnc,"digcontacedente_dtbnc");

$dadosboleto["ponto_venda"] = db_result($res_dtbnc,"agencia_dtbnc"); //Banespa, Santander Banespa
// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //
// DADOS DA SUA CONTA
$dadosboleto["agencia"] = db_result($res_dtbnc,"agencia_dtbnc"); 			//Bradesco, BB, itau, Real
$dadosboleto["agencia_dv"] = db_result($res_dtbnc,"digagencia_dtbnc"); 		//Bradesco
$dadosboleto["conta"] = db_result($res_dtbnc,"conta_dtbnc"); 				//Bradesco, BB, itau, Real
$dadosboleto["conta_dv"] = db_result($res_dtbnc,"digconta_dtbnc"); 			//Bradesco, itau

//DADOS PERSONALIZADOS
//CAIXA
$dadosboleto["campo_fixo_obrigatorio"] = "1";       // campo fixo obrigatorio - valor = 1 
$dadosboleto["inicio_nosso_numero"] = "9";          // Inicio do Nosso numero - obrigatoriamente deve começar com 9;
//SANTANDER BANESPA
$dadosboleto["carteira_descricao"] = "COBRANÇA SIMPLES - CSR";  // Descrição da Carteira
//BB
$dadosboleto["convenio"] = db_result($res_dtbnc,"convenio_dtbnc");  // Num do convênio - REGRA: 6 ou 7 ou 8 dígitos
$dadosboleto["contrato"] = db_result($res_dtbnc,"contrato_dtbnc"); // Num do seu contrato
$dadosboleto["variacao_carteira"] = db_result($res_dtbnc,"variacao_carteira_dtbnc");  // Variação da Carteira, com traço (opcional)

$dadosboleto["formatacao_convenio"] = db_result($res_dtbnc,"formatacao_convenio_dtbnc"); // REGRA: 8 p/ Convênio c/ 8 dígitos, 7 p/ Convênio c/ 7 dígitos, ou 6 se Convênio c/ 6 dígitos
$dadosboleto["formatacao_nosso_numero"] = db_result($res_dtbnc,"formatacao_nosso_numero_dtbnc"); // REGRA: Usado apenas p/ Convênio c/ 6 dígitos: informe 1 se for NossoNúmero de até 5 dígitos ou 2 para opção de até 17 dígitos

	function getGet( $key ){
		return isset( $_GET[ $key ] ) ? $_GET[ $key ] : null;
	}
	$pag = getGet("bol");
	
	switch ($pag) {
        case 0:
		if ($status == 1){
			include_once ("config.php");
			include("include/funcoes_bradesco.php");
			include("include/master.php");
		}else{
			
		}
			break;
		case 1:
		if ($status == 1){
			include_once ("config.php");
			include("include/funcoes_bb.php"); 
			include("include/masterbb.php");
			break;
		}else{
			
		}
		case 2:
		if ($status == 1){
			include_once ("config.php");
			include("include/funcoes_banespa.php"); 
			include("include/master.php");
			break;
		}else{
			
		}
		case 3:
		if ($status == 1){
			include_once ("config.php");
			include("include/funcoes_hsb.php"); 
			include("include/master.php");
			break;
		}else{
			
		}
		case 4:
		if ($status == 1){
			include_once ("config.php");
			include("include/funcoes_itau.php"); 
			include("include/master.php");
			break;
		}else{
			
		}
		case 5:
		if ($status == 1){
			include_once ("config.php");
			include("include/funcoes_real.php"); 
			include("include/master.php");
			break;
		}else{
			
		}
		case 6:
		if ($status == 1){
			include_once ("config.php");
			include("include/funcoes_santander_banespa.php"); 
			include("include/master.php");
			break;
		}else{
			
		}
		case 7:
		if ($status == 1){
			include_once ("config.php");
			include("include/funcoes_cef_sinco.php"); 
			include("include/master.php");
			break;
		}else{
			
		}
	}

?>
</div>