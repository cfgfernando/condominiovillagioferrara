<?
include_once "paginas/autenticacao.php";

$imagem = $_FILES["imagem"];
$link_parc = $_POST["link_parc"];
$nm_parc = $_POST["nm_parc"];

if($_GET['op'] == "enviar"){

	if($imagem != NULL) { 
		$nomeFinal = time().'.jpg';
			if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
				$tamanhoImg = filesize($nomeFinal); 

				$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

				$sql1  = " INSERT INTO parceiros (conteudo_parc
												,nm_parc
												,link_parc) 
												VALUES (\"$mysqlImg\"
												,\"$nm_parc\"
												,\"$link_parc\") ";

				$res1  = db_query($sql1);
				$rows1 = db_num_rows($res1);

				unlink($nomeFinal);
		
				echo "Tudo ok";
			}
	}
	else { 
		echo AlertDanger("Você não realizou o upload de forma satisfatória."); 
	}
}
if($_GET['op'] == "excluir"){
	$id_parc = $_GET['id_parc'];
	$sql_del = " DELETE FROM parceiros WHERE id_parc = \"$id_parc\" ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("Registro deletado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=35");
	}else
		echo AlertDanger("Erro ao deletar o registro!");
}

$sql  = " SELECT * FROM parceiros ";
$res  = db_query($sql);
$rows = db_num_rows($res);
?>


<div>
<form action="?pg=35&op=enviar" method="POST" enctype="multipart/form-data">
	<label for="Nome">Nome:</label>
	<input class="form-control" type="text" name="nm_parc">
	<label for="imagem">Link:</label>
	<input class="form-control" type="text" name="link_parc">
	<label for="imagem">Imagem:</label>
	<input class="form-control" type="file" name="imagem"/>
	<br/>
	<input class="btn btn-default" type="submit" value="Enviar"/>
</form>
<div> &nbsp; </div>
<div class="panel panel-default">
  <div class="panel-heading">Foram encontrados
                <?= $rows; ?> 
                registros de parceiros.</div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <!-- TÍTULO DA COLUNA DE CADA TABELA -->
        <thead>
          <tr>
            <th>Nome</th>
            <th>Link</th>
            <th>Imagem</th>
            <th>Editar</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <!-- FIM TÍTULO DA COLUNA DE CADA TABELA --> 
        
        <!-- IMPRESSÃO DA TABELA -->
        <tbody>
         <!-- CORPO DA TABELA -->
         <? for ($i=0; $i<$rows; $i++){ ?>
          <tr class="odd gradeX">
            <td><?= db_result($res,"nm_parc",$i); ?></td>
            <td><?= db_result($res,"link_parc",$i); ?></td>
            <td><img src="data:image/jpeg;base64,<?= base64_encode(db_result($res,"conteudo_parc",$i)); ?>" width="40" height="40" border="0"></td>
            <td align="center"><a href="?pg=36&id_parc=<?= db_result($res,"id_parc",$i); ?>"><img src="paginas/imagens/editar.png" alt="Alterar este registro" width="25" height="25" border="0"></a></td>
            <td align="center"><a href="?pg=35&op=excluir&id_parc=<?= db_result($res,"id_parc",$i); ?>"><img src="paginas/imagens/excluir.png" alt="Excluir este registro" width="25" height="25" border="0"></a></td>
          </tr>
          <? } ?>
          <!-- CORPO DA TABELA -->
        </tbody>
        <!-- IMPRESSÃO DA TABELA -->
      </table>
    </div>
  </div>
</div>
</div>
 