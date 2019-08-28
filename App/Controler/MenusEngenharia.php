<?php

$url_guia = filter_input(INPUT_GET, 'guia', FILTER_VALIDATE_INT);

$subMenusRioVermelho	=  array(
							array(
								'nome'=>'Lab 10 Rio Vermelho',
								'link'=> '?guia='.$url_guia.'&lab=1&id=1'
							),
							array(
								'nome'=>'Lab 15 Rio Vermelho',
								'link'=> '?guia='.$url_guia.'&lab=2&id=1'
							),
							array(
								'nome'=>'Lab 114 Rio Vermelho',
								'link'=> '?guia='.$url_guia.'&lab=3&id=1'
							)
						);

$subMenusFedera 		= 	array(
								array(
									'nome'=>'Lab 10 Federação',
									'link'=> '?guia='.$url_guia.'&lab=1&id=1'
								),
								array(
									'nome'=>'Lab 15 Federação',
									'link'=> '?guia='.$url_guia.'&lab=2&id=1'
								),
								array(
									'nome'=>'Lab 114 Federação',
									'link'=> '?guia='.$url_guia.'&lab=3&id=1'
								)
							);

 $subMenusFeiraSantana = 	array(
								array(
									'nome'=>'Lab 10 Feira de Santana',
									'link'=> '?guia='.$url_guia.'&lab=1&id=1'
								),
								array(
									'nome'=>'Lab 15 Feira de Santana',
									'link'=> '?guia='.$url_guia.'&lab=2&id=1'
								),
								array(
									'nome'=>'Lab 114 Feira de Santana',
									'link'=> '?guia='.$url_guia.'&lab=3&id=1'
								)
							);