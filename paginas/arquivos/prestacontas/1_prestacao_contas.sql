-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Mar-2017 às 00:14
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `condominio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `cd_agenda` int(11) NOT NULL,
  `reserva` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `dt_agenda` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ata`
--

CREATE TABLE `ata` (
  `cd_ata` int(11) NOT NULL DEFAULT '0',
  `cd_reuniao` int(11) NOT NULL DEFAULT '0',
  `arquivo` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificados`
--

CREATE TABLE `classificados` (
  `cd_clas` int(11) NOT NULL,
  `nm_clas` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fone_clas` varchar(13) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `celular_clas` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email_clas` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ds_clas` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status_clas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dt_clas` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `classificados`
--

INSERT INTO `classificados` (`cd_clas`, `nm_clas`, `fone_clas`, `celular_clas`, `email_clas`, `ds_clas`, `status_clas`, `dt_clas`) VALUES
(1, 'Rolly', '', '(19)98156-0869', 'orcamentos@rolly.com.br', 'Script', 'Reprovado', '2017-03-12'),
(2, '', '', '', '', '<img alt=\'\' src=\'http://127.0.0.2/img/colaboradores/funcionarios/alta/imagem_1558bfd7d964abf_1488967641alta.jpg\' style=\'height:200px; width:200px\' />', 'Reprovado', '2017-03-12'),
(3, 'Edfsf', '(11)1111-1111', '(11)11111-1111', '11111111111111111111111111111111', 'dddddddd', 'Reprovado', '2017-03-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `condominio`
--

CREATE TABLE `condominio` (
  `cod_condominio` int(11) NOT NULL,
  `tit_condominio` varchar(200) NOT NULL,
  `txt_condominio` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `condominio`
--

INSERT INTO `condominio` (`cod_condominio`, `tit_condominio`, `txt_condominio`) VALUES
(1, 'Condomínio Bryan', 'texto sobre o dondom&iacute;nio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE `configuracoes` (
  `id_config` int(11) NOT NULL,
  `contato_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contato_fone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `endereco_config` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `bairro_config` text COLLATE utf8_unicode_ci NOT NULL,
  `cidade_config` text COLLATE utf8_unicode_ci NOT NULL,
  `cep_config` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `googleplus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_sindico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titulo_pagina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titulo_pagina_adm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `limiteCancelamento` int(3) NOT NULL,
  `meumapa` text COLLATE utf8_unicode_ci NOT NULL,
  `contato_site` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tit_home` varchar(280) COLLATE utf8_unicode_ci NOT NULL,
  `enderecoDoRss` text COLLATE utf8_unicode_ci NOT NULL,
  `QuantidadeExibir` int(10) NOT NULL,
  `visitante_conf` int(11) NOT NULL,
  `photosmall` text COLLATE utf8_unicode_ci NOT NULL,
  `photobig` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id_config`, `contato_email`, `contato_fone`, `endereco_config`, `bairro_config`, `cidade_config`, `cep_config`, `facebook`, `twitter`, `googleplus`, `email_sindico`, `titulo_pagina`, `titulo_pagina_adm`, `limiteCancelamento`, `meumapa`, `contato_site`, `tit_home`, `enderecoDoRss`, `QuantidadeExibir`, `visitante_conf`, `photosmall`, `photobig`) VALUES
(1, 'contato@seusite.com.br', '(19)98156-0869', 'Avenida Cabo Pedro Hoffman, 420', 'Residencial Real Parque', 'Sumaré-SP', '13.178-574', 'rolly.com.br', 'rolllysantos', 'rollysantos', 'sindico@seusite.com.br', 'Condominio Bryan', 'Sistema de Administração do Condominio Bryan', 10, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d631.5486594823195!2d-47.2218722!3d-22.829748400000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7081bf1eb941f02e!2sCondominio+Verano!5e0!3m2!1spt-BR!2sus!4v1486791099457', 'condominio', 'Top Notícias', 'http://www.otempo.com.br/rss/brasil', 10, 1, 'imagem_1458ac22ab9912f_1487676075baixa.png', 'imagem_1558ac22ab99142_1487676075alta.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `corpo_diretivo`
--

CREATE TABLE `corpo_diretivo` (
  `cd_corpo` int(11) NOT NULL,
  `nm_corpo` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email_corpo` varchar(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fone_corpo` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cargo_corpo` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `categoria` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `photosmall` text COLLATE utf8_unicode_ci NOT NULL,
  `photobig` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emails_teste`
--

CREATE TABLE `emails_teste` (
  `cd_info` int(11) NOT NULL,
  `email_info` varchar(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enquete`
--

CREATE TABLE `enquete` (
  `cd_enq` int(11) NOT NULL,
  `pergunta_enq` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `ativa_enq` int(1) NOT NULL,
  `alternativa1` varchar(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `alternativa2` varchar(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `alternativa3` varchar(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dt_enq` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `enquete`
--

INSERT INTO `enquete` (`cd_enq`, `pergunta_enq`, `ativa_enq`, `alternativa1`, `alternativa2`, `alternativa3`, `dt_enq`) VALUES
(1, 'Você concorda que o Síndico obrigue a usar apenas um sistema de tv via satélite?', 1, 'Sim', 'Não', 'Nem sabia que era obrigado a ser sky', '2017-03-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `enquete_javotou`
--

CREATE TABLE `enquete_javotou` (
  `id_enqjavotou` int(11) NOT NULL,
  `cd_enq` int(11) NOT NULL,
  `cd_morador` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enquete_voto`
--

CREATE TABLE `enquete_voto` (
  `cd_voto` int(11) NOT NULL,
  `cd_enq` int(11) NOT NULL DEFAULT '0',
  `vt_alternativa1` int(11) NOT NULL DEFAULT '0',
  `vt_alternativa2` int(11) NOT NULL DEFAULT '0',
  `vt_alternativa3` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estatuto`
--

CREATE TABLE `estatuto` (
  `cod_estatuto` int(2) NOT NULL,
  `tit_estatuto` varchar(200) NOT NULL,
  `txt_estatuto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estatuto`
--

INSERT INTO `estatuto` (`cod_estatuto`, `tit_estatuto`, `txt_estatuto`) VALUES
(1, 'Estatuto', '<p><strong>2. DO USO DAS &Aacute;REAS COMUNS 2</strong><br />\r\n&nbsp;<br />\r\n2.1 - &Eacute; permitido aos moradores usar e usufruir das partes comuns do Condom&iacute;nio, desde que n&atilde;o impe&ccedil;am id&ecirc;ntico uso e frui&ccedil;&atilde;o por parte dos demais cond&ocirc;minos.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2 &nbsp;- &Eacute; vedado a qualquer t&iacute;tulo ceder ou alugar as partes comuns do edif&iacute;cio, no todo ou em parte, a pessoa que n&atilde;o residir no mesmo, para grupos, agremia&ccedil;&otilde;es ou entidades de qualquer natureza, com ou sem fins lucrativos.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.3&nbsp;- A entrada social do pr&eacute;dio destina-se aos moradores,&nbsp;<br />\r\npropriet&aacute;rios ou inquilinos, respectivas fam&iacute;lias e visitantes, respeitado o que disp&otilde;e a Lei Estadual 952, de 27/12/85.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.4 - &Eacute; proibida a perman&ecirc;ncia de empregados nos halls, escadas<br />\r\nsociais e de servi&ccedil;o, garagens ou &aacute;reas externas, exceto quando a servi&ccedil;o.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.5 - N&atilde;o &eacute; permitida a entrada no pr&eacute;dio de pessoas estranhas, exceto quando autorizadas por algum morador que as acompanhe, ou ap&oacute;s ser acionado pela seguran&ccedil;a do Condom&iacute;nio, devendo&nbsp; esta autoriza&ccedil;&atilde;o ser registrada no livro de ocorr&ecirc;ncia existente no port&atilde;o de entrada,&nbsp; visando&nbsp; ao&nbsp; controle&nbsp; e&nbsp;&nbsp; apura&ccedil;&atilde;o&nbsp; de&nbsp; fatos&nbsp;&nbsp; eventualmente ocorridos neste per&iacute;odo.&nbsp; Neste caso, o ingresso e a perman&ecirc;ncia dessas pessoas ficar&atilde;o sob total responsabilidade do respectivo cond&ocirc;mino que os autorizou.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.6 - &Eacute; proibido o uso de bicicletas, skates. patins e similares nas<br />\r\n&aacute;reas&nbsp; comuns,&nbsp;&nbsp; salvo&nbsp;&nbsp; se&nbsp;&nbsp; existir&nbsp; local&nbsp;&nbsp; apropriado&nbsp;&nbsp; e&nbsp; previamente determinado por este Regimento ou pela Administra&ccedil;&atilde;o.<br />\r\n&nbsp;<br />\r\n2.7- E expressamente proibida a utiliza&ccedil;&atilde;o da recep&ccedil;&atilde;o como<br />\r\nextens&atilde;o de sala de jogos ou lazer, como colocar os p&eacute;s ou deitar sobre os sof&aacute;s, realizar brincadeiras ou qualquer outro jogo que possa causar danos aos m&oacute;veis e guarni&ccedil;&otilde;es das mesmas, ficando seus transgressores sujeitos ao pagamento das multas previstas neste Regimento.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.8- Somente ser&atilde;o permitidas&nbsp; cargas e mudan&ccedil;as,&nbsp; al&eacute;m de<br />\r\nentregas&nbsp; de mercadorias,&nbsp; m&oacute;veis&nbsp; e&nbsp; similares,&nbsp; pelos&nbsp; elevadores&nbsp; de servi&ccedil;o em dias &uacute;teis (de segunda a sexta-feira), das 09:00h &agrave;s 17:00h, devendo ser avisada a portaria de servi&ccedil;o, de modo a ser escolhido o elevador destinado a tal fim. ou excepcionalmente fora deste hor&aacute;rio, mas previamente&nbsp;&nbsp; autorizado&nbsp; pela&nbsp; Administra&ccedil;&atilde;o&nbsp; do&nbsp; Edif&iacute;cio.&nbsp;&nbsp; Em hip&oacute;tese alguma poder&atilde;o ser utilizados os dois elevadores de servi&ccedil;o para a realiza&ccedil;&atilde;o destes servi&ccedil;os.<br />\r\n&nbsp;<br />\r\n2.9- E proibido o uso de ve&iacute;culos motorizados nas depend&ecirc;ncias do Condom&iacute;nio, salvo quando em tr&acirc;nsito de entrada e sa&iacute;da.<br />\r\n&nbsp;<br />\r\n2.10&nbsp;- &Eacute; proibido parar ou estacionar ve&iacute;culos automotores em<br />\r\nfrente &agrave;s &aacute;reas de acesso ao Edif&iacute;cio, assim como sobre as cal&ccedil;adas,rampas e demais &aacute;reas de circula&ccedil;&atilde;o.<br />\r\n&nbsp;<br />\r\n2.11&nbsp;&nbsp; &ndash; &Eacute; proibido guardar ou depositar em qualquer parte do Edif&iacute;cio subst&acirc;ncias explosivas ou inflam&aacute;veis, bem como agentes biol&oacute;gicos, qu&iacute;micos ou emissores de radia&ccedil;&otilde;es&nbsp;&nbsp; ionizantes&nbsp;&nbsp; e/ou suscept&iacute;veis&nbsp;&nbsp; de&nbsp;&nbsp; afetar&nbsp; a&nbsp; sa&uacute;de,&nbsp;&nbsp; seguran&ccedil;a&nbsp; ou&nbsp; tranq&uuml;ilidade&nbsp; dos moradores, bem como provocar o aumento da taxa de seguro.<br />\r\n&nbsp;<br />\r\n2.12- S&atilde;o proibidos os jogos ou qualquer pr&aacute;tica esportiva fora dos locais destinados para tal fim.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.13&nbsp;- &Eacute; proibido aos moradores e visitantes entrar nas depend&ecirc;ncias reservadas aos equipamentos e instala&ccedil;&otilde;es do Condom&iacute;nio tais como: terra&ccedil;o do pr&eacute;dio, casa de m&aacute;quinas dos elevadores, bombas de inc&ecirc;ndio, exaustores, bombas de &aacute;gua, compactadores de lixo, equipamento de piscinas, medidores de luz e g&aacute;s, hidr&ocirc;metros, sala&nbsp;&nbsp; de&nbsp; computa&ccedil;&atilde;o,&nbsp;&nbsp; telhado,&nbsp;&nbsp; sala&nbsp; de&nbsp;&nbsp; geradores&nbsp;&nbsp; e&nbsp;&nbsp; esta&ccedil;&atilde;o&nbsp; de tratamento de esgoto (ETE),<br />\r\n&nbsp;<br />\r\n2.14- &Eacute; proibido atirar f&oacute;sforos, pontas de cigarro, detritos ou quaisquer objetos peias portas, janelas e varandas, bem como nas &aacute;reas de servi&ccedil;o, elevadores e demais partes comuns do Pr&eacute;dio.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.15- Cabe &agrave; Administra&ccedil;&atilde;o ou ao funcion&aacute;rio designado por esta entender-se, quando necess&aacute;rio, com os cond&ocirc;minos a fim de que sejam dirimidas d&uacute;vidas, bem como no sentido de que sejam tomadas<br />\r\nprovid&ecirc;ncias visando &agrave; seguran&ccedil;a do pr&eacute;dio e/ou moradores.<br />\r\n&nbsp;<br />\r\n2.16&nbsp;- As portas corta-fogo dever&atilde;o ser mantidas&nbsp; permanentemente fechadas.<br />\r\n&nbsp;<br />\r\n2.17&nbsp;- &Eacute; proibido colocar ou deixar que se coloquem nas paredes comuns do edif&iacute;cio quaisquer objetos ou instala&ccedil;&otilde;es, de qualquer natureza, bem assim guardar fogos&nbsp; de&nbsp; artif&iacute;cio,&nbsp; tanto nas&nbsp; partes comuns&nbsp; quanto&nbsp; nas&nbsp; unidades&nbsp; aut&ocirc;nomas.&nbsp; Em datas festivas ser&aacute;<br />\r\ntolerado, sob rigorosas normas t&eacute;cnicas e fiscaliza&ccedil;&atilde;o, o uso de fogos, desde que n&atilde;o causem danos materiais e pessoais.<br />\r\n&nbsp;<br />\r\n2.18&nbsp;-&nbsp; E&nbsp;&nbsp; proibido&nbsp; tr&acirc;nsito&nbsp; de&nbsp; pedestre&nbsp; ou&nbsp;&nbsp; se&nbsp; locomover&nbsp; de bicicletas pela rampa da garagem.<br />\r\n2.1 - DOS ELEVADORES<br />\r\n&nbsp;<br />\r\n2.1.1- &Eacute; proibido utilizar os elevadores sociais quando em trajes de&nbsp; banho,&nbsp;&nbsp; sem&nbsp; camisa,&nbsp;&nbsp; ou&nbsp; de&nbsp;&nbsp; pr&aacute;tica&nbsp;&nbsp; de&nbsp;&nbsp; esportes,&nbsp;&nbsp; bem&nbsp; como transportar&nbsp;&nbsp; bagagem,&nbsp;&nbsp; carga, objetos&nbsp;&nbsp; volumosos,&nbsp;&nbsp; equipamentos esportivos, bicicletas, ve&iacute;culos infantis e animais.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.1.2- E proibido o uso dos elevadores por crian&ccedil;as menores de 10 anos, se desacompanhadas.<br />\r\n&nbsp;<br />\r\n2.1.3- &Eacute; proibido manter as portas dos elevadores abertas al&eacute;m do tempo necess&aacute;rio para a entrada e sa&iacute;da de pessoas, exceto em caso de limpeza ou manuten&ccedil;&atilde;o por parte das pessoas credenciadas pela Administra&ccedil;&atilde;o do Condom&iacute;nio.<br />\r\n&nbsp;<br />\r\n2.1.4- Todas as restri&ccedil;&otilde;es ao uso dos elevadores sociais cessar&atilde;o desde que os de servi&ccedil;o estejam era manuten&ccedil;&atilde;o, com defeito, com mudan&ccedil;a ou em conserva&ccedil;&atilde;o. Neste caso os elevadores sociais ser&atilde;o preparados para substitu&iacute;rem os de servi&ccedil;o.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.1.5- As mudan&ccedil;as e/ou entregas que obrigarem a utiliza&ccedil;&atilde;o excepcional dos elevadores e das &aacute;reas de acesso e de circula&ccedil;&atilde;o do Condom&iacute;nio s&oacute; poder&atilde;o ser efetuadas nos dias e dentro dos hor&aacute;rios estipulados para esse fim, ficando essa utiliza&ccedil;&atilde;o restrita &agrave;quele que<br />\r\natender diretamente &agrave; unidade visada e devendo ser feita no menor tempo poss&iacute;vel, intercalando, se necess&aacute;rio, viagens de interesse de outros moradores pelo respectivo elevador.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.1.6&ndash;Na hip&oacute;tese de ocorr&ecirc;ncia de danos aos elevadores e outras partes comuns do condom&iacute;nio, durante a mudan&ccedil;a, fica o cond&ocirc;mino ou inquilino, propriet&aacute;rio dos objetos transportados,&nbsp;&nbsp; respons&aacute;vel perante o condom&iacute;nio pelo custeio dos reparos necess&aacute;rios.<br />\r\n2.2 - DAS VAGAS DE GARAGEM E SUA UTILIZA&Ccedil;&Atilde;O<br />\r\n&nbsp;<br />\r\n2.2.1- As garagens do Condom&iacute;nio destinam-se exclusivamente a guarda de autom&oacute;veis e motos pertencentes&nbsp; aos&nbsp; moradores&nbsp; e/ou locat&aacute;rios, identificados por cart&atilde;o ou adesivo pr&oacute;prio, fornecidos pelo Condom&iacute;nio de uso obrigat&oacute;rio, de acordo com o n&uacute;mero de vagas estipuladas&nbsp; em suas escrituras de propriedade,&nbsp; o&nbsp; qual dever&aacute; ser mantido&nbsp; em&nbsp; seu&nbsp; interior,&nbsp; junto&nbsp; ao&nbsp; p&aacute;ra-brisa&nbsp; dianteiro,&nbsp;&nbsp; enquanto permanecer estacionado. Fica obrigado o Condom&iacute;nio a registrar no&quot;livro de ocorr&ecirc;ncias o extravio ou inutiliza&ccedil;&atilde;o do cart&atilde;o de identifica&ccedil;&atilde;o<br />\r\ndo veiculo.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.2- Poder&atilde;o tamb&eacute;m ser guardadas na garagem do Edif&iacute;cio bicicletas de propriedade&nbsp; dos cond&ocirc;minos,&nbsp; no biciclet&aacute;rio,&nbsp; ficando expressamente entendido que o Condom&iacute;nio n&atilde;o ser&aacute; de forma alguma respons&aacute;vel pelas referidas bicicletas, em raz&atilde;o de eventual furto ou da ocorr&ecirc;ncia de danos &agrave;s mesmas.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.3- As motocicletas ocupar&atilde;o o mesmo espa&ccedil;o f&iacute;sico da(s) vaga(s) de garagem de cada apartamento, estacionando por inteiro dentro dos limites da vaga respectiva, de modo que n&atilde;o prejudiquem as condi&ccedil;&otilde;es do estacionamento, circula&ccedil;&atilde;o e manobra de garagem.Seu funcionamento n&atilde;o&nbsp; dever&aacute; p&ocirc;r em risco&nbsp; outros ve&iacute;culos&nbsp; e/ou pessoas&nbsp; no&nbsp; interior&nbsp; da&nbsp; garagem,&nbsp;&nbsp; nem&nbsp; causar ru&iacute;do&nbsp; prejudicial &agrave; tranq&uuml;ilidade dos edif&iacute;cios.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.4- Cada cond&ocirc;mino ter&aacute; o direito ao n&uacute;mero de vagas na garagem especificadas na Conven&ccedil;&atilde;o, ou estipuladas em suas escrituras de propriedade, n&atilde;o havendo local fixo para guarda dos carros, visando maior facilidade de entrada e sa&iacute;da dos ve&iacute;culos, devendo ser respeitados limites das mesmas de acordo com as marca&ccedil;&otilde;es existentes nos pisos. As motocicletas ocupar&atilde;o o mesmo espa&ccedil;o f&iacute;sico da(s) vaga(s) de garagem de cada apartamento, desde que os autom&oacute;veis tenham dimens&otilde;es compat&iacute;veis com a &aacute;rea da vaga respectiva e as necessidades de estacionamento, circula&ccedil;&atilde;o e manobra tenham peso compat&iacute;vel com a capacidade de carga dos pisos da garagem e sejam mantidos descarregados.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.5- Em caso de loca&ccedil;&atilde;o dos apartamentos, os locat&aacute;rios ter&atilde;o salvo&nbsp; disposi&ccedil;&atilde;o&nbsp; contratual&nbsp; em contr&aacute;rio,&nbsp; direito&nbsp; &agrave;(s) vaga(s) respectiva(s), devendo o propriet&aacute;rio transferir ao locat&aacute;rio as obriga&ccedil;&otilde;es constantes deste regulamento e da Conven&ccedil;&atilde;o do Condom&iacute;nio, comunicar a Administra&ccedil;&atilde;o de loca&ccedil;&atilde;o da unidade no prazo de 05 (cinco) dias, fornecendo o endere&ccedil;o de sua resid&ecirc;ncia e telefone (locador),bem como nome e endere&ccedil;o da administradora da loca&ccedil;&atilde;o, quando houver.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.6- &Egrave; proibida a guarda da garagem de carros com altura superior a 02 (dois) metros ou que, por seu tamanho ou dimens&otilde;es,prejudiquem a circula&ccedil;&atilde;o no interior da mesma, ou possam danificar as<br />\r\ntubula&ccedil;&otilde;es existentes no local.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.7- Cada autom&oacute;vel ou motocicleta estacionado nas garagens dever&aacute; manter em seu interior, junto&nbsp; ao&nbsp; p&aacute;ra-brisa,&nbsp; o&nbsp; adesivo do estacionamento.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.8- Fica proibida a guarda de animais, embrulhos, volumes, pe&ccedil;as, acess&oacute;rios ou qualquer outro tipo de material nas garagens.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.9- N&atilde;o &eacute; permitida a velocidade superior a lOkm/h. nem o uso de buzinas, em toda a &aacute;rea do condom&iacute;nio.<br />\r\n&nbsp;<br />\r\n2.2.10- Qualquer dano causado por um ve&iacute;culo a outro ser&aacute; de inteira e exclusiva responsabilidade do propriet&aacute;rio do ve&iacute;culo causador do dano, devendo o mesmo ressarcir o preju&iacute;zo causado em entendimento direto com o prejudicado.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.11- &Eacute; proibido&nbsp; o&nbsp; uso&nbsp; das&nbsp; garagens&nbsp; para a execu&ccedil;&atilde;o de qualquer servi&ccedil;o (montagem de m&oacute;veis, pintura, troca de pe&ccedil;as em autom&oacute;veis,&nbsp;&nbsp; lanternagem&nbsp;&nbsp; e&nbsp;&nbsp; teste&nbsp;&nbsp; de&nbsp;&nbsp; motores&nbsp;&nbsp; e&nbsp;&nbsp; de&nbsp;&nbsp; buzinas), executando-se troca de pneus quando absolutamente necess&aacute;rios, e socorro mec&acirc;nico visando &agrave; retirada do veiculo do interior das garagens.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.12&nbsp;- &Eacute; expressamente proibida a perman&ecirc;ncia de pessoas estranhas e crian&ccedil;as nas depend&ecirc;ncias das garagens, salvo para os casos de embarque e desembarque destas &uacute;ltimas.<br />\r\n&nbsp;<br />\r\n2.2.13- Salvo quando em tr&acirc;nsito, &eacute; proibido o uso de bicicletas e motocicletas nas depend&ecirc;ncias das garagens. Fica tamb&eacute;m proibido o uso de skates, patins e etc, al&eacute;m de jogos de qualquer natureza, nas depend&ecirc;ncias das garagens.<br />\r\n&nbsp;<br />\r\n2.2.14- &Eacute; proibido o uso das garagens para guardar m&oacute;veis, utens&iacute;lios, motores, pneus, ferramentas ou quaisquer outros objetos, inclusive entulho.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.15- Os Cond&ocirc;minos e usu&aacute;rios dos locais de estacionamento do Edif&iacute;cio (garagens e estacionamento de visitantes) ficam inteiramente cientes de que nenhuma responsabilidade poder&aacute; ser imputada ao Condom&iacute;nio ou a qualquer pessoa a ele vinculado em decorr&ecirc;ncia de preju&iacute;zos de qualquer natureza provenientes de furto, roubo, e inc&ecirc;ndio de ve&iacute;culos, ou outras avarias que porventura venham a sofrer no interior do edif&iacute;cio, objetos eventualmente deixados no interior dos mesmos pertencentes ao Condom&iacute;nio ou usu&aacute;rio, que assumir&aacute; inteira responsabilidade por tais eventos, provocados pela m&aacute; utiliza&ccedil;&atilde;o da garagem ou da &aacute;rea de estacionamento para visitantes.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.16- &Egrave; obrigat&oacute;ria a comunica&ccedil;&atilde;o &agrave; Administra&ccedil;&atilde;o das placas dos autom&oacute;veis e motocicletas a serem guardados no interior das garagens, visando facilitar a identifica&ccedil;&atilde;o e comunica&ccedil;&atilde;o pela Admi&not;nistra&ccedil;&atilde;o de irregularidades que porventura estiverem praticando ou prevenir danos.&nbsp; Em caso de furto, roubo e/ou venda de autom&oacute;vel/motocicleta, o&nbsp; cond&ocirc;mino&nbsp; ficar&aacute;&nbsp; obrigado&nbsp;&nbsp; a&nbsp; comunicar&nbsp; e/ou requerer a baixa do ve&iacute;culo cadastrado junto &agrave; administra&ccedil;&atilde;o.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.17- N&atilde;o se admitir&aacute; o ingresso no interior da(s) garagem(s) de ve&iacute;culos que apresentem anormalidades tais como motor produzindo ru&iacute;dos e/ou vazamentos&nbsp; de combust&iacute;vel e/ou &oacute;leo,&nbsp; freios em mau estado, silenciosos, defeituosos ou fora das especifica&ccedil;&otilde;es originais do ve&iacute;culo&nbsp; e&nbsp; quaisquer&nbsp; outras&nbsp;&nbsp; anormalidades&nbsp;&nbsp; que&nbsp; possam afetar&nbsp; as condi&ccedil;&otilde;es de seguran&ccedil;a, tranq&uuml;ilidade e limpeza do Condom&iacute;nio.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.18&nbsp;- A vaga-garagem vinculada poder&aacute; ser alienada ou alugada de uma unidade aut&ocirc;noma para outra unidade aut&ocirc;noma, vedada expressamente a aliena&ccedil;&atilde;o ou loca&ccedil;&atilde;o a quem&nbsp; n&atilde;o&nbsp;&nbsp; for cond&ocirc;mino do edif&iacute;cio. A aliena&ccedil;&atilde;o dever&aacute; ser registrada no Cart&oacute;rio Imobili&aacute;rio e cientificada, por escrito, ao S&iacute;ndico, com a devida comprova&ccedil;&atilde;o. A loca&ccedil;&atilde;o tamb&eacute;m dever&aacute; ser comunicada, com indica&ccedil;&atilde;o do nome do cond&ocirc;mino locat&aacute;rio.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.19- N&atilde;o &eacute; permitido o ingresso nas garagens de autom&oacute;veis que apresentem anormalidades que possam causar danos &agrave;s partes comuns ou aos demais ve&iacute;culos.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.20- &Eacute; proibido experimentar buzinas e, desde que possam perturbar o sossego de moradores e usu&aacute;rios, r&aacute;dio, equipamentos de som, e motores ou quaisquer equipamentos que causem polui&ccedil;&atilde;o sonora, etc. nas depend&ecirc;ncias da(s) garagem(s).<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.21- Aquele que n&atilde;o obedecer &agrave; sinaliza&ccedil;&atilde;o, &agrave;s indica&ccedil;&otilde;es de tr&acirc;nsito na garagem ou ocasionar quaisquer preju&iacute;zos ou transtornos a terceiros ficar&aacute; sujeito &agrave;s penas de lei aplic&aacute;veis ao caso, eximindo-se o Condom&iacute;nio ou qualquer pessoa a ele vinculado de qualquer &ocirc;nus relativo &agrave; ocorr&ecirc;ncia.&nbsp; O Condom&iacute;nio n&atilde;o ter&aacute; nenhuma responsabilidade civil ou criminal por acidentes que venham a ocorrer com autom&oacute;veis ou contra terceiros, ficando esta responsabilidade por conta exclusiva do propriet&aacute;rio do ve&iacute;culo causador do acidente.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.22- Ao morador/cond&ocirc;mino que possuir ve&iacute;culos estacionados nas garagens, sem direito &agrave; vaga. ser&aacute; imputada multa pecuni&aacute;ria conforme estatu&iacute;do no Cap&iacute;tulo &ldquo;Das penalidades&rdquo;.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.23- &Eacute; expressamente proibida a lavagem de carros no interior da garagem do primeiro piso, a qual n&atilde;o est&aacute; preparada para a execu&ccedil;&atilde;o deste servi&ccedil;o, devendo o morador dirigir-se ao segundo piso, onde poder&aacute; faz&ecirc;-lo em locais previamente designados pela Administra&ccedil;&atilde;o do Condom&iacute;nio. O servi&ccedil;o poder&aacute; ser executado pelos<br />\r\nmoradores ou servi&ccedil;ais do Condom&iacute;nio, mas estes sempre fora de seu hor&aacute;rio de servi&ccedil;o, sendo vedado o uso de mangueiras ou qualquer outro utens&iacute;lio que possa causar desperd&iacute;cio de &aacute;gua, devendo ser utilizados baldes ou vasilhas de pequeno porte para tal fim.&nbsp; Os transgressores, se cond&ocirc;minos e/ou residentes, ser&atilde;o penalizados com as san&ccedil;&otilde;es previstas neste Regimento Interno; se funcion&aacute;rios com rescis&atilde;o do contrato de trabalho, por justa causa.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.2.24- N&atilde;o ser&aacute; imputado ao Condom&iacute;nio e/ou a qualquer pessoa a ele vinculada qualquer dano, avaria ou furto de ve&iacute;culo e/ou objetos eventualmente deixados no interior cio mesmo, enquanto estacionados na &aacute;rea de visitantes, ficando a responsabilidade a cargo do propriet&aacute;rio do ve&iacute;culo.<br />\r\n2.3. DO ESTACIONAMENTO PARA VISITANTES<br />\r\n&nbsp;<br />\r\n2.3.1- Existem p.o Condom&iacute;nio 56 (cinq&uuml;enta e seis) vagas para autom&oacute;veis de visitantes, assim distribu&iacute;das: 41 vagas no pavimento t&eacute;rreo/acesso e 15 vagas no subsolo, as quais ser&atilde;o utilizadas da<br />\r\nseguinte forma:<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.3.2- Somente nas vagas do pavimento de acesso poder&atilde;o ser estacionados os ve&iacute;culos dos visitantes no Condom&iacute;nio.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.3.3- A entrada do visitante somente poder&aacute; ser admitida com a autoriza&ccedil;&atilde;o&nbsp; pr&eacute;via&nbsp;&nbsp; do&nbsp;&nbsp; propriet&aacute;rio&nbsp;&nbsp; ou&nbsp;&nbsp; inquilino,&nbsp;&nbsp; o&nbsp;&nbsp; qual&nbsp;&nbsp; dever&aacute; encontrar-se no Edif&iacute;cio, ou excepcionalmente esta autoriza&ccedil;&atilde;o dever&aacute; ser efetuada por escrito no momento da aus&ecirc;ncia do morador, mas n&atilde;o se admitir&aacute; em hip&oacute;tese alguma autoriza&ccedil;&atilde;o permanente ou para dias posteriores, ou quando ficar caracterizado mero favorecimento para conhecidos,&nbsp;&nbsp; sem&nbsp;&nbsp; qualquer&nbsp;&nbsp; conota&ccedil;&atilde;o&nbsp;&nbsp; de&nbsp;&nbsp; visita,&nbsp;&nbsp;&nbsp; assumindo&nbsp;&nbsp; o Cond&ocirc;mino que autorizou a entrada.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.3.4- Ao entrar no Edif&iacute;cio, o visitante receber&aacute; um cart&atilde;o, que dever&aacute; ser colocado no p&aacute;ra-brisa do ve&iacute;culo enquanto estiver estacionado no interior do Condom&iacute;nio, visando sua r&aacute;pida localiza&ccedil;&atilde;o em caso de necessidade.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.3.5- Quando da sa&iacute;da do Condom&iacute;nio, o visitante restituir&aacute; &agrave; seguran&ccedil;a o cart&atilde;o de estacionamento de visitantes.&nbsp;&nbsp; Na guarita principal dever&atilde;o ser anotados o hor&aacute;rio de sa&iacute;da do visitante e a placa<br />\r\nde ve&iacute;culo.<br />\r\n&nbsp;<br />\r\n2.3.6- N&atilde;o ser&aacute; admitido o estacionamento de ve&iacute;culos fora das vagas demarcadas sob nenhum pretexto.<br />\r\n&nbsp;<br />\r\n2.3.7- Fica vedada a possibilidade de reserva antecipada de vagas de estacionamento.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.3.8- Uma vez ocupadas todas as 46 (quarenta e seis) vagas reservadas aos visitantes, n&atilde;o ser&aacute; permitido o ingresso de ve&iacute;culos de visitantes no interior do Condom&iacute;nio, sob nenhuma alega&ccedil;&atilde;o.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.3.9- N&atilde;o ser&aacute; imputado ao Condom&iacute;nio e/ou qualquer pessoa a ele vinculada qualquer dano, avaria ou furto de ve&iacute;culo e/ou objetos eventualmente deixados no interior do mesmo, enquanto estacionado na &aacute;rea&nbsp; de&nbsp; visitantes,&nbsp;&nbsp; ficando a&nbsp;&nbsp; responsabilidade&nbsp;&nbsp; a&nbsp;&nbsp; cargo do propriet&aacute;rio do ve&iacute;culo.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.3.10&nbsp;- &Eacute; proibido o estacionamento de ve&iacute;culos de visitantes no interior&nbsp; das&nbsp; garagens&nbsp;&nbsp; do&nbsp;&nbsp; Condom&iacute;nio, as&nbsp; quais&nbsp;&nbsp; s&atilde;o&nbsp; reservadas exclusivamente ao uso dos Cond&ocirc;minos,<br />\r\n2.4&nbsp;- DO PLAYGBOUND E &Aacute;REAS AJARDINADAS<br />\r\n&nbsp;<br />\r\n2.4.1- O Condom&iacute;nio possui playground composto de brinquedos para uso infantil (01 a 07 anos), bem como &aacute;reas de lazer e ajardinadas para uso de seus moradores e visitantes, a saber.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.4.2- O hor&aacute;rio de funcionamento do playground ser&aacute; de O8:00h &agrave;s 22;00h, ap&oacute;s o que ser&aacute; reduzida a ilumina&ccedil;&atilde;o e vedada a utiliza&ccedil;&atilde;o quando causar barulho nocivo ao sossego e repouso dos moradores de Condom&iacute;nio.<br />\r\n&nbsp;<br />\r\n2.4.3-&nbsp; Cabe&nbsp;&nbsp; &agrave;&nbsp; Administra&ccedil;&atilde;o,&nbsp;&nbsp; quando&nbsp;&nbsp; necess&aacute;rio&nbsp; para a execu&ccedil;&atilde;o de obras ou servi&ccedil;os, alterar o hor&aacute;rio normal estabelecido.Em tal caso, ser&aacute; afixado no quadro de aviso o novo hor&aacute;rio a prevalecer.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.4.4- A presen&ccedil;a ou perman&ecirc;ncia de pessoas estranhas ao Condom&iacute;nio no playground ficar&aacute; condicionada ao acompanhamento por moradores, responsabilizando estes por danos ou preju&iacute;zos que<br />\r\npossam ocorrer &agrave;s pessoas que o utilizam ou aos equipamentos nele existentes.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.4.5- O Condom&iacute;nio respons&aacute;vel por dano &agrave;s depend&ecirc;ncias do playground obriga-se a pagar o valor apurado pela Administra&ccedil;&atilde;o, sujeitando-se, em caso de recusa, &agrave; cobran&ccedil;a judicial e multa prevista na Conven&ccedil;&atilde;o.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.4.6- &Eacute; proibido o uso do playground de modo que possa perturbar ou interferir no direito de outras pessoas de desfrutarem do mesmo,<br />\r\n2.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - DOS COLETORES E COMPACTADORES DE LIXO<br />\r\n&nbsp;<br />\r\n2.5.1- O Condom&iacute;nio possui coletores e compactadores de lixo. Cabe aos moradores ou aos seus servi&ccedil;ais usarem os tubos coletores de lixo de modo que os detritos, que neles dever&atilde;o ser lan&ccedil;ados, estejam devidamente acondicionados em sacos pl&aacute;sticos fechados.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.5.2- &Eacute; proibido lan&ccedil;ar pelos tubos coletores de lixo objetos tais como: produtos qu&iacute;micos, muni&ccedil;&otilde;es, explosivos, pilhas, baterias, latas, vidros, garrafas, caixas, caixotes, entulhos, materiais s&oacute;lidos de grande volume e tudo o mais que possa p&ocirc;r em risco os equipamentos compactadores e/ou quem tiver de oper&aacute;-los. Tais materiais dever&atilde;o ser deixados, convenientemente limpos, no compartimento do coletor para serem recolhidos, diariamente, pelos funcion&aacute;rios do Condom&iacute;nio, que ir&atilde;o selecion&aacute;-los por esp&eacute;cie.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.5.3&nbsp;- Os empregados dom&eacute;sticos devem ser instru&iacute;dos no sentido do fiel cumprimento destas recomenda&ccedil;&otilde;es; bem como para que evitem sujar as paredes e o piso dos corredores ao transportarem o lixo.<br />\r\n&nbsp;<br />\r\n2.5.4- &Eacute; proibido lan&ccedil;ar quaisquer objetos ou l&iacute;quidos sobre a via p&uacute;blica, &aacute;rea ou p&aacute;tio interno.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.5.5- &Eacute; proibido lan&ccedil;ar quaisquer materiais, objetos, res&iacute;duos, restos ou detritos nas partes comuns do conjunto, ficando respons&aacute;veis pelas conseq&uuml;&ecirc;ncias dessa infra&ccedil;&atilde;o os que assim procederem.<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n2.5.6- A inobserv&acirc;ncia pelo Cond&ocirc;mino ou seus empregados das regras de comportamento estabelecidas para a utiliza&ccedil;&atilde;o dos coletores de lixo e compactadores acarretar&aacute; para o seu transgressor a multa<br />\r\nconforme previsto no Cap&iacute;tulo IX das penalidades.<br />\r\n&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cd_cat_usuario` int(11) NOT NULL,
  `cd_func` int(11) NOT NULL,
  `nm_func` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `cargo_func` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fone_func` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email_func` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `login_usuario` text COLLATE utf8_unicode_ci NOT NULL,
  `senha_usuario` text COLLATE utf8_unicode_ci NOT NULL,
  `photosmall` text COLLATE utf8_unicode_ci NOT NULL,
  `photobig` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`cd_cat_usuario`, `cd_func`, `nm_func`, `cargo_func`, `fone_func`, `email_func`, `login_usuario`, `senha_usuario`, `photosmall`, `photobig`) VALUES
(3, 1, 'Rolly Santos', 'Gerente', '(19)98156-0869', 'contato@rolly.com.br', '999.999.999-99', '81dc9bdb52d04dc20036dbd8313ed055', 'imagem_1358bfd7d964a96_1488967641baixa.jpg', 'imagem_1558bfd7d964abf_1488967641alta.jpg'),
(2, 4, 'Alguem', 'dono', '(11)11111-11111', 'sem', '098.510.006-04', '81dc9bdb52d04dc20036dbd8313ed055', 'imagem_1458c840a201758_1489518754baixa.jpg', 'imagem_1358c840a201766_1489518754alta.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `informativo`
--

CREATE TABLE `informativo` (
  `cd_info` int(11) NOT NULL,
  `nm_info` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email_info` varchar(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_ocorrencia`
--

CREATE TABLE `livro_ocorrencia` (
  `cd_ocorrencia` int(11) NOT NULL,
  `ocorrencia` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dt_ocorrencia` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `morador`
--

CREATE TABLE `morador` (
  `cd_cat_usuario` int(11) NOT NULL,
  `cd_morador` int(11) NOT NULL,
  `nm_morador` varchar(70) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ds_endereco` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_endereco` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ds_complemento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nm_bairro` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nm_cidade` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sg_uf` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_cep` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_morador` varchar(70) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fone_morador` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nr_celular` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `login_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `senha_usuario` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dados_atualizados` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Moradores';

--
-- Extraindo dados da tabela `morador`
--

INSERT INTO `morador` (`cd_cat_usuario`, `cd_morador`, `nm_morador`, `ds_endereco`, `nr_endereco`, `ds_complemento`, `nm_bairro`, `nm_cidade`, `sg_uf`, `nr_cep`, `email_morador`, `fone_morador`, `nr_celular`, `login_usuario`, `senha_usuario`, `dados_atualizados`) VALUES
(4, 1, 'Administrador', 'Av. Cabo Pedro Hoffman', '420', 'Bloco 11 - Unidade 1', 'Residencial Real Park', 'Sumaré', 'SP', '13178-574', 'contato@rolly.com.br', '(19)8117-2916', '(19)98156-0869', '123.456.789-09', 'fba7e9856d99f095c83ec4c8bdd6c9a3', 'S'),
(4, 2, 'Admin', '', '', '', '', '', 'AC', '', '', '', '', '111.111.111-11', '827ccb0eea8a706c4c34a16891f84e7b', 'S'),
(5, 3, 'Teste', '', '', '', '', '', 'AC', '', '', '', '', '222.222.222-22', '827ccb0eea8a706c4c34a16891f84e7b', 'S'),
(5, 4, 'Rolly', '', '', '', '', '', 'AC', '', '', '', '', '075.161.726-18', 'fba7e9856d99f095c83ec4c8bdd6c9a3', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `onibus`
--

CREATE TABLE `onibus` (
  `id_onibus` int(1) NOT NULL,
  `txt_onibus` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `onibus`
--

INSERT INTO `onibus` (`id_onibus`, `txt_onibus`) VALUES
(1, '<!-- PARA UTILIZAR, HABILITE O MODO \'<> CÓDIGO FONTE\' E INSIRA O SEGUINTE CÓDIGO, DEPOIS SÓ DESABILITAR O MODO CÓDIGO FONTE E PREENCHER--><br />\r\n<strong>HOR&Aacute;RIOS DO &Ocirc;NIBUS 651</strong><br />\r\n&nbsp;\r\n<div><strong>DIA &Uacute;TIL</strong>\r\n<div>\r\n<table class=\'table table-bordered table-striped table-condensed cf\'>\r\n	<tbody>\r\n		<tr>\r\n			<th style=\'text-align:center\'>HORAS</th>\r\n			<th style=\'text-align:center\'>00</th>\r\n			<th style=\'text-align:center\'>01</th>\r\n			<th style=\'text-align:center\'>02</th>\r\n			<th style=\'text-align:center\'>03</th>\r\n			<th style=\'text-align:center\'>04</th>\r\n			<th style=\'text-align:center\'>05</th>\r\n			<th style=\'text-align:center\'>06</th>\r\n			<th style=\'text-align:center\'>07</th>\r\n			<th style=\'text-align:center\'>08</th>\r\n			<th style=\'text-align:center\'>09</th>\r\n			<th style=\'text-align:center\'>10</th>\r\n			<th style=\'text-align:center\'>11</th>\r\n			<th style=\'text-align:center\'>12</th>\r\n			<th style=\'text-align:center\'>13</th>\r\n			<th style=\'text-align:center\'>14</th>\r\n			<th style=\'text-align:center\'>15</th>\r\n			<th style=\'text-align:center\'>16</th>\r\n			<th style=\'text-align:center\'>17</th>\r\n			<th style=\'text-align:center\'>18</th>\r\n			<th style=\'text-align:center\'>19</th>\r\n			<th style=\'text-align:center\'>20</th>\r\n			<th style=\'text-align:center\'>21</th>\r\n			<th style=\'text-align:center\'>22</th>\r\n			<th style=\'text-align:center\'>23</th>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\'6\' style=\'background-color:#ffffff; text-align:center\'>MINUTOS</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>05</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>05</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>05</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>10</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>10</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>05</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>10</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>10</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>25</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>25</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>35</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>25</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>35</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>20</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>40</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>25</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>50</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>50</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>40</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>50</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>20</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>55</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><strong>S&Aacute;BADO</strong>\r\n\r\n<div>\r\n<table class=\'table table-bordered table-condensed table-striped\'>\r\n	<tbody>\r\n		<tr>\r\n			<th style=\'text-align:center\'>HORAS</th>\r\n			<th style=\'text-align:center\'>00</th>\r\n			<th style=\'text-align:center\'>01</th>\r\n			<th style=\'text-align:center\'>02</th>\r\n			<th style=\'text-align:center\'>03</th>\r\n			<th style=\'text-align:center\'>04</th>\r\n			<th style=\'text-align:center\'>05</th>\r\n			<th style=\'text-align:center\'>06</th>\r\n			<th style=\'text-align:center\'>07</th>\r\n			<th style=\'text-align:center\'>08</th>\r\n			<th style=\'text-align:center\'>09</th>\r\n			<th style=\'text-align:center\'>10</th>\r\n			<th style=\'text-align:center\'>11</th>\r\n			<th style=\'text-align:center\'>12</th>\r\n			<th style=\'text-align:center\'>13</th>\r\n			<th style=\'text-align:center\'>14</th>\r\n			<th style=\'text-align:center\'>15</th>\r\n			<th style=\'text-align:center\'>16</th>\r\n			<th style=\'text-align:center\'>17</th>\r\n			<th style=\'text-align:center\'>18</th>\r\n			<th style=\'text-align:center\'>19</th>\r\n			<th style=\'text-align:center\'>20</th>\r\n			<th style=\'text-align:center\'>21</th>\r\n			<th style=\'text-align:center\'>22</th>\r\n			<th style=\'text-align:center\'>23</th>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\'6\' style=\'background-color:#ffffff; text-align:center\'>MINUTOS</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>05</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>05</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>05</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>10</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>10</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>05</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>10</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>10</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>25</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>25</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>35</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>25</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>35</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>20</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>40</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>25</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>50</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>50</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>40</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>50</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>20</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>55</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><strong>DOMINGO/FERIADOS</strong>\r\n\r\n<div>\r\n<table class=\'table table-bordered table-condensed table-striped\'>\r\n	<tbody>\r\n		<tr>\r\n			<th style=\'text-align:center\'>HORAS</th>\r\n			<th style=\'text-align:center\'>00</th>\r\n			<th style=\'text-align:center\'>01</th>\r\n			<th style=\'text-align:center\'>02</th>\r\n			<th style=\'text-align:center\'>03</th>\r\n			<th style=\'text-align:center\'>04</th>\r\n			<th style=\'text-align:center\'>05</th>\r\n			<th style=\'text-align:center\'>06</th>\r\n			<th style=\'text-align:center\'>07</th>\r\n			<th style=\'text-align:center\'>08</th>\r\n			<th style=\'text-align:center\'>09</th>\r\n			<th style=\'text-align:center\'>10</th>\r\n			<th style=\'text-align:center\'>11</th>\r\n			<th style=\'text-align:center\'>12</th>\r\n			<th style=\'text-align:center\'>13</th>\r\n			<th style=\'text-align:center\'>14</th>\r\n			<th style=\'text-align:center\'>15</th>\r\n			<th style=\'text-align:center\'>16</th>\r\n			<th style=\'text-align:center\'>17</th>\r\n			<th style=\'text-align:center\'>18</th>\r\n			<th style=\'text-align:center\'>19</th>\r\n			<th style=\'text-align:center\'>20</th>\r\n			<th style=\'text-align:center\'>21</th>\r\n			<th style=\'text-align:center\'>22</th>\r\n			<th style=\'text-align:center\'>23</th>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\'6\' style=\'background-color:#ffffff; text-align:center\'>MINUTOS</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>05</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>05</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>05</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>10</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>10</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>05</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>10</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>00</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>10</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>25</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>25</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>35</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>25</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>35</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>20</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>40</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>15</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>25</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>50</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>50</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>40</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>50</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>20</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>30</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>55</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>45</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n			<td style=\'background-color:#ffffff; text-align:center\'>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiros`
--

CREATE TABLE `parceiros` (
  `id_parc` int(10) UNSIGNED NOT NULL,
  `nm_parc` varchar(60) NOT NULL,
  `conteudo_parc` blob NOT NULL,
  `link_parc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestacao_contas`
--

CREATE TABLE `prestacao_contas` (
  `cd_contas` int(11) NOT NULL DEFAULT '0',
  `ds_contas` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `dt_mesano` date DEFAULT NULL,
  `arquivo` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `cd_res` int(11) NOT NULL,
  `nm_res` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `fone_res` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `celular_res` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email_res` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `status_res` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ds_res` text COLLATE utf8_unicode_ci NOT NULL,
  `dt_res` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`cd_res`, `nm_res`, `fone_res`, `celular_res`, `email_res`, `status_res`, `ds_res`, `dt_res`) VALUES
(2, 'Admin', '', '', '', 'Aguardando aprova&ccedil;&atilde;o', 'teste', '2017-03-27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reuniao`
--

CREATE TABLE `reuniao` (
  `cd_reuniao` int(11) NOT NULL,
  `titulo_reuniao` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ds_reuniao` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dt_reuniao` date NOT NULL DEFAULT '0000-00-00',
  `cd_cat_reuniao` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reuniao_categoria`
--

CREATE TABLE `reuniao_categoria` (
  `cd_cat_reuniao` int(11) NOT NULL,
  `ds_cat_reuniao` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `reuniao_categoria`
--

INSERT INTO `reuniao_categoria` (`cd_cat_reuniao`, `ds_cat_reuniao`) VALUES
(1, 'Assembléia'),
(2, 'Diretoria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slider`
--

CREATE TABLE `slider` (
  `cd_slider` int(11) NOT NULL,
  `photosmall` text COLLATE utf8_unicode_ci NOT NULL,
  `photobig` text COLLATE utf8_unicode_ci NOT NULL,
  `tit_slider` text COLLATE utf8_unicode_ci NOT NULL,
  `txt_slider` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `slider`
--

INSERT INTO `slider` (`cd_slider`, `photosmall`, `photobig`, `tit_slider`, `txt_slider`) VALUES
(1, 'imagem_1058ace4b1497c3_1487725745_50x50.jpg', 'imagem_1158ace4b1497d9_1487725745_2000x100.jpg', 'Comodidade', 'Melhor lugar para morar'),
(2, 'imagem_1358ace4c940488_1487725769_50x50.jpg', 'imagem_1258ace4c94049c_1487725769_2000x100.jpg', 'Organização', 'Aqui a prioridade é do Morador'),
(3, 'imagem_1058ace4df8d2fd_1487725791_50x50.jpg', 'imagem_1458ace4df8d30a_1487725791_2000x100.jpg', 'Localidade', 'Em um local seguro de perfeito'),
(4, 'imagem_1058ace4ef02678_1487725807_50x50.jpg', 'imagem_1458ace4ef02686_1487725807_2000x100.jpg', 'Segurança', '24 horas para você e sua família');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cd_cat_usuario` int(11) NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `nm_usuario` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `login_usuario` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `senha_usuario` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_categoria`
--

CREATE TABLE `usuario_categoria` (
  `cd_cat_usuario` int(11) NOT NULL,
  `ds_cat_usuario` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario_categoria`
--

INSERT INTO `usuario_categoria` (`cd_cat_usuario`, `ds_cat_usuario`) VALUES
(4, 'Administrador'),
(5, 'Condômino'),
(3, 'Portaria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitantes`
--

CREATE TABLE `visitantes` (
  `id_visit` int(11) NOT NULL,
  `cd_morador` varchar(300) NOT NULL,
  `nome_visit` varchar(300) NOT NULL,
  `rg_visit` varchar(600) NOT NULL,
  `cpf_visit` varchar(300) NOT NULL,
  `data_visit` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `visitantes`
--

INSERT INTO `visitantes` (`id_visit`, `cd_morador`, `nome_visit`, `rg_visit`, `cpf_visit`, `data_visit`) VALUES
(11, '1', 'Manoel Garcia', '1234555', '07516172618', '2017-03-14'),
(10, '3', 'Manoel Garcia', '1234555', '07516172618', '2017-03-14'),
(12, '4', 'Raila Santos', '1234555', '1234566', '2017-03-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`cd_agenda`);

--
-- Indexes for table `ata`
--
ALTER TABLE `ata`
  ADD PRIMARY KEY (`cd_ata`),
  ADD KEY `cd_reuniao` (`cd_reuniao`);

--
-- Indexes for table `classificados`
--
ALTER TABLE `classificados`
  ADD PRIMARY KEY (`cd_clas`);

--
-- Indexes for table `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `corpo_diretivo`
--
ALTER TABLE `corpo_diretivo`
  ADD PRIMARY KEY (`cd_corpo`);

--
-- Indexes for table `emails_teste`
--
ALTER TABLE `emails_teste`
  ADD PRIMARY KEY (`cd_info`);

--
-- Indexes for table `enquete`
--
ALTER TABLE `enquete`
  ADD PRIMARY KEY (`cd_enq`);

--
-- Indexes for table `enquete_javotou`
--
ALTER TABLE `enquete_javotou`
  ADD PRIMARY KEY (`id_enqjavotou`),
  ADD KEY `cd_enq` (`cd_enq`),
  ADD KEY `cd_morador` (`cd_morador`);

--
-- Indexes for table `enquete_voto`
--
ALTER TABLE `enquete_voto`
  ADD PRIMARY KEY (`cd_voto`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cd_func`);

--
-- Indexes for table `informativo`
--
ALTER TABLE `informativo`
  ADD PRIMARY KEY (`cd_info`);

--
-- Indexes for table `livro_ocorrencia`
--
ALTER TABLE `livro_ocorrencia`
  ADD PRIMARY KEY (`cd_ocorrencia`);

--
-- Indexes for table `morador`
--
ALTER TABLE `morador`
  ADD PRIMARY KEY (`cd_morador`),
  ADD UNIQUE KEY `login_usuario` (`login_usuario`),
  ADD KEY `cd_cat_usuario` (`cd_cat_usuario`);

--
-- Indexes for table `onibus`
--
ALTER TABLE `onibus`
  ADD PRIMARY KEY (`id_onibus`);

--
-- Indexes for table `parceiros`
--
ALTER TABLE `parceiros`
  ADD PRIMARY KEY (`id_parc`);

--
-- Indexes for table `prestacao_contas`
--
ALTER TABLE `prestacao_contas`
  ADD PRIMARY KEY (`cd_contas`);

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`cd_res`);

--
-- Indexes for table `reuniao`
--
ALTER TABLE `reuniao`
  ADD PRIMARY KEY (`cd_reuniao`);

--
-- Indexes for table `reuniao_categoria`
--
ALTER TABLE `reuniao_categoria`
  ADD PRIMARY KEY (`cd_cat_reuniao`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`cd_slider`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cd_usuario`);

--
-- Indexes for table `usuario_categoria`
--
ALTER TABLE `usuario_categoria`
  ADD PRIMARY KEY (`cd_cat_usuario`);

--
-- Indexes for table `visitantes`
--
ALTER TABLE `visitantes`
  ADD PRIMARY KEY (`id_visit`),
  ADD KEY `cd_morador` (`cd_morador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `cd_agenda` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classificados`
--
ALTER TABLE `classificados`
  MODIFY `cd_clas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `corpo_diretivo`
--
ALTER TABLE `corpo_diretivo`
  MODIFY `cd_corpo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emails_teste`
--
ALTER TABLE `emails_teste`
  MODIFY `cd_info` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enquete`
--
ALTER TABLE `enquete`
  MODIFY `cd_enq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `enquete_javotou`
--
ALTER TABLE `enquete_javotou`
  MODIFY `id_enqjavotou` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enquete_voto`
--
ALTER TABLE `enquete_voto`
  MODIFY `cd_voto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `cd_func` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `informativo`
--
ALTER TABLE `informativo`
  MODIFY `cd_info` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `livro_ocorrencia`
--
ALTER TABLE `livro_ocorrencia`
  MODIFY `cd_ocorrencia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `morador`
--
ALTER TABLE `morador`
  MODIFY `cd_morador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `onibus`
--
ALTER TABLE `onibus`
  MODIFY `id_onibus` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parceiros`
--
ALTER TABLE `parceiros`
  MODIFY `id_parc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas`
  MODIFY `cd_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reuniao`
--
ALTER TABLE `reuniao`
  MODIFY `cd_reuniao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reuniao_categoria`
--
ALTER TABLE `reuniao_categoria`
  MODIFY `cd_cat_reuniao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `cd_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario_categoria`
--
ALTER TABLE `usuario_categoria`
  MODIFY `cd_cat_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `visitantes`
--
ALTER TABLE `visitantes`
  MODIFY `id_visit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
