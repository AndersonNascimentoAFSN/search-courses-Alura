<?php

namespace Alura\SearchEngineCourses;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class SearchEngine
{
    private $httpClient;
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function search(string $url): array
    {
        $response = $this->httpClient->request('GET', $url);
        $html = $response->getBody();
        $this->crawler->addHtmlContent($html);

        $elementCourses = $this->crawler->filter('span.card-curso__nome');

        $courses = [];

        foreach ($elementCourses as $elementCourse) {
            array_push($courses, $elementCourse->textContent);
        }

        return $courses;
    }
}
