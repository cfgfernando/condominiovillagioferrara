<?
include_once "paginas/autenticacao.php";

$error = '';
$success = '';
if($_GET['opcao'] == "inserir"){
	
	// Pega o arquivo upado
	$image = $_FILES["file"]["name"];
	$tit_slider = $_POST["tit_slider"];
	$txt_slider = $_POST["txt_slider"];
 
	if( empty( $image ) ) {
		echo AlertDanger("Necess&aacute;rio ter uma foto.");
	} else if($_FILES["file"]["type"] == "application/msword") {
		echo AlertDanger("Tipode arquivo inv&aacute;lido. Somente jpg, png ou gif.");
	} else if( $_FILES["file"]["error"] > 0 ) {
		echo AlertDanger("Ops... algo deu errado e n&atilde;o sei o que foi. Contacte o webmaster (19) 98156-0869");
	} else {
	
		// divide o arquivo
		$filename = stripslashes( $_FILES['file']['name'] );
		$ext = get_file_extension( $filename );
		$ext = strtolower( $ext );

		if(( $ext != "jpg" ) && ( $ext != "jpeg" ) && ( $ext != "png" ) && ( $ext != "gif" ) ) {
			echo AlertDanger("Tipode arquivo inv&aacute;lido. Somente jpg, png ou gif.");
			return false;
		} else {

			// pega o tamanho do arquivo
			$size = filesize( $_FILES['file']['tmp_name'] );
			
			// pega tamanho máximo do arquivo
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

			// tamanho da altura
			$nw = 150;
			$nh = 59;
			//$nh = ceil( $ratio * $nw );
			$dst = imagecreatetruecolor( $nw, $nh );

			// tamanho da largura
			$nw1 = 2000;
			$nh1 = 500;
			//$nh1 = ceil( $ratio * $nw1 );
			$dst1 = imagecreatetruecolor( $nw1, $nh1 );

			imagecopyresampled( $dst, $source, 0, 0, 0,0, $nw, $nh, $width, $height );
			imagecopyresampled( $dst1, $source, 0, 0, 0, 0, $nw1, $nh1, $width, $height );
 
			// renomeia o arquivo
			$rnd_name = 'imagem_'.uniqid(mt_rand(10, 15)).'_'.time().'_50x50.'.$ext;
			$rnd_name1 = 'imagem_'.uniqid(mt_rand(10, 15)).'_'.time().'_2000x100.'.$ext;
		
			// move para pasta uploads com qyualidade total
			imagejpeg( $dst, '../img/slider/thumbs/'.$rnd_name, 100 );
			imagejpeg( $dst1, '../img/slider/alta/'.$rnd_name1, 100 );

			// apaga se tiver sido criada com sucesso
			imagedestroy( $source );
			imagedestroy( $dst );
			imagedestroy( $dst1 );

			// agora envia a imagem para o banco de dados
			$is_uploaded = mysql_query( "INSERT INTO slider (photosmall, photobig, tit_slider, txt_slider) VALUES('$rnd_name', '$rnd_name1', '$tit_slider', '$txt_slider')" ) or die('erroror inserting data '. mysql_erroror());
			
			// checa se foi enviado com sucesso.
			if( $is_uploaded ){
				echo AlertSuccess("<b>Arquivo enviado! </b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=35");
			}else
				echo AlertWarning("Erro ao enviar arquivo!");
 
		}
 
	}

}
if($_GET['opcao'] == "excluir"){
	$cd_slider = $_GET['cd_slider'];
	$sql9  = " SELECT * FROM slider WHERE cd_slider = ".$cd_slider;
	$res9  = db_query($sql9);
	
	@unlink("../img/slider/thumbs/".db_result($res9,"photosmall")."");
	if (@unlink("../img/slider/alta/".db_result($res9,"photobig")."")){
	$sql_del = " DELETE FROM slider WHERE cd_slider = \"$cd_slider\" ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("<b>Registro deletado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=35");
	}else
		echo AlertDanger("Erro ao deletar o registro!");
	}else{
		echo AlertDanger("Erro ao deletar o registro! Verifique as permiss&otilde;es para a pasta do caminho /img/slider/alta/");
	}

}

$sql  = " SELECT * FROM slider ORDER BY cd_slider ASC ";
$res  = db_query($sql);
$rows = db_num_rows($res);
?>
<div>
<form action="?pg=35&opcao=inserir" enctype="multipart/form-data" method="post">
	<fieldset>
		<div width="170" height="23" align="left" valign="middle" class="texto">T&iacute;tulo:&nbsp;
			<input name="tit_slider" type="text" class="form-control" id="tit_slider" size="80" maxlength="80">
		</div>
		<div height="23" align="left" valign="middle" class="texto">Frase:&nbsp;
			<input name="txt_slider" type="text" class="form-control" id="txt_slider" size="80">
		</div>
		<div><label for="file">Imagem: <font style="font-size:9px">(Dimens&otilde;es: 2000px X 500px)</font></label><br/>
			<input class="form-control" type="file" name="file" />
		</div>
		<div align="center">&nbsp;
			<p><input name="button" type="submit" class="btn btn-default" id="button" value="Inserir"></p>
		</div>
	</fieldset>
</form>




<div class="panel panel-default">
    <div class="panel-heading">Total de p&aacute;ginas de Slider:
      <?= $rows; ?>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <!-- TÍTULO DA COLUNA DE CADA TABELA -->
          <thead>
            <tr>
              <th>T&iacute;tulo:</th>
              <th>Frase:</th>
              <th>Imagem:</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <tbody>
            <? for ($i=0; $i<$rows; $i++){ ?>
            <tr class="odd gradeX">
              <td><?= db_result($res,"tit_slider", $i); ?></td>
              <td><?= db_result($res,"txt_slider", $i); ?></td>
              <td align="center"><img src="../img/slider/thumbs/<?=db_result($res,"photosmall",$i)?>" alt=""></td>
              <td class="center" align="center"><a href="?pg=35&opcao=excluir&cd_slider=<?=db_result($res,"cd_slider",$i)?>"><img src='paginas/imagens/excluir.png' alt='Excluir esta enquete' width='25' height='25' border='0'></a></td>
            </tr>
            <? } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>