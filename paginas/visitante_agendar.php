<?
 if ($visitantes_perm == 1){
$id_morador = $_SESSION['CD_MORADOR'];
$sql  = " SELECT * FROM visitantes WHERE cd_morador LIKE '$id_morador'  ";
$res  = db_query($sql);
$rows = db_num_rows($res);


  if (db_num_rows($res) != 0){?>
    <div>
      <div width="373" height="30" align="left" valign="middle" class="titulo">
        <h2>Visitantes</h2>
        <hr>
      </div>
    </div>
    <div height="450" valign="top"  >
      <div class="panel panel-default">
        <div class="panel-heading">Foram encontrados
          <?= $rows; ?>
          Visitantes</div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <!-- TÍTULO DA COLUNA DE CADA TABELA -->
              <thead>
                <tr>
                  <th style="width:40%;">Nome</th>
                  <th style="width:40%;">RG</th>
                  <th style="width:5%;">CPF</th>
                  <th style="width:10%;">Data de Inclus&atilde;o</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <!-- FIM TÍTULO DA COLUNA DE CADA TABELA --> 
              
              <!-- IMPRESSÃO DA TABELA -->
              <tbody>
                <!-- CORPO DA TABELA -->
                <? for ($i=0; $i<$rows; $i++){ ?>
                <tr class="odd gradeX">
                  <td><?=db_result($res,"nome_visit",$i); ?></td>
                  <td><?= db_result($res,"rg_visit",$i); ?></td>
                  <td><?= db_result($res,"cpf_visit",$i); ?></td>
                  <td><?= ConverteData(db_result($res,"data_visit",$i)); ?></td>
                  <td align="center"><?
				  	echo "<div align='center'><a href='?pg=15&opcao=excluir&id_visit=".db_result($res,'id_visit',$i)."'><img src='paginas/imagens/excluir.gif' alt='Excluir visitante' width='22' height='22' border='0'></a></div>";?></td>
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
  </div>
  <div>
      <div width="373" height="30" align="left" valign="middle" class="titulo">
        <h2>Agendar Visitas</h2>
        <hr>
      </div>
  </div>
  <? } else {
 	echo AlertInfo("N&atilde;o h&aacute; visitantes cadastrados!");
  } ?>
<? } else {
	 RedirecionaRapido("index.php");
	 exit();
} ?>