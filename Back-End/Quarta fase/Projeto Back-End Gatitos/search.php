<?php

// Remove a SSL pro php funcionar no velhaco do EasyPHP
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

//API dos gatitos
$url = "https://api.thecatapi.com/v1/images/search";

//Requisição para a API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 

//Executa a requisição
$apiResponse = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

//Checa se a conexão com a API deu certo
if ($httpcode == 200 && $apiResponse !== false) {
    $data = json_decode($apiResponse, true);

    if (is_array($data) && count($data) > 0 && isset($data[0]["url"])) {
        echo json_encode(array("url" => $data[0]["url"]));
        exit;
    }
}

// Tratamento de erros
echo json_encode(array("error" => "Nenhum gatito encontrado!"));
?>