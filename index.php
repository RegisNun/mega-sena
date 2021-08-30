<?php

include 'RegrasSorteio.php';
$sorteio = new RegrasSorteio();

//Quanidade de Jogos que sera feito
$sorteio->setTotalJogos(100);
$sorteio->setQuantidadeDezenas(6);
$sorteio->geraJogos();

//Numero que se acertar vale o premio
$sorteio->sorteio();

//Mostra os jogos que foram feito e a quantidade de acerto.
// $sorteio->confereJogo();

?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Teste Monetizze</h2>
        <?php echo $sorteio->confereJogo(); ?>
    </div>
</body>

</html>