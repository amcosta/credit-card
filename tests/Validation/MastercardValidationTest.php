<?php

namespace CreditCard\Test\Validation;

use CreditCard\Card\CardInterface;
use CreditCard\Validation\MastercardValidation;
use PHPUnit\Framework\TestCase;

class MastercardValidationTest extends TestCase
{
    /**
     * @dataProvider providerTestValidCardNumbers
     * @param $cardNumber
     * @param $cvv
     */
    public function testValidCardNumbers($cardNumber, $cvv)
    {
        $card = $this->mockCard($cardNumber, $cvv);

        $validation = new MastercardValidation();

        $this->assertEquals('amex', $validation->getBrand());
        $this->assertTrue($validation->validate($card));
    }

    public function providerTestValidCardNumbers()
    {
        return [
            ['5242483548900294', '417'],
            ['5515097062430643', '924'],
            ['5424704807875640', '250'],
            ['5179177130660210', '473'],
            ['5208355394472127', '750'],
            ['5356324564125444', '625'],
            ['5164899439986106', '742'],
            ['5453587152377724', '147'],
            ['5562751622612338', '360'],
            ['5501739411258904', '849']
        ];
    }

    /**
     * @dataProvider providerTestInvalidCardNumbers
     * @param $cardNumber
     * @param $cvv
     */
    public function testInvalidCardNumbers($cardNumber, $cvv)
    {
        $card = $this->mockCard($cardNumber, $cvv);

        $validation = new MastercardValidation();

        $this->assertEquals('amex', $validation->getBrand());
        $this->assertFalse($validation->validate($card));
    }

    public function providerTestInvalidCardNumbers()
    {
        return [
            ['5041759330456626', '995']
        ];
    }

    private function mockCard($cardNumber, $cvv)
    {
        $card = $this->createMock(CardInterface::class);

        $card->method('getCardNumber')->willReturn($cardNumber);
        $card->method('getCvv')->willReturn($cvv);

        return $card;
    }
}