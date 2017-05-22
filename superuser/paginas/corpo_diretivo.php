<?
$error = '';
$success = '';


$larguraThumbs=100;
$larguraAlta=400;

if($_GET['opcao'] == "inserir"){
	
	// Pega o arquivo upado
	$image = $_FILES["file"]["name"];
	$nm_corpo  = $_POST['nm_corpo'];
	$categoria = $_POST['categoria'];
	$cargo_corpo = $_POST['cargo_corpo'];
	$fone_corpo = $_POST['fone_corpo'];
	$email_corpo = $_POST['email_corpo'];

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
			imagejpeg( $dst, '../img/colaboradores/corpo_diretivo/thumbs/'.$rnd_name, 100 );
			imagejpeg( $dst1, '../img/colaboradores/corpo_diretivo/alta/'.$rnd_name1, 100 );

			// apaga se tiver sido criada com sucesso
			imagedestroy( $source );
			imagedestroy( $dst );
			imagedestroy( $dst1 );

			// agora envia a imagem para o banco de dados
			$is_uploaded = mysql_query( "INSERT INTO corpo_diretivo (nm_corpo, cargo_corpo, email_corpo, fone_corpo, categoria, photosmall, photobig) VALUES('$nm_corpo', '$cargo_corpo', '$email_corpo', '$fone_corpo', '$categoria', '$rnd_name', '$rnd_name1')" ) or die('erroror inserting data '. mysql_erroror());

			// checa se foi enviado com sucesso.
			if( $is_uploaded ){
				echo AlertSuccess("<b>Arquivo enviado!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=5");
			}else{
				echo AlertWarning("Erro ao enviar arquivo!");
			}
		}
 
	}

}


if($_GET['opcao'] == "excluir"){
	$cd_corpo = $_GET['cd_corpo'];
	$sql9  = " SELECT * FROM corpo_diretivo WHERE cd_corpo = ".$cd_corpo;
	$res9  = db_query($sql9);
	
	@unlink("../img/colaboradores/corpo_diretivo/thumbs/".db_result($res9,"photosmall")."");
	if (@unlink("../img/colaboradores/corpo_diretivo/alta/".db_result($res9,"photobig")."")){
	$sql_del = " DELETE FROM corpo_diretivo WHERE cd_corpo = \"$cd_corpo\" ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("<b>Registro deletado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=5");
	}else
		echo AlertDanger("Erro ao deletar o registro!");
	}else{
		echo AlertDanger("Erro ao deletar o registro! Verifique as permiss&otilde;es para a pasta do caminho /img/colaboradores/corpo_diretivo/");
	}

}

$sql  = " SELECT * FROM corpo_diretivo ORDER BY nm_corpo ASC ";
$res  = db_query($sql);
$rows = db_num_rows($res);

?>
<script>
	function checaData(){
		with(document.form1){
			if(categoria.value == ""){
				alert('Selecione uma categoria!');
				categoria.focus();
				return false;
			}
		}		
	}

	function confirmaDelete(codigo){
		if (confirm("Deseja excluir o registro?")){
			document.location.href = "?pg=5&opcao=excluir&cd_corpo="+codigo;
		}
	}
</script>
<div>
<form action="?pg=5&opcao=inserir" method="post" enctype="multipart/form-data" name="form1" onSubmit="return checaData();">
  <div height="19" colspan="2" align="center" valign="middle" class="titulo"><h2>- Corpo Diretivo-</h2></div>
  <div height="19" colspan="2" align="center" valign="middle" class="texto">
    <?= $msg; ?>
  </div>
  <div width="170" height="23" align="left" valign="middle" class="texto">Nome:
    <input name="nm_corpo" type="text" class="form-control" id="nm_corpo" size="72" maxlength="80" required="required">
  </div>
  <div height="23" align="left" valign="middle" class="texto">Categoria do cargo:
    <select name="categoria" id="categoria" class="form-control" required="required">
      <option value=""> - Selecione - </option>
      <option value="Corpo Diretivo">Corpo Diretivo</option>
      <option value="Conselho Fiscal">Conselho Fiscal</option>
    </select>
  </div>
  <div height="23" align="left" valign="middle" class="texto">Descri&ccedil;&atilde;o do cargo:
    <input name="cargo_corpo" type="text" class="form-control" id="cargo_corpo" size="72">
  </div>
  <div height="23" align="left" valign="middle" class="texto">Fone: 
    <input name="fone_corpo" type="text" class="form-control" id="fone_corpo" onKeyPress="return txtBoxFormat(this, '(99)99999-9999', event);" size="15" maxlength="15"></div>
  <div height="23" align="left" valign="middle" class="texto">E-mail:
    <input name="email_corpo" type="text" class="form-control" id="email_corpo" size="72" required="required">
  </div>
    <div align="left" valign="middle" class="texto">
    <p><input class="form-control" type="file" name="file" /></p>
  </div>
  <div height="40" colspan="2" align="center" valign="middle" class="texto">
    <p><input name="button" type="submit" class="btn btn-default" id="button" value="  Cadastrar  "></p>
  </div>
  </form>
  <div height="95" colspan="2" valign="top">
    <?
        if($rows == 0){
			echo AlertInfo("N&atilde;o h&aacute; registros de dados!");
		}
		else{
		?>
    <div class="panel panel-default">
  <div class="panel-heading">Foram encontrados
          <?= $rows; ?>
          corpos diretivos</div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Categoria do Cargo</th>
            <th>Cargo</th>
			<th>E-mail</th>
            <th>Fone</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tbody>
         <? for ($i=0; $i<$rows; $i++){ ?>
          <tr class="odd gradeX">
            <td><?= db_result($res,"nm_corpo",$i); ?></td>
            <td><?= db_result($res,"categoria",$i); ?></td>
            <td><?= db_result($res,"cargo_corpo",$i); ?></td>
            <td><?= db_result($res,"email_corpo",$i); ?></td>
            <td><?= db_result($res,"fone_corpo",$i); ?></td>
            <td align="center"><a href="#" onClick="confirmaDelete(<?= db_result($res,"cd_corpo",$i); ?>);"> <img src="paginas/imagens/excluir.png" alt="Excluir este registro" width="25" height="25" border="0"> </a></td>
          </tr>
          <? } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

    <? } ?>
  </div>
 </div>