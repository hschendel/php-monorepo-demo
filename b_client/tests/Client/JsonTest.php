<?php declare(strict_types=1);


use BClient\Client\Json;
use BClient\Entity\Offer;
use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
{
    public function testOffers() {
        $json = new Json();
        $offers = [
            new Offer(1, 100, "A"),
            new Offer(2, 200, "B")
        ];
        $offersJson = $json->serialize($offers);
        $offersRead = $json->deserializeOffers($offersJson);
        $this->assertIsArray($offersRead);
        $this->assertEquals(2, count($offersRead));
        $this->assertInstanceOf(Offer::class, $offersRead[0]);
        $this->assertInstanceOf(Offer::class, $offersRead[1]);
        $this->assertEquals('A', $offersRead[0]->name);
        $this->assertEquals(1, $offersRead[0]->id);
        $this->assertEquals(100, $offersRead[0]->price);
        $this->assertEquals('B', $offersRead[1]->name);
        $this->assertEquals(2, $offersRead[1]->id);
        $this->assertEquals(200, $offersRead[1]->price);
    }
}
