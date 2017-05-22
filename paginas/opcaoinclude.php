<?
	function getGet( $key ){
		return isset( $_GET[ $key ] ) ? $_GET[ $key ] : null;
	}
	$pg = getGet("pg");
	
	switch ($pg) {
        case 0:
        $GetPagina = include_once "paginas/home.php";
        break;
        case 1:
        $GetPagina = include_once "paginas/loginhome.php";
        break;
        case 2:
        $GetPagina = include_once "paginas/condominio.php";
        break;
	case 3:
        $GetPagina = include_once "paginas/funcionarios.php";
        break;
	case 4:
        $GetPagina = include_once "paginas/estatuto_condominio.php";
        break;
	case 5:
        $GetPagina = include_once "paginas/corpo_diretivo.php";
        break;
	case 6:
        $GetPagina = include_once "paginas/usuario_esqueci_senha.php";
        break;
	case 7:
        $GetPagina = include_once "paginas/classificados.php";
        break;
	case 8:
        $GetPagina = include_once "paginas/meuperfil.php";
        break;
	case 9:
        $GetPagina = include_once "paginas/anunciar.php";
        break;
	case 10:
        $GetPagina = include_once "paginas/reservas.php";
        break;
	case 11:
        $GetPagina = include_once "paginas/enquete.php";
        break;
	case 12:
        $GetPagina = include_once "paginas/agenda.php";
        break;
	case 13:
        $GetPagina = include_once "paginas/informativo.php";
        break;
	case 14:
        $GetPagina = include_once "paginas/livro_ocorrencias.php";
        break;
	case 15:
        $GetPagina = include_once "paginas/visitantes.php";
        break;
	case 16:
        $GetPagina = include_once "paginas/reunioes.php";
        break;
	case 17:
        $GetPagina = include_once "paginas/usuario_altera_senha.php";
        break;
	case 18:
        $GetPagina = include_once "paginas/atualiza_cadastro.php";
        break;
	case 19:
        $GetPagina = include_once "paginas/prestacao_contas.php";
        break;
	case 20:
        $GetPagina = include_once "paginas/falecom.php";
        break;
	case 21:
        $GetPagina = include_once "paginas/falecom_sindico.php";
        break;
	case 22:
        $GetPagina = include_once "paginas/onibus.php";
        break;
	case 23:
        $GetPagina = include_once "paginas/mapa.php";
        break;
	case 24:
        $GetPagina = include_once "paginas/logout.php";
        break;
	case 25:
		$GetPagina = include_once "paginas/informativo_desc.php";
        break;
	case 26:
		$GetPagina = include_once "paginas/forum.php";
        break;
	case 27:
		$GetPagina = include_once "paginas/forum_comentario.php";
        break;
	case 28:
		$GetPagina = include_once "paginas/moradores.php";
        break;
	case 29:
		$GetPagina = include_once "paginas/moradores_altera.php";
        break;
	case 30:
		$GetPagina = include_once "paginas/mensagem.php";
        break;
	case 31:
		$GetPagina = include_once "paginas/boleto.php";
        break;
	case 32:
		$GetPagina = include_once "paginas/downloads.php";
        break;
default:
include_once "paginas/loginhome.php";
}
?>