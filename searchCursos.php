<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Alura\SearchEngineCourses\SearchEngine;

// Teste::teste();
// showMessage('PHP é muito bom!');

$client = new Client(['base_uri' => 'http://alura.com.br']);
$crawler = new Crawler();

$search = new SearchEngine($client, $crawler);
$courses = $search->search('/cursos-online-programacao/php');

foreach ($courses as $course) {
  echo $course . PHP_EOL;
}
