<?php


namespace BClient\Client;


use Symfony\Contracts\HttpClient\HttpClientInterface;

class BClient
{
    private $httpClient;
    private $baseURL;

    public function __construct(HttpClientInterface $httpClient, string $baseURL) {
        $this->httpClient = $httpClient;
        $this->baseURL = $baseURL;
    }

    public function offers(): array {
        // TODO error handling
        $url = sprintf("%s/offers", $this->baseURL);
        $resp = $this->httpClient->request('GET', $url);

    }
}