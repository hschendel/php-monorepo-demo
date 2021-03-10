<?php


namespace App\Controller;


use BClient\Client\Json;
use BClient\Entity\Offer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private $json;

    private $offers;

    public function __construct()
    {
        // TODO use auto wiring or whatnot
        $this->json = new Json();
        $this->offers = [
            new Offer(1, 100, "A"),
            new Offer(2, 200, "B")
        ];
    }

    /**
     * @Route("/offers", methods={"GET"})
     * @return Response
     */
    public function offers(): Response {
        return new Response($this->json->serialize($this->offers), 200, ['Content-Type' => 'application/json']);
    }
}