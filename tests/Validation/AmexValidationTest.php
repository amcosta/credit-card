<?php

namespace CreditCard\Test\Validation;

use CreditCard\Card\CardInterface;
use CreditCard\Validation\AmexValidation;
use PHPUnit\Framework\TestCase;

class AmexValidationTest extends TestCase
{
    /**
     * @dataProvider providerTestValidCardNumbers
     * @param $cardNumber
     * @param $cvv
     */
    public function testValidCardNumbers($cardNumber, $cvv)
    {
        $card = $this->mockCard($cardNumber, $cvv);

        $validation = new AmexValidation();

        $this->assertEquals('amex', $validation->getBrand());
        $this->assertTrue($validation->validate($card));
    }

    public function providerTestValidCardNumbers()
    {
        return [
            ['340866736123764', '4467'],
            ['342499935522558', '9941'],
            ['342807006763135', '9264'],
            ['376297447440098', '9180'],
            ['343486766476045', '3825']
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

        $validation = new AmexValidation();

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