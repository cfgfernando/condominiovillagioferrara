<?
$paginaatual= "?pg=18";
if($_SESSION['CD_MORADOR']){
$sql  = " SELECT * FROM morador WHERE cd_morador = ".$_SESSION['CD_MORADOR'];
$res  = db_query($sql);

$photosmall= db_result($res,"photosmall");
$localA = "img/colaboradores/moradores/alta/";
$localT = "img/colaboradores/moradores/thumbs/";
$tabela = "morador";
$cd = "cd_morador";
$id = $_SESSION['CD_MORADOR'];

} elseif($_SESSION['CD_FUNC']){
$sql  = " SELECT * FROM funcionario WHERE cd_func = ".$_SESSION['CD_FUNC'];
$res  = db_query($sql);

$photosmall= db_result($res,"photosmall");
$local = "funcionarios";
$tabela = "funcionario";
$cd = "cd_func";
$id = $_SESSION['CD_FUNC'];
}else{

}

$sql9  = " SELECT * FROM funcionario WHERE tbmmorador = ".$id;
$res9  = db_query($sql9);
$tbmmorador = db_result($res9,"tbmmorador");
//==========================================AQUI COMEÇA O DA IMAGEM ======================================//
$larguraThumbs=200;
$larguraAlta=600;


	$id_config = 1;
	$ZeraTudo = "";

if($_GET['opcao'] == "inserir"){
	
	// Pega o arquivo upado
	$image = $_FILES["file"]["name"];

	//========================================Não mexer nada daqui ====================================//
	if( empty( $image ) ) {
		echo AlertDanger("Necess&aacute;rio ter uma foto.");
	} else if($_FILES["file"]["type"] == "application/msword") {
		echo AlertDanger("Tipode arquivo inv&aacute;lido. Somente jpg, png ou gif.");
	} else if( $_FILES["file"]["error"] > 0 ) {
		echo AlertDanger("Ops... algo deu errado e n&atilde;o sei o que foi. Contacte o webmaster (19) 98156-0869 (primeiro verifique se o arquivo tem mais de 2mb)");
	} else {

		// divide o arquivo
		$filename = stripslashes( $_FILES['file']['name'] ); 
		$ext = get_file_extension( $filename ); 
		$ext = strtolower( $ext );

		if(( $ext != "jpg" ) && ( $ext != "jpeg" ) && ( $ext != "png" ) && ( $ext != "gif" ) ) {
			echo AlertDanger("Tipode arquivo inv&aacute;lido. Somente jpg, png ou gif.");
			return false;
		} else {

			// pega o tamaalturao do arquivo
			$size = filesize( $_FILES['file']['tmp_name'] );
			
			// pega tamaalturao máximo do arquivo
			$max_upload = ini_get( 'upload_max_filesize' );

			// verifica o tipo de extensão do arquivo enviado e se necessário o converte
			$uploaded_file = $_FILES['file']['tmp_name'];
			if( $ext == "jpg" || $ext == "jpeg" )
				$source = imagecreatefromjpeg( $uploaded_file );
			else if( $ext == "png" )
				$source = imagecreatefrompng( $uploaded_file );
			else
				$source = imagecreatefromgif( $uploaded_file );

			// getimagesize()
			list( $width, $height) = getimagesize( $uploaded_file );
			//echo "aqui".getimagesize( $uploaded_file );
			$ratio = $height / $width;

			// tamaalturao da altura
			$largura = $larguraThumbs;
			//$altura = 59;
			$altura = ceil( $ratio * $largura );
			$dst = imagecreatetruecolor( $largura, $altura );

			// tamaalturao da largura
			$largura1 = $larguraAlta;
			//$altura1 = 500;
			$altura1 = ceil( $ratio * $largura1 );
			$dst1 = imagecreatetruecolor( $largura1, $altura1 );

			imagecopyresampled( $dst, $source, 0, 0, 0,0, $largura, $altura, $width, $height );
			imagecopyresampled( $dst1, $source, 0, 0, 0, 0, $largura1, $altura1, $width, $height );

			// renomeia o arquivo
			$rnd_name = 'imagem_'.uniqid(mt_rand(10, 15)).'_'.time().'baixa.'.$ext;
			$rnd_name1 = 'imagem_'.uniqid(mt_rand(10, 15)).'_'.time().'alta.'.$ext;
//=====================================================ATÉ AQUI=================================================//
			// move para pasta uploads com qyualidade total
			imagejpeg( $dst, $localT.$rnd_name, 100 );
			imagejpeg( $dst1, $localA.$rnd_name1, 100 );

			// apaga se tiver sido criada com sucesso
			imagedestroy( $source );
			imagedestroy( $dst );
			imagedestroy( $dst1 );

			// agora envia a imagem para o banco de dados
			$is_uploaded = db_query( "UPDATE $tabela SET photosmall=\"$rnd_name\", photobig=\"$rnd_name1\" WHERE $cd = ".$id ) or die('Erro: '. mysql_erroror());
			if($tbmmorador != "" || $tbmmorador != 0){
				db_query( "UPDATE funcionario SET photosmall=\"$rnd_name\", photobig=\"$rnd_name1\" WHERE tbmmorador = ".$id);	
			}
			// checa se foi enviado com sucesso.
			if( $is_uploaded ){
				echo AlertSuccess("<b>Arquivo enviado!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona($paginaatual);
			}
			else
				echo AlertWarning("Erro ao enviar arquivo!");
 
		}
 
	}

}
if($_GET['opcao'] == "remover"){
	if (@unlink($localA.db_result($res,"photobig")."")){
		@unlink($localT.db_result($res,"photosmall")."");
	$sql_del = " UPDATE $tabela SET photobig = \"$ZeraTudo\", photosmall = \"$ZeraTudo\" WHERE  $cd = ".$id;
	if($tbmmorador != "" || $tbmmorador != 0){
				db_query( "UPDATE funcionario SET photosmall=\"$ZeraTudo\", photobig=\"$ZeraTudo\" WHERE tbmmorador = ".$id);	
			}
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("<b>Registro apagado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
		Redireciona($paginaatual);
	}
	else
		echo AlertDanger("Erro ao atualizar o registro!");
	}else{
		echo AlertDanger("Erro ao deletar o registro! Verifique as permiss&otilde;es para a pasta do caminho /img/logo/");
	}

}
?>

<? 
 if ($photosmall == ""){ ?>
<form action="<?=$paginaatual?>&opcao=inserir" enctype="multipart/form-data" method="post">
		<div><label for="file">Imagem:</label><br/>
			<input class="form-control" type="file" name="file" />
		</div>
		<div align="center">
			<p><br /><input name="button" type="submit" class="btn btn-primary" id="button" value="Inserir Imagem"></p>
		</div>
</form>
<? } else { ?>
<form action="<?=$paginaatual?>&opcao=remover" enctype="multipart/form-data" method="post">
		<div>
        <div><p>&nbsp;</p></div>
        <img alt="" src="<? 
			  if(file_exists("img/colaboradores/funcionarios/thumbs/{$photosmall}")){
				  echo "img/colaboradores/funcionarios/thumbs/{$photosmall}";
				  }elseif(file_exists("img/colaboradores/moradores/thumbs/{$photosmall}")){
					  echo "img/colaboradores/moradores/thumbs/{$photosmall}";
					  }else{
						  echo "paginas/imagens/funcionario_sem_img.jpg";
						  }?>" class="img-circle img-responsive" width="120px;" />
        </div>
		<div align="left">
			<p><br /><input name="button" type="submit" class="btn btn-primary" id="button" value="Excluir Imagem"></p>
		</div>
</form>
<? } ?>