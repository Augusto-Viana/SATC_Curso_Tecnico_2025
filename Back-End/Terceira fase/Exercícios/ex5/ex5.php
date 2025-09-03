<?php

$valor = $_POST['valor'];

$calculo = $valor * 1.25;
$resultado = $calculo * 1.35;

echo "O valor com imposto é de: ".number_format($resultado,2,",",".");

?>