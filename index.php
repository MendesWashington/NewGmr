<?php

	require_once '/Lib/vendor/autoload.php';
	require_once '/App/Controler/Agendas.php';
	require_once '/App/Controler/MenusEngenharia.php';

	#Verifica se o arquivo a ser carregado existe
	$loader 	= new Twig_Loader_Filesystem('App/Resouces');
	$twig 		= new Twig_Environment($loader);
	
	$template 	=  $twig->loadTemplate('engenharia.html');
	
	$url_guia = filter_input(INPUT_GET, 'guia', FILTER_VALIDATE_INT);
	$url_lab  = filter_input(INPUT_GET, 'lab');
	$url_id   = filter_input(INPUT_GET, 'id');

	$replaces = array();
	$replaces['titulo'] = 'Aprendendo Twig';
	$replaces['footer']  = 'Washington Santos - 2018';
	#Adiciona os botões superior
	$replaces["menus"] = array(
		array(
			'nome'=>'Campus Rio Vermelho',
			'link'=> '?guia=1'
		),
		array(
			'nome'=>'Campus Federação',
			'link'=> '?guia=2'
		),
		array(
			'nome'=>'Campus F. Santana',
			'link'=> '?guia=3'
		),
		array(
			'nome'=>'Campus Prof. Barros',
			'link'=> '?guia=4'
		),
		array(
			'nome'=>'Tour 360',
			'link'=> '?guia=5'
		),
		array(
			'nome'=>'Trabalhe conosco',
			'link'=> '?guia=6'
		)
	);

	if($url_guia <= 3 and $url_lab != ''){
		#Adiciona o menu lateral
		$replaces['menusLateral'] = array(
			array(
				'nome'=>'Agenda',
				'link'=>'?guia='.$url_guia.'&lab='.$url_lab.'&id=1'
			),
			array(
				'nome'=>'Galeria',
				'link'=>'?guia='.$url_guia.'&lab='.$url_lab.'&id=2'
			),array(
				'nome'=>'Caderno de Regulamento do Laboratório',
				'link'=>'?guia='.$url_guia.'&lab='.$url_lab.'&id=3'
			),
			array(
				'nome'=>'Solicitação de Reserva',
				'link'=>'?guia='.$url_guia.'&lab='.$url_lab.'&id=4'
			),
			array(
				'nome'=>'Roteiros de Práticas',
				'link'=>'?guia='.$url_guia.'&lab='.$url_lab.'&id=5'
			),
			array(
				'nome'=>'Acompanhamento Interno',
				'link'=>'?guia='.$url_guia.'&lab='.$url_lab.'&id=6'
			),
			array(
				'nome'=>'Gráficos',
				'link'=>'?guia='.$url_guia.'&lab='.$url_lab.'&id=7'
			),
			array(
				'nome'=>'Voltar',
				'link'=>'?guia='.$url_guia
			)

		);	
	}

	if($url_id == NULL):
	switch ($url_guia) {
		case 1:
			#Botões responsaveis pelo sub menu das engenharias
			//Menu interno

			$replaces['subMenus'] =  $subMenusRioVermelho;
			break;
		case 2:
			$replaces['subMenus'] = $subMenusFedera;
			break;
		case 3:
			$replaces['subMenus'] = $subMenusFeiraSantana;
			break;
		
		default:
			//echo "Pagina não encontrada";
			break;
	}
	endif;

	switch ($url_id) {
		case 1:
			if($url_guia  == 1){
				$replaces['agendas'] = $agendasRioVermelho[$url_lab-1];	
				$replaces['lab'] 	 = $subMenusRioVermelho[$url_lab-1]['nome'];
			}else if($url_guia  == 2){
				$replaces['agendas'] = $agendasFederacao[$url_lab-1];	
				$replaces['lab'] 	 = $subMenusFedera[$url_lab-1]['nome'];
			}else if($url_guia  == 3){
				$replaces['agendas'] = $agendasFeiraSantana[$url_lab-1];	
				$replaces['lab'] 	 = $subMenusFeiraSantana[$url_lab-1]['nome'];
			}
			break;
		
		default:
			# code...
			break;
	}

	#Debugando o código
	//var_dump($url_id);
	//var_dump($url_lab);
	echo "<pre>";
	//var_dump($replaces);
	//var_dump($subMenusRioVermelho);
	echo "</pre>";

	$content = $template->render($replaces);
	echo $content;
	