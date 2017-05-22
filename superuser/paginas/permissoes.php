<?
$sql102  = " SELECT * FROM permissoes ORDER BY cd_cat_usuario ASC ";
$res102  = db_query($sql102);
$rows102 = db_num_rows($res102);

?>

<div height="19" colspan="6" align="center" valign="middle" class="titulo">
  <h2>- Categorias de Usu&aacute;rios-</h2>
</div>
<hr />
<div class="panel-body">
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th width="10%">Codigo</th>
          <th width="80%">Tipo de Usu&aacute;rio</th>
          <th width="10%" align="center">Editar</th>
        </tr>
      </thead>
      <tbody>
        <? for ($i=0; $i<$rows102; $i++){ ?>
        <tr>
          <td><?= db_result($res102,"cd_cat_usuario", $i); ?></td>
          <td><?= db_result($res102,"tipo_user_perm", $i); ?></td>
          <td><? if (db_result($res102,"id_perm", $i) == 1){}else{ ?>
            <a href='?pg=29&cdcat=<?=db_result($res102,"cd_cat_usuario", $i);?>'> <img src='paginas/imagens/editar.png' alt='Alterar esta enquete' width='25' height='25' border='0'></a>
            <? } ?></td>
        </tr>
        <? } ?>
      </tbody>
    </table>
  </div>
</div>
