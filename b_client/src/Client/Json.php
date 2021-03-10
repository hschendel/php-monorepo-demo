<?php


namespace BClient\Client;


use BClient\Entity\Offer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Json
{
    private $serializer;

    public function __construct()
    {
        $this->serializer = new Serializer([new ObjectNormalizer(), new ArrayDenormalizer()], [new JsonEncoder()]);
    }

    public function deserializeOffers(string $content) : array {
        return $this->serializer->deserialize($content, Offer::class . '[]', 'json');
    }

    public function serialize($data) {
        return $this->serializer->serialize($data, 'json');
    }
}