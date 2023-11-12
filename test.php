<?php 

require_once(__DIR__ . "/vendor/autoload.php");

use Roul\Purl\Http\Client;

$client = new Client();

$options = [
    "request-body"=>json_encode([
        "quote"=>"Daawg",
        "author"=>"bruh"
    ])
];

$request = $client->get("http://localhost/quotes/all",[],$options);

print_r($request->getBody());

