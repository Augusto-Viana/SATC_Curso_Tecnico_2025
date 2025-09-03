<?php

$nome = $_POST['nome'];
$venda = $_POST['venda'];
$valor = $_POST['valor'];

$valorDaVenda = $venda * 0.05;
$resultado = $valor + $valorDaVenda;

echo "O valor do salário é de: ".number_format($resultado,2,",",".");

?>