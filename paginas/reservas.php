<div>
  <?php
	$res3  = db_query(" SELECT * FROM reservas_lista WHERE id_res = $id_res ORDER BY nomeconvidado_reslist ASC ");
	
	
if ($reservas_perm == 1 || $reservas_admin_perm == 1){

	
	
if($_GET['opcao'] == "excluir"){
	$cd_res = $_GET['cd_res'];
	$sql_del = " DELETE FROM reservas WHERE cd_res = \"$cd_res\" ";
	$res_del = db_query($sql_del);
	if($res_del)
		echo AlertSuccess("Reserva deletada com sucesso!");
	else
		echo AlertDanger("Erro ao deletar o reservas!");
}

if($_SESSION['CD_MORADOR']){
$sql1  = " SELECT *
		    FROM morador
		   WHERE cd_morador = ".$_SESSION['CD_MORADOR'];
$res  = db_query($sql1);
$nm = db_result($res,"nm_morador");
$fone = db_result($res,"fone_morador");
$nr = db_result($res,"nr_celular");
$email = db_result($res,"email_morador");
$id_user = db_result($res,"cd_morador");

} elseif($_SESSION['CD_USUARIO']){
$sql1  = " SELECT *
		    FROM funcionario
		   WHERE cd_func = ".$_SESSION['CD_FUNC'];
$res1  = db_query($sql1);
$nm = db_result($res1,"nm_func");
$fone = db_result($res1,"fone_func");
$nr = db_result($res1,"fone_func");
$email = db_result($res1,"email_func");
$id_user = db_result($res1,"cd_func");
}else{

}
if($_GET['opcao'] == "cadastrar"){

if (ContaDias($_POST['dt_res']) >= 0){
	$nm_res  	  = $_POST['nm_res'];
	$fone_res    = $_POST['fone_res'];
	$celular_res = $_POST['celular_res'];
	$email_res   = $_POST['email_res'];
	$ds_res  	  = $_POST['ds_res'];
	$dt_res  	  = ConverteData($_POST['dt_res']);
	$status_res	  = "Aguardando aprova&ccedil;&atilde;o";
	$horainicial_res = $_POST['horainicial_res'];
	$horafinal_res = $_POST['horafinal_res'];
	$selec_local = $_POST['selec_local'];
	$idmorador_res = $id_user;
	
	$sql_cad = " INSERT INTO reservas (nm_res
										  ,idmorador_res
								  		  ,fone_res
										  ,celular_res
										  ,email_res
										  ,ds_res
										  ,dt_res
										  ,status_res
										  ,horafinal_res
										  ,horainicial_res
										  ,nome_local)
						   		   VALUES (\"$nm_res\"
								          ,\"$idmorador_res\"
								  		  ,\"$fone_res\"
										  ,\"$celular_res\"
										  ,\"$email_res\"
										  ,\"$ds_res\"
										  ,\"$dt_res\"
										  ,\"$status_res\"
										  ,\"$horafinal_res\"
										  ,\"$horainicial_res\"
										  ,\"$selec_local\") ";
	$res_cad = db_query($sql_cad) or die(db_error());
	if($res_cad)
		echo AlertSuccess("Reserva cadastrada com sucesso!");
	else
		echo AlertDanger("Erro ao cadastrar o reserva!");
} else{
echo AlertDanger("Data inv&aacute;lida! A data n&atilde;o pode ser inferior a data corrente.");
}
}

$sql  = " SELECT * FROM reservas ORDER BY dt_res DESC ";
$res  = db_query($sql);
$rows = db_num_rows($res);

if($_GET['op'] != "novo" && $logado == "online"){ 


?>
  <div>
    <div width="373" height="30" align="left" valign="middle" class="titulo">
      <h2>Reservas</h2>
      <hr>
    </div>
  </div>
  <form action="?pg=10&op=novo" method="post" name="form1">
    <input name="button" type="submit" class="btn btn-primary" id="button" value="Nova Reserva">
  </form>
  <? } ?>
  <?
if($_GET['op'] == "novo"){ 

$sql_local  = " SELECT * FROM reserva_locais ORDER BY nome_local ASC ";
$res_local  = db_query($sql_local);
$rows_local = db_num_rows($res_local);
?>
  <form action="?pg=10&op=novo&opcao=cadastrar" method="post" name="form1">
    <div>&nbsp;<br />
    </div>
    <div height="19" colspan="2" align="center" valign="middle" class="titulo">
      <h2>Criar uma nova Reserva</h2>
      <hr>
    </div>
    <div height="19" colspan="2" align="center" valign="middle" class="texto">
      <?= $msg; ?>
    </div>
    <div width="180" align="left" valign="middle" class="texto">Nome:
      <input name="nm_res" type="text" class="form-control" id="nm_res" size="60" maxlength="60" value="<?=$nm;?>" readonly="readonly">
      <input name="idmorador_res" type="hidden" class="form-control" id="idmorador_res" size="60" maxlength="60" value="<?=$id_user?>">
    </div>
    <div>
      <div align="left" class="texto" style="float:left; width:33%; height:60px; min-width:150px;">Telefone:
        <input name="fone_res" type="text" class="form-control" id="fone_res" size="16" maxlength="13" value="<?=$fone;?>" readonly="readonly")>
      </div>
      <div align="left" class="texto" style="float:left; width:33%; height:60px; min-width:150px;">Celular:
        <input name="celular_res" type="text" class="form-control" id="celular_res" size="16" maxlength="13" value="<?=$nr;?>" readonly="readonly")>
      </div>
      <div align="left" class="texto" style="float:left; width:33%; height:60px; min-width:150px;">E-mail:
        <input name="email_res" type="text" class="form-control" id="email_res" size="60" maxlength="60" value="<?=$email;?>" readonly="readonly">
      </div>
    </div>
    <div class="clearfix"></div>
    <div>
      <div align="left" class="texto" style="float:left; width:25%; height:60px; min-width:150px;">Local a ser reservado:
        <select name="selec_local" class="form-control" id="local" required="required">
          <option value="">Selecione o Local</option>
          <?
			for($i=0; $i<db_num_rows($res_local); $i++){
			echo "<option value=\"".db_result($res_local,"nome_local",$i)."\">".db_result($res_local,"nome_local",$i)."</option> <br />";
		}
		?>
        </select>
      </div>
      <div align="left" class="texto" style="float:left; width:25%; height:60px; min-width:150px;">Data:
        <input name="dt_res" type="text" class="form-control" id="dt_res" size="12" maxlength="10" onKeyPress="return txtBoxFormat(this, '99/99/9999', event);" required="required">
      </div>
      <div align="left" class="texto" style="float:left; width:25%; height:60px; min-width:150px;">Hora Inicial:
        <input name="horainicial_res" type="text" class="form-control" id="horainicial_res" size="12" maxlength="5" onKeyPress="return txtBoxFormat(this, '99:99', event);" required="required">
      </div>
      <div align="left" class="texto" style="float:left; width:25%; height:60px; min-width:150px;">Hora Final:
        <input name="horafinal_res" type="text" class="form-control" id="horafinal_res" size="12" maxlength="5" onKeyPress="return txtBoxFormat(this, '99:99', event);" required="required">
      </div>
    </div>
    <div class="clearfix"></div>
    <div height="23" align="left" valign="top" class="texto">Descri&ccedil;&atilde;o da reserva a ser efetuada: <font size="2">(A reserva estar&aacute; sujeito a aprova&ccedil;&atilde;o)</font></div>
    <div align="left" valign="middle" class="texto">
      <textarea name="ds_res" cols="60" rows="10" class="form-control" id="ds_res" required="required"></textarea>
    </div>
    <div height="40" colspan="2" align="center" valign="middle" class="texto">
      <p><br />
        <input name="button" type="submit" class="btn btn-primary" id="button" value="  Cadastrar  ">
      </p>
    </div>
    <div align="center" class="alert alert-info"><font size="3" color="Red">Aten&ccedil;&atilde;o!</font><font size="2"> Voc&ecirc; tem total responsabilidade sobre a sua reserva. Antes de reservar verifique as normas do condom&iacute;nio.</font></div>
  </form>
  <? } 
  
  
  if (db_num_rows($res) != 0){	?>
  <div>
    <div align="center" class="alert alert-info">Caro morador! Os eventos s&oacute; podem ser cancelados em at&eacute; <? echo $limiteCancelamento ?> dias corridos antes do evento. E a lista entregue em at&eacute; <?=$prazoCriarLista?> dias corridos antes do evento.</div>
    <div align="center" style="width:400;">
      <p><img src='paginas/imagens/alerta.png' width='20' height='20' />Aguardando aprova&ccedil;&atilde;o&nbsp;&nbsp;<img src='paginas/imagens/reprovado.png' width='20' height='20' />Aprovado&nbsp;&nbsp;<img src='paginas/imagens/aprovado.png' width='20' height='20' />Reprovado&nbsp;&nbsp; |&nbsp;&nbsp;<img src='paginas/imagens/block.png' width='20' height='20' />Prazo encerrado&nbsp;&nbsp;<img src='paginas/imagens/excluir.gif' width='20' height='20' />Excluir</p>
    </div>
    <div class="clearfix"></div>
    <div height="450" valign="top"  >
      <div class="panel panel-default">
        <div class="panel-heading">Foram encontrados
          <?= $rows; ?>
          Reservas</div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <!-- TÍTULO DA COLUNA DE CADA TABELA -->
              <thead>
                <tr>
                  <th style="width:40%;">Dados</th>
                  <th style="width:40%;">Descrição</th>
                  <th style="width:40%;">Lista</th>
                  <th style="width:5%;">Status</th>
                  <th style="width:10%;">Data</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <!-- FIM TÍTULO DA COLUNA DE CADA TABELA --> 
              
              <!-- IMPRESSÃO DA TABELA -->
              <tbody>
                <!-- CORPO DA TABELA -->
                <? for ($i=0; $i<$rows; $i++){ ?>
                <tr class="odd gradeX">
                  <td><? 
				echo "<div><b style='color:#626262'>Nome: </b><b>".db_result($res,"nm_res",$i)."</b><br />";
				echo "<b style='color:#626262'>Telefone:</b> ".db_result($res,"fone_res",$i)."<br />";
				echo "<b style='color:#626262'>Celular:</b> ".db_result($res,"celular_res",$i)."<br />";
				echo "<b style='color:#626262'>E-mail:</b> ".db_result($res,"email_res",$i)."<br />";
			 ?></td>
                  <td><div> <b style='color:#626262'>Local:</b>
                      <?= db_result($res,"nome_local",$i); ?>
                      <br />
                      <b style='color:#626262'>Hora Inicial:</b>
                      <?= ConverteHora(db_result($res,"horainicial_res",$i)); ?>
                      <br />
                      <b style='color:#626262'>Hora Final:</b>
                      <?= ConverteHora(db_result($res,"horafinal_res",$i)); ?>
                      <br />
                      <b style='color:#626262'>Descrição:</b>
                      <?= db_result($res,"ds_res",$i); ?>
                    </div></td>
                  <td align="center"><? if(db_result($res,"idmorador_res",$i) == db_result($res5,"cd_morador") && $reservas_admin_perm == 1){
				   if (db_result($res,"status_res",$i) == "Aprovado"){ 
				  		if (ContaDias(ConverteData(db_result($res3,"dataevento_reslist",$i))) <= $prazoCriarLista){
				   ?>
                    <div align='center'>
                      <input name="button" style="width:100px;" onclick="location.href='?pg=10&idres=<?=db_result($res,"cd_res",$i)?>#a01'" class="btn btn-primary" id="button" value="Criar Lista">
                    </div>
                    <?
					
				   		}else { 
						$esgotado=1;
						?>
                        
						<input name="button" style="width:100px;" onclick="location.href='?pg=10&exc=false&idres=<?=db_result($res,"cd_res",$i)?>#a01'" class="btn btn-primary" id="button" value="Ver Lista">
						<? }
				   
					 }elseif(db_result($res,"status_res",$i) == "Reprovado"){ 
				  ?>
                    <div align='center'><img src='paginas/imagens/pare.png' alt='Reprovado' width='20' height='20' border='0'></div>
                    <? }else{ ?>
                    Aguardando
                    <? } 
				 }elseif(db_result($res,"idmorador_res",$i) != db_result($res5,"cd_morador") && $reservas_admin_perm == 1){
					  
					  if (db_result($res,"status_res",$i) == "Aprovado"){ ?>
                    <div align='center'>
                      <input name="button" style="width:100px;" onclick="location.href='?pg=10&exc=false&idres=<?=db_result($res,"cd_res",$i)?>#a01'" class="btn btn-primary" id="button" value="Ver Lista">
                    </div>
                    <? }elseif(db_result($res,"status_res",$i) == "Reprovado"){ ?>
                    <div align='center'><img src='paginas/imagens/pare.png' alt='Reprovado' width='40' height='40' border='0'></div>
                    <? }else{ ?>
                    Aguardando
                    <? } 
				 } else {
				 }?></td>
                  <td><? if (db_result($res,"status_res",$i) == "Aprovado"){
					echo "<div align='center'><img src='paginas/imagens/reprovado.png' alt='Aprovado' width='20' height='20' border='0'></div>";
					}elseif(db_result($res,"status_res",$i) == "Reprovado"){
					echo "<div align='center'><img src='paginas/imagens/aprovado.png' alt='Reprovado' width='20' height='20' border='0'></div>";
					}else{
					echo "<div align='center'><img src='paginas/imagens/alerta.png' alt='Aguardando Aprova&ccedil;&atilde;' width='20' height='20' border='0'></div>";
					}?></td>
                  <td><?= ConverteData(db_result($res,"dt_res",$i)); ?></td>
                  <td align="center"><?
				  	if (ContaDias(ConverteData(db_result($res,"dt_res",$i))) <= $limiteCancelamento){
						echo "<div align='center'><img src='paginas/imagens/block.png' alt='Excluir reserva' width='16' height='16' border='0'></div>";
					}else{
						if(db_result($res,"nm_res",$i) == db_result($res5,"nm_morador") ){
					   echo "<div align='center'><a href='?pg=10&opcao=excluir&cd_res=".db_result($res,'cd_res',$i)."'><img src='paginas/imagens/excluir.gif' alt='Excluir reserva' width='22' height='22' border='0'></a></div>";
					   } else{
					   echo "<div align='center'><img src='paginas/imagens/excluir.png' alt='Excluir reserva' width='22' height='22' border='0'></div>";
					   }
					}
                  
					   ?></td>
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
    <div> 
      <!-- -->
      <?
	
	$id_res = $_GET['idres'];
	$exc = $_GET['exc'];
	if ($id_res!=0){
		
	if($_GET['op'] == "cadastrar"){
		$dataevento_reslist = $_POST['dataevento_reslist'];
		$horaevento_reslist = $_POST['horaevento_reslist'];
		$id_res = $_POST['id_res'];
		$idmorador_reslist = $_POST['idmorador_reslist'];
		$nomeconvidado_reslist = $_POST['nomeconvidado_reslist'];
		$documentoconvidado_reslist = $_POST['documentoconvidado_reslist'];
		$documentoapresentar_reslist = $_POST['documentoapresentar_reslist'];
	$sql_cada = " INSERT INTO reservas_lista (dataevento_reslist
												  ,horaevento_reslist
												  ,id_res
												  ,idmorador_reslist
												  ,nomeconvidado_reslist
												  ,documentoconvidado_reslist
												  ,documentoapresentar_reslist )
										   VALUES (\"$dataevento_reslist\"
												  ,\"$horaevento_reslist\"
												  ,\"$id_res\"
												  ,\"$idmorador_reslist\"
												  ,\"$nomeconvidado_reslist\"
												  ,\"$documentoconvidado_reslist\"
												  ,\"$documentoapresentar_reslist\") ";
	$res_cada = db_query($sql_cada) or die(db_error());
	}
	if($_GET['opcao'] == "excluirlista"){
	$id_reslist = $_GET['id_reslist'];
	$sql_del = " DELETE FROM reservas_lista WHERE id_reslist = \"$id_reslist\" ";
	$res_del = db_query($sql_del);
	if($res_del)
		$msg = AlertSuccess("Convidado removido com sucesso!");
	else
		$msg = AlertDanger("Erro ao remover convidado!");
}
	
	
	$sql_x  = " SELECT * FROM reservas WHERE cd_res = $id_res ";
	$res_x  = db_query($sql_x);
	$rows_x = db_num_rows($res_x);
	
	$dataevento_reslist= db_result($res_x,'dt_res');
	$horaevento_reslist= db_result($res_x,'horainicial_res');
	$idmorador_reslist= db_result($res_x,'idmorador_res');
	

	
	$sql2  = " SELECT * FROM reservas_lista WHERE id_res = $id_res ORDER BY nomeconvidado_reslist ASC ";
	$res2  = db_query($sql2);
	$rows2 = db_num_rows($res2);
	
	$sql3  = " SELECT * FROM reservas_documentos ";
	$res3  = db_query($sql3);
	$rows3 = db_num_rows($res3);
	?>
      <a name="a01" href="#"></a>
      <div><br/>
        <br/>
        <br/>
      </div>
      <div height="19" colspan="2" align="left" valign="middle" class="titulo">
        <h2>Lista de Convidados</h2>
        <hr>
      </div>
      <?=$msg?>
      <? if($exc != "false"){ ?>
      <div>
        <form action="?pg=10&idres=<?=$id_res?>&op=cadastrar#a01" method="post" name="form1">
          <div width="180" align="left" valign="middle" class="texto">Nome:
            <input name="nomeconvidado_reslist" type="text" class="form-control" id="nomeconvidado_reslist" size="60" maxlength="60" required="required">
          </div>
          <div align="left" class="texto" style="float:left; width:50%; height:60px; min-width:150px;">Documento a ser Apresentado:
            <select name="documentoapresentar_reslist" class="form-control" id="documentoapresentar_reslist" required="required">
              <option value="">Selecione o Documento</option>
              <?
			for($i=0; $i<$rows3; $i++){
			echo "<option value=\"".db_result($res3,"nome_doc",$i)."\">".db_result($res3,"nome_doc",$i)."</option> <br />";
		}
		?>
            </select>
          </div>
          <div width="180" align="left" valign="middle" class="texto" style="width:50%; float:left;">Numero do Documento:
            <input name="documentoconvidado_reslist" type="text" class="form-control" id="documentoconvidado_reslist" size="60" maxlength="60" required="required">
          </div>
          <input name="dataevento_reslist" type="hidden" value="<?=$dataevento_reslist;?>" class="form-control" id="dataevento_reslist" size="60" maxlength="60">
          <input name="horaevento_reslist" type="hidden" value="<?=$horaevento_reslist;?>" class="form-control" id="horaevento_reslist" size="60" maxlength="60">
          <input name="idmorador_reslist" type="hidden" value="<?=$idmorador_reslist;?>" class="form-control" id="idmorador_reslist" size="60" maxlength="60">
          <input name="id_res" type="hidden" value="<?=$id_res?>" class="form-control" id="id_res" size="60" maxlength="60">
          <?=LimpaFloat(); ?>
          <div height="40" colspan="2" align="center" valign="middle" class="texto">
            <p><br />
              <input name="button" type="submit" class="btn btn-primary" id="button" value="Cadastrar">
            </p>
          </div>
        </form>
      </div>
      <? } ?>
	  <!-- editar -->
	  
	  <?
if($_GET['op'] == "editar"){ 
$sql_local  = " SELECT * FROM reserva_locais ORDER BY nome_local ASC ";
$res_local  = db_query($sql_local);
$rows_local = db_num_rows($res_local);

$id_editar = $_GET['id'];
$sql_upd  = "UPDATE reservas SET
							ds_res =  $ds_res,
							dt_res =  dt_res,
							horainicial_res = $horainicial_res,
							horafinal_res = $horafinal_res
							WHERE cd_res = $id_editar ";
$res_upd  = db_query($sql_upd);
$rows_upd = db_num_rows($res_upd);
?>
<div>&nbsp;</div>
  <form action="?pg=10&op=novo&opcao=editar" method="post" name="form1">
    <div>&nbsp;<br />
    </div>
    <div height="19" colspan="2" align="center" valign="middle" class="titulo">
      <h2>Editar uma Reserva</h2>
      <hr>
    </div>
    <div height="19" colspan="2" align="center" valign="middle" class="texto">
      <?= $msg; ?>
    </div>
    <div width="180" align="left" valign="middle" class="texto">Nome:
      <input name="nm_res" type="text" class="form-control" id="nm_res" size="60" maxlength="60" value="<?=$nm;?>" readonly="readonly">
      <input name="idmorador_res" type="hidden" class="form-control" id="idmorador_res" size="60" maxlength="60" value="<?=$id_user?>">
    </div>
    <div>
      <div align="left" class="texto" style="float:left; width:33%; height:60px; min-width:150px;">Telefone:
        <input name="fone_res" type="text" class="form-control" id="fone_res" size="16" maxlength="13" value="<?=$fone;?>" readonly="readonly")>
      </div>
      <div align="left" class="texto" style="float:left; width:33%; height:60px; min-width:150px;">Celular:
        <input name="celular_res" type="text" class="form-control" id="celular_res" size="16" maxlength="13" value="<?=$nr;?>" readonly="readonly")>
      </div>
      <div align="left" class="texto" style="float:left; width:33%; height:60px; min-width:150px;">E-mail:
        <input name="email_res" type="text" class="form-control" id="email_res" size="60" maxlength="60" value="<?=$email;?>" readonly="readonly">
      </div>
    </div>
    <div class="clearfix"></div>
    <div>
      <div align="left" class="texto" style="float:left; width:25%; height:60px; min-width:150px;">Local a ser reservado:
        <select name="selec_local" class="form-control" id="local" required="required">
          <option value="">Selecione o Local</option>
          <?
			for($i=0; $i<db_num_rows($res_local); $i++){
			echo "<option ".(db_result($res_upd,'nome_local',$i) == db_result($res_local,'nome_local'))?'selected':''." value=\"".db_result($res_upd,'nome_local',$i)."\">".db_result($res_upd,'nome_local',$i)."</option> <br />";
		}
		?>
        </select>
      </div>
      <div align="left" class="texto" style="float:left; width:25%; height:60px; min-width:150px;">Data:
        <input name="dt_res" type="text" class="form-control" id="dt_res" size="12" maxlength="10" onKeyPress="return txtBoxFormat(this, '99/99/9999', event);" value="<?=db_result($res_upd,"dt_res");?>" required="required">
      </div>
      <div align="left" class="texto" style="float:left; width:25%; height:60px; min-width:150px;">Hora Inicial:
        <input name="horainicial_res" type="text" class="form-control" id="horainicial_res" size="12" maxlength="5" onKeyPress="return txtBoxFormat(this, '99:99', event);" value="<?=db_result($res_upd,"horainicial_res");?>" required="required">
      </div>
      <div align="left" class="texto" style="float:left; width:25%; height:60px; min-width:150px;">Hora Final:
        <input name="horafinal_res" type="text" class="form-control" id="horafinal_res" size="12" maxlength="5" onKeyPress="return txtBoxFormat(this, '99:99', event);" value="<?=db_result($res_upd,"horafinal_res");?>" required="required">
      </div>
    </div>
    <div class="clearfix"></div>
    <div height="23" align="left" valign="top" class="texto">Descri&ccedil;&atilde;o da reserva a ser efetuada: <font size="2">(A reserva estar&aacute; sujeito a aprova&ccedil;&atilde;o)</font></div>
    <div align="left" valign="middle" class="texto">
      <textarea name="ds_res" cols="60" rows="10" class="form-control" id="ds_res" required="required"></textarea>
    </div>
    <div height="40" colspan="2" align="center" valign="middle" class="texto">
      <p><br />
        <input name="button" type="submit" class="btn btn-primary" id="button" value="  Cadastrar  ">
      </p>
    </div>
    <div align="center" class="alert alert-info"><font size="3" color="Red">Aten&ccedil;&atilde;o!</font><font size="2"> Voc&ecirc; tem total responsabilidade sobre a sua reserva. Antes de reservar verifique as normas do condom&iacute;nio.</font></div>
  </form>
  <div>&nbsp;</div>
  <? } ?>
	  
	  
	  <!-- Editar FIM -->
      <div class="panel panel-default">
        <div class="panel-heading">Foram encontrados
          <?= $rows2; ?>
          Convidados registrados para o evento do dia
          <?=ConverteData(db_result($res2,"dataevento_reslist"))?>
          &agrave;s
          <?=ConverteHora(db_result($res2,"horaevento_reslist"))?>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <!-- TÍTULO DA COLUNA DE CADA TABELA -->
              <thead>
                <tr>
                  <th style="width:5%;">N&deg;</th>
                  <th style="width:65%;">Nome do Convidado</th>
                  <th style="width:20%;">Documento a Apresentar</th>
                  <th style="width:20%;">Numero do Documento</th>
                  <? if(db_result($res2,"idmorador_reslist") == db_result($res5,"cd_morador") && $esgotado != 1){ ?>
                  <th style="width:10%;">Excluir</th>
                  <? } ?>
                </tr>
              </thead>
              <tbody>
                <? $j = 0;
                for ($i=0; $i<$rows2; $i++){ 
				$j++; ?>
                <tr class="odd gradeX">
                  <td><?=$j?></td>
                  <td><?=db_result($res2,"nomeconvidado_reslist",$i)?></td>
                  <td><?=db_result($res2,"documentoapresentar_reslist",$i)?></td>
                  <td><?=db_result($res2,"documentoconvidado_reslist",$i)?></td>
                  <? if(db_result($res2,"idmorador_reslist") == db_result($res5,"cd_morador") && $esgotado != 1){ ?>
                  <td align="center"><?
				    if (ContaDias(ConverteData(db_result($res2,"dataevento_reslist",$i))) <= $prazoCriarLista){
						echo "<div align='center'><img src='paginas/imagens/block.png' alt='Excluir reserva' width='16' height='16' border='0'></div>";
					}else{
					   echo "<div align='center'><a href='?pg=10&idres=".$id_res."&opcao=excluirlista&id_reslist=".db_result($res2,'id_reslist',$i)."#a01'><img src='paginas/imagens/excluir.gif' alt='Excluir reserva' width='22' height='22' border='0'></a></div>";
					}
					?></td>
                  <? } ?>
                </tr>
                <? } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <? } ?>
  </div>
  <? } else {
 	echo AlertInfo("N&atilde;o h&aacute; reservas cadastradas!");
   } ?>
