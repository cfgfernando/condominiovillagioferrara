<?
function LimpaFloat(){
$msg1 = "<div class='clearfix'></div>";
return $msg1;
}
	//Fun��es de alerta
	function AlertDanger($texto1){
		$msg1 = "<center><p><font class='alert alert-danger'>".$texto1."</font></p></center>";
		return $msg1;
	}
	function AlertSuccess($texto3){
		$msg3 = "<center><p><font class='alert alert-success'>".$texto3."</font></p></center>";
		return $msg3;
	}
	function AlertWarning($texto2){
		$msg2 = "<center><p><font class='alert alert-warning'>".$texto2."</font></p></center>";
		return $msg2;
	}
	
	function AlertInfo($texto4){
		$msg4 = "<center><p><font class='alert alert-info'>".$texto4."</font></p></center> </br></br>";
		return $msg4;
	}
	//funcao para slide show
	function get_file_extension( $file )  {
		if( empty( $file ) )
			return;
	
		$ext = end(explode( ".", $file ));
		return $ext;
	}
	//funcao para links do mapa do google
	function LimpaLinkGoogle($link){
	
		$tiraOPrimeiro =  str_replace('<iframe src="','',$link);
	
		$tiraOSegundo = str_replace('" width="600" height="450" frameborder="0" style="border:0"></iframe>','',$tiraOPrimeiro);
	
		return $tiraOSegundo;
	
	}
	
	function CompletaLinkGoogle($link){
		$linkCompleto = '<iframe src="'.$link.'" width="600" height="450" frameborder="0" style="border:0"></iframe>';
		return $linkCompleto;
	}

	//Fun��o Somente alert
	function Alert($value) {
		echo "<script>alert(\"$value\")</script>";
	}
	
	
	// Redireciona para outra p�gina:
	function Redireciona($url){
		echo "<script>
			setTimeout('document.location.href=\"$url\"', 3000);
			</script>";
	}
		function RedirecionaRapido($url){
		echo "<script>
			document.location.href=\"$url\";
			</script>";
	}
	
	// Volta o n�mero de p�ginas informado:
	function Voltar($nr){
		$valor = "-".$nr;
		echo "<script>
			history.go(\"$valor\");
			</script>";
	}
	
	
	//Fun��o Para fechar a p�gina atual
	function FechaPagina() {
		echo "<script> window.close(); </script>";
	}
	
	
	// Fun��o Confirm em JS
	function Confirm($url){
		echo "<script> confirm(\"$url\"); </script>";
	}
	
	
	// Pega a url da p�gina atual:
	function P�ginaAtual(){
		return $_SERVER["HTTP_HOST"].$PHP_SELF;
	}
	
	
	// Conta o n�mero de registros na tabela do banco de dados
	function ContaQuery($tabela){
		$sql = "SELECT * FROM $tabela";
		$res = mysql_query($sql);
		$resultado = @mysql_num_rows($res);
		return $resultado;
	}
	
	
	// Atualiza a p�gina pai do PopUp
	function AtualizaPaginaPai($value){
		echo "<script>
		        opener.location.href=\"$value\";
		      </script>";
	}
	
	
	// Converte o valor de moeda para exibi��o: Resultado: 24.000,00
	function ConverteReal($valor){
		return @number_format($valor,2,",",".");
	}
	
	
	// Converte o valor de moeda para o cadastro no banco de dados . Deve vir: 22.000,00
	function ConverteRealCad($valor){
		return str_replace(",",".",str_replace(".","",$valor));
	}
	
	
	// Fun��o para limpar o http do link
	function LimpaLink($url_link){
		if( substr( $url_link, 0 ,7 ) == "http://" ){
			$tamanho = strlen($url_link); ##CUIDADO## Necessita da fun��oStringLenght
			$url_link = substr($url_link,7,$tamanho);
		}
		if( substr( $url_link, 0 ,8 ) == "https://" ){
			$tamanho = strlen($url_link); ##CUIDADO## Necessita da fun��oStringLenght
			$url_link = substr($url_link,8,$tamanho);
		}
		return $url_link;
	}
	

	// Gera Menus List Combo
	function GeraCombo($inicio,$fim){
		$option = "";
		for($i=$inicio; $i<($fim+1); $i++){
			$option .= " <option value=$i>$i</option> ";
		}
		return $option;
	}

	
	// Conta o n�mero de caracteres de uma string:
	function ContaString($string){
		return count( str_split($string) );
	}


	// Traz a �ltima ocorr�ncia do 'campo' na base de dados
	function MaxCampo($cd,$tabela){
		$sql_max = "SELECT MAX($cd) as cd_max FROM $tabela";
		$res_max = mysql_query($sql_max);
		$cd_max  = @mysql_result($res_max, 0, "cd_max") + 1 ;
		return $cd_max;
	}

	
	// Gera uma sequ�ncia de n�meros aleat�rios:
	function gera_chave($digitos) {
		$chave = '';
        $sopinha = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
		srand((double)microtime()*1000000); 
		for($i=0; $i<$digitos; $i++) { 
            $chave .= $sopinha[rand()%strlen($sopinha)]; 
        }
		return $chave;
    }
	
	
	// Troca os caracteres especiais
	function CaracteresEspeciais($campo) {
		$campo = strtolower($campo);
		$campo = trim($campo);
		$campo = str_replace("  ", " ", $campo);
		$campo = str_replace(" ", "_", $campo);
		$ac_min = "������������������������������������������������";
		$ac_mai = "ncaeiouaeiouaeiouaoaeiouncaeiouaeiouaeiouaoaeiou";
		for($i=0; $i < 48; $i++) {
			$acento = substr($ac_min, $i, 1);
			$acentom = substr($ac_mai, $i, 1);
			$campo = str_replace($acento, $acentom, $campo);
		}
		if(strstr($campo, ".tar.gz")){
			$extensao = ".tar.gz";
		}
		else{
			$extensao = strrchr($campo, ".");
		}
		$campo = substr(str_replace($extensao, "", $campo), 0, 20);
		$campo = $campo.$extensao;

		return $campo;
	}

	
	// Conta o n�mero de arquivos existentes num diret�rio
	function ContaArquivosDiretorio($diretorio){
		if ($handle = opendir($diretorio)) {
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					$contador += 1;
				}
			}
			closedir($handle);
		}
		return $contador;
	}
	
	
	// Exibe os arquivos existentes num diret�rio
	function ExibeArquivosDiretorio($diretorio){
		if ($handle = opendir($diretorio)) {
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					$retorno .= " $file <br /> ";
				}
			}
			closedir($handle);
		}
		return $retorno;
	}
	
	
	// Fun��o para valida��o de E-mail
	function ValidaEmail($addr){
        if(ereg("^[a-zA-Z0-9_.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$",$addr))
            return true;
        else
            return false;
    }
	
	
	// Fun��o para valida��o de CPF
	function ValidaCPF($cpf3) {
		$cpf2 = str_replace('.',"",$cpf3);
		$cpf = str_replace('-',"",$cpf2);
        if (strlen($cpf) != 11) {
            return false;
        } 
        else {
            for($i = 1; $i < 10; $i++) {
                $n[$i] = substr($cpf,$i-1,1);
            }
            $d[1] = substr($cpf,9,1);
            $d[2] = substr($cpf,10,1);
            $conta1 = $n[9]*2+$n[8]*3+$n[7]*4+$n[6]*5+$n[5]*6+$n[4]*7+$n[3]*8+$n[2]*9+$n[1]*10;
            $dig1 = 11 - ($conta1 % 11);
        
            if ($dig1 >= 10){
                $dig1 = 0;
            }
        
            $conta2 = $dig1*2+$n[9]*3+$n[8]*4+$n[7]*5+$n[6]*6+$n[5]*7+$n[4]*8+$n[3]*9+$n[2]*10+$n[1]*11;
            $dig2 = 11 - ($conta2 % 11);

            if ($dig2 >= 10){
                $dig2 = 0;
            }
            
            if ($d[1] == $dig1 and $d[2] == $dig2 and $cpf != '00000000000'
                                                  and $cpf != '11111111111'
                                                  and $cpf != '22222222222'
                                                  and $cpf != '33333333333'
                                                  and $cpf != '44444444444'
                                                  and $cpf != '55555555555'
                                                  and $cpf != '66666666666'
                                                  and $cpf != '77777777777'
                                                  and $cpf != '88888888888'
                                                  and $cpf != '99999999999') {
                return true;
            } 
            else {
                return false;
            }
        }
    }
	
	
	// Converte a data de FormatoAmericano - FormatoBrasil (vice-versa)
	function ConverteData($Data){
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
	
	
	#---
	// Esta fun��o retorna o mes atual;
	# Para chamar ela use: ConverteMes(date('n'));
	function ConverteMes($mes){
		$mes_completo = array ('', 'Janeiro', 'Fevereiro', 'Mar�o', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
		$mes = $mes_completo[date('n')];
		return $mes;
	} // FIM function ConverteMes($mes) 
	
	
	#---
	// Esta fun��o retorna o dia da semana em portugu�s;
	# Para chamar ela use: DiasSemana(date('l'));
	function DiasSemana ($hoje) {
		if ($hoje == "Monday"){
			$hoje = "Segunda";
		}
		elseif ($hoje == "Tuesday"){
			$hoje = "Ter�a";
		}
		elseif ($hoje == "Wednesday"){
			$hoje = "Quarta";
		}
		elseif ($hoje == "Thursday"){
			$hoje = "Quinta";
		}
		elseif ($hoje == "Friday"){
			$hoje = "Sexta";
		}
		elseif ($hoje == "Saturday"){
			$hoje = "S�bado";
		}
		elseif ($hoje == "Sunday"){
			$hoje = "Domingo";
		}
		
		return $hoje;

	} // FIM function DiasSemana ($hoje)
	
	
	// Exibe a data atual, no seguinte formato: Segunda, 00 de Outubro de 2007
	function DataCompleta(){
		return DiasSemana(date('l')).", ".date('d')." de ".ConverteMes(date('n'))." de ".date('Y');
	}
	
	
	// Chama uma tela para download de arquivo
	function Download($NMARQUIVO,$FISICO){
		/*if (isset($_GET['NMARQUIVO'])) $NMARQUIVO = $_GET['NMARQUIVO'];
		if (isset($_GET['FISICO'])) $FISICO = $_GET['FISICO'];*/
	
		if ($NMARQUIVO == "")
			$NMARQUIVO = $FISICO;
	
		// EXTENS�O DO ARQUIVO
		$EXT = str_replace(".", "", strrchr($NMARQUIVO, "."));
		
		//Aparece ja com o tipo para o usuario salvar
		switch($EXT){
		   case "pdf": $ctype="application/pdf";               break;
		   case "exe": $ctype="application/octet-stream";      break;
		   case "zip": $ctype="application/zip";               break;
		   case "doc": $ctype="application/msword";            break;
		   case "xls": $ctype="application/vnd.ms-excel";      break;
		   case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
		   case "gif": $ctype="image/gif";                     break;
		   case "png": $ctype="image/png";                     break;
		   case "jpg": $ctype="image/jpg";                     break;
		   default:    $ctype="application/force-download";
		}
	
		if (file_exists($FISICO)){
			if($fp = fopen ($FISICO, "r")){
				header("Content-Type: $ctype");
				header("Content-Disposition: attachment; filename=\"". $NMARQUIVO ."\"");
				header("Content-Length: " . filesize ($FISICO));
				header("Content-Transfer-Encoding: binary");
				fpassthru($fp);
				fclose ($fp);
			} else {
				?>
<script>
					alert('O arquivo especificado n�o p�de ser aberto');	
					history.go(-1);		
				</script>
<?
			}
		} else {
			?>
<script>
				alert('Arquivo especificado n�o foi encontrado:\n<? echo $FISICO ?>');
				history.go(-1);
			</script>
<?		
		}
	} // Fim da Fun��o de Downloads


	// Gera Thumbs de paginas/imagens// Para chamar:  GeraThumb("uploads/noticias/".$imagem,"mini",17,89,67)
	function GeraThumb($imagem,$tamanho,$substr,$largura_fixa,$altura_fixa){
		// **** configura��es da miniatura *******
		#$largura_fixa = 160;    // usado somente com tamanho_fixo=S
		#$altura_fixa  = 120;     // usado somente com tamanho_fixo=S
		$qualidade    = 100;    // geralmente usado em 100
		// **************************************
		
		if(!file_exists($imagem)){
			echo "Arquivo da imagem n�o encontrado!";
			exit;
		}
		
		// monta o nome do arquivo resultante
		$arquivo_miniatura = explode('.', $imagem);
		$arquivo_miniatura = $arquivo_miniatura[0]."_".$tamanho.".jpg";
		
		// l� a imagem de origem e obt�m suas dimens�es
		$img_origem = imagecreatefromjpeg($imagem);
		$origem_x = imagesx($img_origem);
		$origem_y = imagesy($img_origem);
		
		// Calcula as dimens�es da miniatura
		$x = $largura_fixa;
		$y = $altura_fixa;
		
		// cria a imagem final, que ir� conter a miniatura
		$img_final = imagecreatetruecolor($x,$y);
		
		// copia a imagem original redimensionada para dentro da imagem final
		imagecopyresampled($img_final, $img_origem, 0, 0, 0, 0, $x+1, $y+1, $origem_x , $origem_y);
		
		// salva o arquivo
		imagejpeg($img_final, $arquivo_miniatura, $qualidade);
		
		// libera a mem�ria alocada para as duas imagens
		imagedestroy($img_origem);
		imagedestroy($img_final);
		
		# como n�o precisa ser gravado no banco, apenas salva a imagem;
		# esta parte serve para montar o arquivo, porque ele vem com o direct�rio tbm. Ex.: uploads/noticias/nome_da_imagem.jpg
		#monta o novo nome do arquivo:
		//return substr($arquivo_miniatura, $substr);
	}
	
	
	// Gera Thumbs de paginas/imagens// Se precisar do nome da imagem para retorno, inserira um valor qualquer na �ltima propriedade
	// Para chamar:  GeraThumb("uploads/noticias/",$imagem,"mini",89,67)
	function GeraThumb2($diretorio,$imagem,$tamanho,$largura_fixa,$altura_fixa,$retorno=""){
		// **** configura��es da miniatura *******
		$qualidade    = 100;
		// **************************************
		
		if(!file_exists($diretorio.$imagem)){
			return "Arquivo da imagem n�o encontrado!";
		}
		
		// monta o nome do arquivo resultante
		$arquivo_thumb = explode('.', $diretorio.$imagem);
		$arquivo_thumb = $arquivo_thumb[0]."_".$tamanho.".jpg";
		
		// l� a imagem de origem e obt�m suas dimens�es
		$img_origem = ImageCreateFromJPEG($diretorio.$imagem);
		$origem_x = ImagesX($img_origem);
		$origem_y = ImagesY($img_origem);
		
		// Calcula as dimens�es da miniatura
		$x = $largura_fixa;
		$y = $altura_fixa;
		
		// cria a imagem final, que ir� conter a miniatura
		$img_final = ImageCreateTrueColor($x,$y);
		
		// copia a imagem original redimensionada para dentro da imagem final
		imagecopyresampled($img_final, $img_origem, 0, 0, 0, 0, $x+1, $y+1, $origem_x , $origem_y);
		
		// salva o arquivo
		imagejpeg($img_final, $arquivo_thumb, $qualidade);
		
		// libera a mem�ria alocada para as duas imagens
		imagedestroy($img_origem);
		imagedestroy($img_final);
		
		// Retorno do nome da imagem
		if($retorno != "")
			return $arquivo_thumb;
	}
	
	
	function TestaImagem($cd_max,$imagem,$retorno=""){
		$imagem = strtolower($imagem);  // Todos os caracteres min�sculos
		$extensoes_validas = array(".jpg",".jpeg"); // extens�es permitidas para o upload:
		$extensao = strrchr($imagem,'.');
		if (!in_array($extensao,$extensoes_validas)){
			$msg = "<font color='red'> Extens�o de imagem inv�lida. <br> S�o permitidos apenas imagens na extens�o: .jpg .jpeg </font>";
		}
		else{
			$imagem = $cd_max.$extensao; // Concatena o nome do arquivo original com c�digo m�ximo da tabela;
		}
		if($retorno != "")
			return $imagem;
	}

	class Funcoes {
		function getFileError($__error) {
			switch ($__error) {
				case UPLOAD_ERR_INI_SIZE:
					return "O arquivo no upload � maior do que o limite definido.";
				break;
				case UPLOAD_ERR_FORM_SIZE:
					return "O arquivo ultrapassa o limite de tamanho em que foi especificado no formul�rio.";
				break;
				case UPLOAD_ERR_PARTIAL:
					return "O upload do arquivo foi feito parcialmente.";
				break;
				case UPLOAD_ERR_NO_FILE:
					return "N�o foi feito o upload do arquivo.";
				break;
			}

			return "";
		}

		function getImageResize($file, $size, $destino = "") {
			ini_set("memory_limit", "60M");

			if (function_exists("exif_imagetype") && exif_imagetype($file) == IMAGETYPE_GIF)
				$im = imagecreatefromgif($file);
			else
			if (function_exists("exif_imagetype") && exif_imagetype($file) == IMAGETYPE_PNG)
				$im = imagecreatefrompng($file);
			else
				$im = imagecreatefromjpeg($file);

			$w = imagesx($im);
			$h = imagesy($im);

			$__x = 0;

			if (strpos($size, "x") === false) {
				if ($size < 0) {
					$w_d = (int)($w / ($size * -1));
					$h_d = (int)($h / ($size * -1));
				}
				else {
					$w_d = (int)($w * $size);
					$h_d = (int)($h * $size);
				}
			}
			else {
				if (preg_match("/in\(([0-9]+)x([0-9]+)\)/", $size, $m)) {// range, entre esses valores
					$w_i = $m[1];
					$h_i = $m[2];

					if (($w_i / $w) >= ($h_i / $h))
						$alpha = $h_i / $h;
					else
						$alpha = $w_i / $w;
					$size = ceil($w * $alpha). "x";// . (int)($h * $alpha);

					//$w_d = ceil($w * $alpha);
					//$h_d = ceil($h * $alpha);
				}

				$size = explode('x', $size);
				$w_d = @$size[0];
				$h_d = @$size[1];

				$alpha = ($w_d / $w);
				if ($h < (int)($h_d / $alpha)) {
					$alpha = ($h_d / $h);
					$__x = (int)(($w - ($w_d / $alpha)) / 2);
				}

				$w = (int)($w_d / $alpha);
				if ($h_d)
					$h = (int)($h_d / $alpha);
				else // caso n�o for passado a altura, pega proporcional
					$h_d = (int)($h * $alpha);
			}
			$im_d = imagecreatetruecolor($w_d, $h_d);

			//if (function_exists("imagefilter"))
			//	imagefilter($im, IMG_FILTER_SMOOTH, 0);

			//imagecopyresized (   ,    , dstX, dstY, srcX, srcY, dstW, dstH, srcW, int srcH)
			if( function_exists("imagecopyresampled") )
				imagecopyresampled($im_d, $im, 0, 0, $__x, 0, $w_d, $h_d, $w, $h);
			else
				imagecopyresized($im_d, $im, 0, 0, $__x, 0, $w_d, $h_d, $w, $h);

			if ($destino)
				imagejpeg($im_d, $destino);

			return $im_d;
		}
	}

	class IMG {
		public static function getURL($source, $size) {
			if (!is_file($source))
				return "";

			clearstatcache();

			$name = basename($source);
			$path = dirname(__file__) . "/";

			if (!is_dir($path . "/tmp/"))
				mkdir($path . "/tmp/", 0777);

			$tmp = sprintf("tmp/%s-%s", $size, $name);

			if (@filemtime($path . "/" . $tmp) < @filemtime($source) || (@$_SERVER["HTTP_CACHE_CONTROL"] == "no-cache"))
				@unlink($path . "/" . $tmp);

			if (!file_exists($path . "/" . $tmp)) {
				$im = Funcoes::getImageResize($source, $size);

				imagejpeg($im, $path . "/" . $tmp);
				chmod($path . "/" . $tmp, 0777);
			}

			return $tmp;
		}

		function imgTag($url, $args="") {
			return "<img src=\"$url\" $args />";
		}
	}
	
	
	//Login
	
	if ( (! $_SESSION['CD_CAT_USUARIO']) or (trim($_SESSION["CD_CAT_USUARIO"]) == "") ){
		$logado = "offline";
	}
	else{
		$logado = "online";
	}
	
	if($_GET['opcao'] == "logar"){
		$login_usuario = $_POST['login'];
		$senha_usuario = md5($_POST['senha']);
		$msg = "";
		
	if($login_usuario == "")
		echo AlertDanger("Favor preencher o campo login!");
	if($senha_usuario == "")
		echo AlertDanger("Favor preencher o campo senha!");
		
	if($msg == ""){
			$sql  = " SELECT *
						FROM morador
							,usuario_categoria
							WHERE morador.login_usuario = \"$login_usuario\"
							AND morador.senha_usuario = \"$senha_usuario\"
							AND usuario_categoria.cd_cat_usuario = \"4\" "; 
			$res  = mysql_query($sql);
			$rows = mysql_num_rows($res);
				
	if(mysql_num_rows($res) == 0){
		echo AlertDanger("Login e/ou usu&aacute;rio n&atilde;o conferem!");
	}else{
		$CD_MORADOR = db_result($res,"cd_morador");
				
		$_SESSION['CD_MORADOR']	= $CD_MORADOR;
					
		$CD_CAT_USUARIO = db_result($res,"cd_cat_usuario");		
			If ($CD_CAT_USUARIO == 4){
				RedirecionaRapido("?pg=1");
			} else {
				Redireciona("?pg=24");
				echo AlertDanger("Usu&aacute;rio sem permiss&otilde;es!");
			}
		}
	}
	if($msg == ""){
		$CD_CAT_USUARIO = mysql_result($res,0);
		session_cache_expire(90); //90 minutos
		$_SESSION['CD_CAT_USUARIO'] = $CD_CAT_USUARIO;
	
		if ($CD_CAT_USUARIO == 4){
			$codigoMorador=$CD_MORADOR;
			Redireciona("?pg=1");
	
		}else{
			$codigoMorador=$CD_MORADOR;
			Redireciona("?pg=24");
		} 
	}
}

?>