<?php
session_start();

$distancia = $_POST['distancia'];
$autonomia = $_POST['autonomia'];

$gasolina = 5.82;
$etanol = 2.51;
$diesel = 6.15;

$res_autonomia;
$res_gasolina;
$res_etanol;
$res_diesel;

$mensagem = "";


if(is_numeric($distancia) && is_numeric($autonomia)){
    if(($distancia > 0) && ($autonomia > 0)){
        $res_autonomia = ($distancia / $autonomia);

        $res_gasolina = $res_autonomia * $gasolina;
        $res_gasolina = number_format($res_gasolina,2,',','.');
        $mensagem.= "<b>Gasolina:</b> R$ ".$res_gasolina;

        $res_etanol = $res_autonomia * $etanol;
        $res_etanol = number_format($res_etanol,2,',','.');
        $mensagem.= "</br><b>Etanol:</b> R$ ".$res_etanol;

        $res_diesel = $res_autonomia * $diesel;
        $res_diesel = number_format($res_diesel,2,',','.');
        $mensagem.= "</br><b>Diesel:</b> R$ ".$res_diesel;
    }else{
        $mensagem.= "<b>ERRO:</b> Valores com preenchimento incorreto (menor ou igual a zero)</br>";
    }
}else{
    $mensagem.= "<b>ERRO:</b> Dados incorretos ou valores em branco</br>";
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
	<main class="main">
		<div class="painel">
			<h2>Resultado</h2>
			<div id="conteudoPainelCalculo">
					<b><?php echo $mensagem?></b>
			</div>
		</div>
    </main> 
</body>