</div>
<script type="text/javascript">
			jQuery.fn.smoothScroll = function(){
				$(this).each(function(){
					var node = $(this);
					$(node).click(function(e){
						var anchor = $(this).attr('href');
						anchor = anchor.split("#");
						anchor = anchor[1];
						var t = 0;
						var found = false;
						var tName = 'a[name='+anchor+']';
						var tId = '#'+anchor;
						if (!!$(tName).length){
							t = $(tName).offset().top;
							if ($(tName).text() == ""){
								t = $(tName).parent().offset().top;
							}
							found = true;
						} else if(!!$(tId).length){
							t = $(tId).offset().top;
							found = true;
						}
						if (found){
							$("body, html").animate({scrollTop: t}, 500);
						}
						//e.preventDefault();
					});
				});
				var lAnchor = location.hash;
				if (lAnchor.length > 0){
					lAnchor = lAnchor.split("#");
					lAnchor = lAnchor[1];
					if (lAnchor.length > 0){
						$("body, html").scrollTop(0);
						var lt = 0;
						var lfound = false;
						var ltName = 'a[name='+lAnchor+']';
						var ltId = '#'+lAnchor;
						if (!!$(ltName).length){
							lt = $(ltName).offset().top;
							if ($(ltName).text() == ""){
								lt = $(ltName).parent().offset().top;
							}
							lfound = true;
						} else if(!!$(ltId).length){
							lt = $(ltId).offset().top;
							lfound = true;
						}
						if (lfound){
							$("body, html").animate({scrollTop: lt}, 500);
						}
					}
				}
			}
			$('.anchorList a').smoothScroll();
		</script>
<? } else {
	 RedirecionaRapido("index.php");
	 exit();
} ?>
</div>
