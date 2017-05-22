<?
	function getGet( $key ){
		return isset( $_GET[ $key ] ) ? $_GET[ $key ] : null;
	}
	$pg = getGet("pg");
	
	switch ($pg) {
        case 0:
        $GetPagina = include_once "dashboard.php"; //ok
        break;
        case 1:
        $GetPagina = include_once "dashboard.php"; //ok
        break;
        case 2:
        $GetPagina = include_once "paginas/condominio.php"; 
        break;
	case 3:
        $GetPagina = include_once "paginas/funcionarios.php"; //ok
        break;
	case 4:
        $GetPagina = include_once "paginas/estatuto_condominio.php";
        break;
	case 5:
        $GetPagina = include_once "paginas/corpo_diretivo.php"; //ok
        break;
	case 6:
        $GetPagina = include_once "paginas/visitante.php"; //ok
        break;
	case 7:
        $GetPagina = include_once "paginas/classificados.php";
        break;
	case 8:
        $GetPagina = include_once "paginas/livros_ocorrencia_altera.php";
        break;
	case 9:
        $GetPagina = include_once "dashboard.php"; //ok
        break;
	case 10:
        $GetPagina = include_once "paginas/reservas.php";
        break;
	case 11:
        $GetPagina = include_once "paginas/enquete.php"; //ok
        break;
	case 12:
        $GetPagina = include_once "paginas/agenda.php"; //ok
        break;
	case 13:
        $GetPagina = include_once "paginas/informativo.php"; //ok
        break;
	case 14:
        $GetPagina = include_once "paginas/livros_ocorrencia.php"; //ok
        break;
	case 15:
        $GetPagina = include_once "paginas/permissoes.php"; //ok
        break;
	case 16:
        $GetPagina = include_once "paginas/reunioes.php";//ok
        break;
	case 17:
        $GetPagina = include_once "paginas/classificados_altera.php"; //ok
        break;
	case 18:
        $GetPagina = include_once "paginas/atualiza_cadastro.php";
        break;
	case 19:
        $GetPagina = include_once "paginas/prestacao_contas.php"; //ok
        break;
	case 20:
        $GetPagina = include_once "paginas/morador_altera.php"; //ok
        break;
	case 21:
        $GetPagina = include_once "paginas/falecom_sindico.php"; //ok
        break;
	case 22:
        $GetPagina = include_once "paginas/configuracoes.php"; //ok
        break;
	case 23:
        $GetPagina = include_once "paginas/mapa.php"; //ok
        break;
	case 24:
        $GetPagina = include_once "paginas/logout.php"; //ok
        break;
	case 25:
        $GetPagina = include_once "paginas/enquete_altera.php"; //ok
        break;
	case 26:
		$GetPagina = include_once "paginas/agenda_altera.php"; //ok
        break;
	case 27:
		$GetPagina = include_once "paginas/informativo_email.php"; //ok
        break;
	case 28:
		$GetPagina = include_once "paginas/informativo_altera.php"; //ok
        break;
	case 29:
		$GetPagina = include_once "paginas/permissoes_altera.php"; //ok
        break; 
	case 30:
		$GetPagina = include_once "paginas/reunioes_altera.php"; //ok
        break;
	case 31:
		$GetPagina = include_once "paginas/morador.php"; //ok
        break;
	case 32:
		$GetPagina = include_once "paginas/prestacao_contas_altera.php"; //ok
        break;
	case 33:
		$GetPagina = include_once "paginas/altera_senha.php"; //ok
        break;
        case 34:
		$GetPagina = include_once "paginas/reservas_altera.php"; //ok
        break;
        case 35:
		$GetPagina = include_once "paginas/slider.php"; //ok
        break;
        case 36:
		$GetPagina = include_once "paginas/parceiros_altera.php"; //ok
        break;
        case 37:
		$GetPagina = include_once "paginas/onibus.php"; //ok
        break;
	case 38:
		$GetPagina = include_once "paginas/boleto.php"; //ok
        break;
        case 39:
		$GetPagina = include_once "paginas/lanca_boleto.php"; //ok
        break;
		case 40:
		$GetPagina = include_once "paginas/lanca_boleto_altera.php"; //ok
        break;

default:
include_once "dashboard.php";
}
?>