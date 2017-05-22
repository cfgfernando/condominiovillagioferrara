<?
$sql  = " SELECT *
		    FROM morador
		   WHERE cd_morador = ".$_SESSION['CD_MORADOR'];
$res  = db_query($sql);
$rows = db_num_rows($res);

	$nm_morador = db_result($res,"nm_morador");
	$ds_endereco = db_result($res,"ds_endereco");
	$nr_endereco = db_result($res,"nr_endereco");
	$ds_complemento = db_result($res,"ds_complemento");
	$nm_bairro = db_result($res,"nm_bairro");
	$nm_cidade = db_result($res,"nm_cidade");
	$sg_uf = db_result($res,"sg_uf");
	$nr_cep = db_result($res,"nr_cep");
	$fone_morador = db_result($res,"fone_morador");
	$nr_celular = db_result($res,"nr_celular");
	$email_morador = db_result($res,"email_morador");
	$cd_cat_usuario = db_result($res,"cd_cat_usuario");
	$login_usuario = db_result($res,"login_usuario");
	$photosmall = db_result($res,"photosmall");
?>

<div height="46" colspan="4" align="left" valign="middle" class="titulo"><b>
  <h2>Meu Perfil</h2>
  <hr>
</div>
<div class="tabs alternative">
  <ul class="nav nav-tabs">
    <li class="active"> <a href="#sample-2a" data-toggle="tab">Meus Dados</a> </li>
    <li> <a href="#sample-2b" data-toggle="tab">Moradores/Inquilinos</a> </li>
    <li> <a href="#sample-2c" data-toggle="tab">Lista de Visitante</a> </li>
    <li> <a href="#sample-2d" data-toggle="tab">Sample Heading 4</a> </li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane fade in active" id="sample-2a">
      <div class="row">
        <div style="float:left; margin-left:30px; margin-top:10px; margin-right:10px; margin-bottom:10px;"> <img alt="" src="<? 
			  if(file_exists("img/colaboradores/funcionarios/thumbs/{$photosmall}")){
				  echo "img/colaboradores/funcionarios/thumbs/{$photosmall}";
				  }elseif(file_exists("img/colaboradores/moradores/thumbs/{$photosmall}")){
					  echo "img/colaboradores/moradores/thumbs/{$photosmall}";
					  }else{
						  echo "paginas/imagens/funcionario_sem_img.jpg";
						  }?>" class="img-circle img-responsive" width="120px;" /> </div>
        <div class="col-md-7">
          <h3 class="no-margin no-padding">
            <?=$nm_morador?>
          </h3>
          <p>CPF:
            <?=$login_usuario?>
            <br />
            E-mail:
            <?=$email_morador?>
            <br />
            Telefone:
            <?=$fone_morador?>
            <br />
            Celular:
            <?=$nr_celular?>
          </p>
        </div>
      </div>
    </div>
    <div class="tab-pane fade in" id="sample-2b">
      <p>
      <div height="450" valign="top"  >
        <div class="panel panel-default">
          <div class="panel-heading">Foram encontrados
            <?= $rows; ?>
            Moradores/Inqulinos</div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <!-- TÍTULO DA COLUNA DE CADA TABELA -->
                <thead>
                  <tr>
                    <th style="width:40%;">Nome</th>
                    <th style="width:40%;">RG</th>
                    <th style="width:5%;">CPF</th>
                    <th style="width:10%;">Tipo</th>
                    <th>Excluir</th>
                  </tr>
                </thead>
                <!-- FIM TÍTULO DA COLUNA DE CADA TABELA --> 
                
                <!-- IMPRESSÃO DA TABELA -->
                <tbody>
                  <!-- CORPO DA TABELA -->
                  <? for ($i=0; $i<$rows_mi; $i++){ ?>
                  <tr class="odd gradeX">
                    <td><?=db_result($res_mi,"nome_mi",$i); ?></td>
                    <td><?=db_result($res_mi,"rg_mi",$i); ?></td>
                    <td><?=db_result($res_mi,"cpf_mi",$i); ?></td>
                    <td><?=db_result($res_mi,"tipo_mi",$i); ?></td>
                    <td align="center"><?
				  	echo "<div align='center'><a href='?pg=15&opcao=excluir&id_visit=".db_result($res_mi,'id_visit',$i)."'><img src='paginas/imagens/excluir.gif' alt='Excluir visitante' width='22' height='22' border='0'></a></div>";?></td>
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
    </p>
  </div>
  <div class="tab-pane fade in" id="sample-2c">
    <div class="row">
      <div class="col-md-5"> <img src="assets/img/fillers/filler3.jpg" alt="filler image"> </div>
      <div class="col-md-7">
        <h3 class="no-margin no-padding">Mirum Est Notare</h3>
        <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus,
          qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothicas.</p>
      </div>
    </div>
  </div>
  <div class="tab-pane fade in" id="sample-2d">
    <p>Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc. Pellentesque
      fermentum, ante ac interdum ullamcorper. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, consectetur id.</p>
    <ul>
      <li>Donec eget orci metus</li>
      <li>Ante ac interdum ullamcorper</li>
      <li>Vivamus imperdiet condimentum</li>
      <li>Pellentesque fermentum</li>
    </ul>
  </div>
</div>
</div>
