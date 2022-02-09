<?php

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

require_once 'vendor/autoload.php';

$client = new Client();
$response = $client->request('GET', 'http://alura.com.br/cursos-online-programacao/php');

$html = $response->getBody();


$crawler = new Crawler();

$crawler->addHtmlContent($html);

$cursos = $crawler->filter('span.card-curso__nome');

foreach ($cursos as $curso) {
  echo $curso->textContent . PHP_EOL;
}
