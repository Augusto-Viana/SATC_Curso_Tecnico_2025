<?php
// Headers para o PHP conseguir rodar em versões mais antigas do easyphp
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

// Array que vai ser mandado para o JS com os dados
$response = array(
    "success" => false,
    "name" => "Pokémon não encontrado",
    "id" => "",
    "type" => "",
    "description" => "",
    "image" => "https://i.ytimg.com/vi/6-Ekj41gMII/hqdefault.jpg"
);

// Checa se a variavel pokemon_name não está vazia
if(!empty($_GET["pokemon_name"])){
    $searchName = strtolower($_GET["pokemon_name"]);

    // Conecta com a API
    $url = "https://pokeapi.co/api/v2/pokemon/" . $searchName;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $apiResponse = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Checa se a conexão com a API foi um sucesso
    if($httpcode == 200){
        // Coloca os dados da API em forma de Json para o código usar
        $pokemonData = json_decode($apiResponse, true);

        // Coloca os dados do Json em variáveis
        $pokemonName = ucfirst($pokemonData['name']);
        $pokemonId = $pokemonData['id'];
        $pokemonType = ucfirst($pokemonData['types'][0]['type']['name']);
        $pokemonImage = $pokemonData['sprites']['other']['official-artwork']['front_default'];

        // Conecta com a API da descrição
        $descriptionUrl = $pokemonData['species']['url'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $descriptionUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $descriptionResponse = curl_exec($ch);
        curl_close($ch);

        // Passa por todas as linguagens das descrições, selecinando inglês
        $descriptionData = json_decode($descriptionResponse, true);
        $description = "Descrição";
        foreach($descriptionData['flavor_text_entries'] as $entry){
            if ($entry['language']['name'] == "en"){
                $description = $entry['flavor_text'];
                break;
            }
        }

        // Atualiza o array com os dados que vamos usar
        $response = array(
            "success" => true,
            "name" => $pokemonName,
            "id" => $pokemonId,
            "type" => $pokemonType,
            "description" => $description,
            "image" => $pokemonImage
        );
    }

}

// Manda os dados para o JS
echo json_encode($response);
?>