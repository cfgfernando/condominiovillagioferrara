<?
$error = '';
$success = '';


$larguraThumbs=100;
$larguraAlta=400;

if($_GET['opcao'] == "inserir"){
	
	// Pega o arquivo upado
	$image = $_FILES["file"]["name"];
	$nm_func = $_POST["nm_func"];
	$cargo_func = $_POST["cargo_func"];
	$email_func = $_POST["email_func"];
	$fone_func = $_POST["fone_func"];
	$cpf_func = $_POST["cpf_func"];
	$nivel_func = $_POST['nivel_func'];
	$senha_func = md5($_POST["senha_func"]);
	
	if (ValidaCPF($cpf_func)){
	
	$sql_existe_user = "SELECT login_usuario
						  FROM funcionario
						 WHERE login_usuario = \"$cpf_func\"
						 UNION
						SELECT login_usuario 
					   	  FROM morador
						 WHERE login_usuario = \"$cpf_func\" ";
	$res_existe_user = mysql_query($sql_existe_user);
	
	if (! $res_existe_user){
		echo AlertDanger("Erro pesquisar usu·rio!");
	}else{	
		//verificar se o usuario/senha j· existem
		if (@mysql_num_rows($res_existe_user) > 0){	
			echo AlertDanger("Este Login/Usu&aacute;rio j&aacute; existe!");
		}else{
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
					
					// pega tamaalturao m√°ximo do arquivo
					$max_upload = ini_get( 'upload_max_filesize' );

					// verifica o tipo de extens√£o do arquivo enviado e se necess√°rio o converte
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
				
					// move para pasta uploads com qyualidade total
					imagejpeg( $dst, '../img/colaboradores/funcionarios/thumbs/'.$rnd_name, 100 );
					imagejpeg( $dst1, '../img/colaboradores/funcionarios/alta/'.$rnd_name1, 100 );

					// apaga se tiver sido criada com sucesso
					imagedestroy( $source );
					imagedestroy( $dst );
					imagedestroy( $dst1 );

					// agora envia a imagem para o banco de dados
					$is_uploaded = db_query( "INSERT INTO funcionario (nm_func
					, cargo_func
					, fone_func
					, email_func
					, login_usuario
					, senha_usuario
					, cd_cat_usuario
					, photosmall
					, photobig) 
					VALUES('$nm_func'
					, '$cargo_func'
					, '$fone_func'
					, '$email_func'
					, '$cpf_func'
					, '$senha_func'
					, '$nivel_func'
					, '$rnd_name'
					, '$rnd_name1')"
					 ) or die('Erro '. db_error());

					// checa se foi enviado com sucesso.
					if( $is_uploaded ){
						echo AlertSuccess("<b>Arquivo enviado!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
						Redireciona("?pg=3");
					}
					else
						echo AlertWarning("Erro ao enviar arquivo!");
		 
				}
		 
			}
		}
	}
	}else{
		echo AlertDanger("CPF inv&aacute;lido!");
	}

}


if($_GET['opcao'] == "excluir"){
	$cd_func = $_GET['cd_func'];
	$sql9  = " SELECT * FROM funcionario WHERE cd_func = ".$cd_func;
	$res9  = db_query($sql9);
	
	@unlink("../img/colaboradores/funcionarios/thumbs/".db_result($res9,"photosmall")."");
	if (@unlink("../img/colaboradores/funcionarios/alta/".db_result($res9,"photobig")."")){
	$sql_del = " DELETE FROM funcionario WHERE cd_func = \"$cd_func\" ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("<b>Registro deletado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=3");
	}
	else
		echo AlertDanger("Erro ao deletar o registro!");
	}else{
		echo AlertDanger("Erro ao deletar o registro! Verifique as permiss&otilde;es para a pasta do caminho /img/colaboradores/funcionarios/");
	}

}

$sql  = " SELECT * FROM funcionario ORDER BY nm_func ASC ";
$res  = db_query($sql);
$rows = db_num_rows($res);

?>
<div>
<form action="?pg=3&opcao=inserir" method="post" enctype="multipart/form-data" name="form1">
  <div height="19" colspan="2" align="center" valign="middle" class="titulo">
    <h2>- Funcion&aacute;rios -</h2>
  </div>
  <div height="19" colspan="2" align="center" valign="middle" class="texto">
    <?= $msg; ?>
  </div>
  <div width="170" height="23" align="left" valign="middle" class="texto">Nome: 
    <input name="nm_func" type="text" class="form-control" id="nm_func" size="80" maxlength="80">
  </div>
  <div height="23" align="left" valign="middle" class="texto">Descri&ccedil;&atilde;o do cargo:
    <input name="cargo_func" type="text" class="form-control" id="cargo_func" size="80">
  </div>
  <div height="23" align="left" valign="middle" class="texto">Fone: 
    <input name="fone_func" type="text" class="form-control" id="fone_func" onKeyPress="return txtBoxFormat(this, '(99)99999-9999', event);" size="15" maxlength="15"></div>
  <div height="23" align="left" valign="middle" class="texto">E-mail:
    <input name="email_func" type="text" class="form-control" id="email_func" size="72" required="required">
  </div>
  <div height="23" align="left" valign="middle" class="texto">Imagem: 
    <input class="form-control" type="file" name="file" />
  </div>
  <div height="23" align="left" valign="middle" class="texto" style="width:50%;">Login: 
    <input name="cpf_func" type="text" class="form-control" id="cpf_func" onKeyPress="return txtBoxFormat(this, '999.999.999-99', event);" size="14" maxlength="14" placeholder="CPF"></div>
    <div height="23" align="left" valign="middle" class="texto" style="width:50%">Senha: 
    <input name="senha_func" type="password" class="form-control" id="senha_func" size="15" maxlength="15"></div>
    <div>Selecione o n&iacute;vel do Funcion&aacute;rio:</div>
			<div class="btn-group" data-toggle="buttons">
			  <label class="btn btn-success active">
				<input type="radio" value="2" name="nivel_func" checked="checked"> Outros
			  </label>
			  <label class="btn btn-danger">
				<input type="radio" value="3" name="nivel_func"> Portaria
			  </label>
			</div>
  <div>&nbsp;</div>
  <div height="40" colspan="2" align="center" valign="middle" class="texto">
    <input name="button" type="submit" class="btn btn-default" id="button" value="  Cadastrar  ">
  </div>
  <div>&nbsp;</div>
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
          funcion&aacute;rios</div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Fone</th>
            <th>Nivel</th>
            <th>E-mail</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tbody>
         <? for ($i=0; $i<$rows; $i++){ ?>
          <tr class="odd gradeX">
            <td><?= db_result($res,"nm_func",$i); ?></td>
            <td><?= db_result($res,"cargo_func",$i); ?></td>
            <td><?= db_result($res,"fone_func",$i); ?></td>
            <td><? if (db_result($res,"cd_cat_usuario",$i)==2){echo "Portaria";}else{echo "Outros";} ?></td>
            <td><?= db_result($res,"email_func",$i); ?></td>
            <td class="center"><? if ($tbmmorador == 0 || $tbmmorador == "") {?><a href="?pg=3&opcao=excluir&cd_func=<?= db_result($res,"cd_func",$i); ?>"><img src="paginas/imagens/excluir.png" alt="Excluir este registro" width="25" height="25" border="0"></a><? } ?></td>
          </tr>
          <? } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

    <? } ?>
  </div>
</form>
</div>