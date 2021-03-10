<?php


namespace BClient\Client;


use Symfony\Contracts\HttpClient\HttpClientInterface;

class BClient
{
    private $httpClient;
    private $baseURL;
    private $json;

    public function __construct(HttpClientInterface $httpClient, string $baseURL) {
        $this->httpClient = $httpClient;
        $this->baseURL = $baseURL;
        $this->json = new Json();
    }

    public function offers(): array {
        // TODO error handling
        $url = sprintf("%s/offers", $this->baseURL);
        $resp = $this->httpClient->request('GET', $url);
        return $this->json->deserializeOffers($resp->getContent());
    }
}