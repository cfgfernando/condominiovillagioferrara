<?

$sql_boleto  = " SELECT * FROM dados_boleto";
$res_boleto  = db_query($sql_boleto);
$rows_boleto = db_num_rows($res_boleto);

$razao_social = db_result($res_boleto,"razaosoc_dtboleto");
$cnpj = db_result($res_boleto,"cnpj_dtboleto");

$instrucoes1 = db_result($res_boleto,"instrucoes1_dtboleto");
$instrucoes2 = db_result($res_boleto,"instrucoes2_dtboleto");
$instrucoes3 = db_result($res_boleto,"instrucoes3_dtboleto");
$instrucoes4 = db_result($res_boleto,"instrucoes4_dtboleto");

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$valor_boleto=$valor_cobrado+$taxa_boleto+$valoracres1_dtmora+$valoracres2_dtmora;
$dadosboleto["quantidade"] = "1";
$dadosboleto["valor_unitario"] = number_format($valor_boleto, 2, ',', '');
$dadosboleto["aceite"] = "";	
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";

$dadosboleto["valor_boleto"] = number_format($valor_boleto*$dadosboleto["quantidade"], 2, ',', ''); 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// INFORMACOES PARA O CLIENTE
if ($taxa_boleto != 0 || $taxa_boleto != "")
	$mensagem = "<br>Taxa boleto banc&aacute;rio - R$ $taxa_boleto";
	$dadosboleto["demonstrativo1"] = "Mensalidade referente a taxa de condom&iacute;nio $mensagem";


	$dadosboleto["demonstrativo2"] = "Acrescimos: ".$demonstrativo2." - R$: ".$valoracres1_dtmora;

	$dadosboleto["demonstrativo3"] = "Acrescimos: ".$demonstrativo3." - R$: ".$valoracres2_dtmora;


// INSTRUÇÕES PARA O CAIXA
$dadosboleto["instrucoes1"] = "- ".$instrucoes1;
$dadosboleto["instrucoes2"] = "- ".$instrucoes2;
$dadosboleto["instrucoes3"] = "- ".$instrucoes3;
$dadosboleto["instrucoes4"] = $instrucoes4;

// SEUS DADOS
$dadosboleto["identificacao"] = $titulo_pagina;
$dadosboleto["cpf_cnpj"] = $cnpj;
$dadosboleto["endereco"] = $nossoEndereco;
$dadosboleto["cidade_uf"] = $nossaCidade;
$dadosboleto["cedente"] = $razao_social;

?>