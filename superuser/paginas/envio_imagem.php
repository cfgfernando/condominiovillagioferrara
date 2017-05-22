<?
$sql  = " SELECT * FROM configuracoes WHERE  id_config = 1 ";
$res  = db_query($sql);
$rows = db_num_rows($res);

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
			imagejpeg( $dst, '../img/logo/thumbs/'.$rnd_name, 100 );
			imagejpeg( $dst1, '../img/logo/alta/'.$rnd_name1, 100 );

			// apaga se tiver sido criada com sucesso
			imagedestroy( $source );
			imagedestroy( $dst );
			imagedestroy( $dst1 );

			// agora envia a imagem para o banco de dados
			$is_uploaded = mysql_query( "UPDATE configuracoes SET photosmall=\"$rnd_name\", photobig=\"$rnd_name1\" WHERE id_config = ".$id_config ) or die('erroror inserting data '. mysql_erroror());

			// checa se foi enviado com sucesso.
			if( $is_uploaded ){
				echo AlertSuccess("<b>Arquivo enviado!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=22");
			}
			else
				echo AlertWarning("Erro ao enviar arquivo!");
 
		}
 
	}

}
if($_GET['opcao'] == "excluir"){
	if (@unlink("../img/logo/alta/".db_result($res,"photobig")."")){
		@unlink("../img/logo/thumbs/".db_result($res,"photosmall")."");
	$sql_del = " UPDATE configuracoes SET photobig = \"$ZeraTudo\", photosmall = \"$ZeraTudo\" WHERE  id_config = ".$id_config;
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("<b>Registro apagado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
		Redireciona("?pg=22");
	}
	else
		echo AlertDanger("Erro ao atualizar o registro!");
	}else{
		echo AlertDanger("Erro ao deletar o registro! Verifique as permiss&otilde;es para a pasta do caminho /img/logo/");
	}

}
?>

<? 
 if (db_result($res,"photobig") == ""){ ?>
<form action="" enctype="multipart/form-data" method="post">
	<fieldset>
		<div><label for="file">Imagem:</label><br/>
			<input class="form-control" type="file" name="file" />
		</div>
		<div align="center">
			<p><input name="button" type="submit" class="btn btn-default" id="button" value="Inserir"></p>
		</div>
	</fieldset>
</form>
<? } else { ?>
<form action="" enctype="multipart/form-data" method="post">
	<fieldset>
		<div align="left">
			<p><input name="button" type="submit" class="btn btn-default" id="button" value="Excluir Imagem"></p>
		</div>
	</fieldset>
</form>
<? } ?>