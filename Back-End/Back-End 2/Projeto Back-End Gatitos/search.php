<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

header("Content-Type: application/json");

$url = "https://api.thecatapi.com/v1/images/search";

$answer = file_get_contents($url);

$data = json_decode($answer, true);

echo json_encode(["url" => $data[0]["url"]]);

?>