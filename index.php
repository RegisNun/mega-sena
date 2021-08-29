<?php
	
include 'RegrasSorteio.php';	
$sorteio = new RegrasSorteio();

//Quanidade de Jogos que sera feito
$sorteio->setTotalJogos(3000);
$sorteio->setQuantidadeDezenas(10);
$sorteio->geraJogos();

//Numero que se acertar vale o premio
$sorteio->sorteio();

//Mostra os jogos que foram feito e a quantidade de acerto.
$sorteio->confereJogo();

	
	
	

