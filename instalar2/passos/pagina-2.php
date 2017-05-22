<?
include_once "passos/funcoes.php";
include_once "passos/funcoes.bd.php";
include_once "passos/mostra_erros.php";

if($_GET['opcao'] == "cadastrar"){
	
	/*$host = (isset($_POST['host'])) ? trim($_POST['host']) : null;
	$usuario = (isset($_POST['usuario'])) ? trim($_POST['usuario']) : null;
	$senha = (isset($_POST['senha'])) ? trim($_POST['senha']) : null;
	$bancodedados = (isset($_POST['bancodedados'])) ? trim($_POST['bancodedados']) : null;*/

	$host = "127.0.0.1" ;
	$usuario ="root";
	$senha = "root";
	$bancodedados = "condominio";
	
	if(!empty($bancodedados) || !empty($usuario) || !empty($host)){
		function dbTeste($host, $usuario, $senha, $bancodedados){
			try {
				$pdo = new PDO("mysql:host={$host};dbname={$bancodedados};charset=utf8", $usuario, $senha);
				return $pdo;
			} catch (PDOException $e) {
			return false;
			}
		}
		
	if (dbTeste($host, $usuario, $senha, $bancodedados)){
		if( file_put_contents('../paginas/config.inc.php',
			'<? '
			.''
			.'$host = '. "'{$host}'; \n"
			.'$usuario = '. "'{$usuario}'; \n"
			.'$senha = '. "'{$senha}'; \n"
			.'$banco= '. "'{$bancodedados}'; \n"
			.'?>'
			) &&
			file_put_contents('../superuser/paginas/config.inc.php',
			'<? '
			.''
			.'$host = '. "'{$host}'; \n"
			.'$usuario = '. "'{$usuario}'; \n"
			.'$senha = '. "'{$senha}'; \n"
			.'$banco= '. "'{$bancodedados}'; \n"
			.'?>'
			)
			){
			AlertSuccess("Adicionado com sucesso! Aguarde que voc&ecirc; ser&aacute; redirecionado...");
			RedirecionaRapido("?passo=3");
			} else {
				AlertDanger("Ocorreu um erro! Verifique as permiss&otilde;es das pastas");
			}
	}else {
		AlertDanger("Desculpe, mas n&atilde;o foi poss&iacute;vel conectar ao banco de dados informado");	
	}
	}else {
		AlertInfo("Se for hostinger entre com mysql.hostinger.com.br");	
	}
}
?>

<div>
<div align="center"><p style="font-size:19px; padding-top:20px;"><b>ENTRE COM OS DADOS DE SUA HOSPEDAGEM</b></p></div>
<form action="?passo=2&opcao=cadastrar" method="post">
Host:<br />
<input name="host" id="host" type="text" class="form-control" ><br />
Usu&aacute;rio:<br />
<input name="usuario" id="usuario" type="text" class="form-control" ><br />
Senha:<br />
<input name="senha" id="senha" type="text" class="form-control" ><br />
Nome do Banco de dados:<br />
<input name="bancodedados" id="bancodedados" type="text" class="form-control" ><br /><br />
<input name="button" type="submit" class="btn btn-default" id="button" value="Avan&ccedil;ar">
</form>
</div>