<?php

namespace CreditCard\Test\Validation;

use CreditCard\Card\CardInterface;
use CreditCard\Validation\EloValidation;
use PHPUnit\Framework\TestCase;

class EloValidationTest extends TestCase
{
    /**
     * @dataProvider providerTestValidCardNumbers
     * @param $cardNumber
     * @param $cvv
     */
    public function testValidCardNumbers($cardNumber, $cvv)
    {
        $card = $this->mockCard($cardNumber, $cvv);

        $validation = new EloValidation();

        $this->assertEquals('elo', $validation->getBrand());
        $this->assertTrue($validation->validate($card));
    }

    public function providerTestValidCardNumbers()
    {
        return [
            ['5041759330456626', '995'],
            ['4514162561405001', '518'],
            ['6362970472406456', '298'],
            ['6363680249933190', '790'],
            ['4514169401098896', '416'],
            ['5041757681202458', '656'],
            ['6363683955848255', '841'],
            ['6362975864137809', '886'],
            ['5041756262491951', '278'],
            ['6363684439204180', '220']
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