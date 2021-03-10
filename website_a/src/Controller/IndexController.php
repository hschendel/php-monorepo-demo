<?php


namespace App\Controller;


use BClient\Client\BClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class IndexController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    private $bClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        // TODO move baseURL to env or so
        $this->bClient = new BClient($httpClient, 'http://localhost:8001');
    }

    /**
     * @Route("/", methods={"GET"})
     */
    public function index() : Response
    {
        // Call service_b
        $offers = $this->bClient->offers();

        return $this->render('index.html.twig', ['offers' => $offers]);
    }
}