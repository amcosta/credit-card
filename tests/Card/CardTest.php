<?php

namespace CreditCard\Test;

use CreditCard\Card\CardInterface;
use PHPUnit\Framework\TestCase;
use CreditCard\Card\Card;

class CardTest extends TestCase
{
    public function testVerifyInterface()
    {
        $card = new Card(null, null, null);

        $this->assertInstanceOf(CardInterface::class, $card);
    }

    public function testVerifyConstructorParams()
    {
        $card = new Card('1234123412341234', 'Fulano de Tal', '123');

        $this->assertEquals('1234123412341234', $card->getCardNumber());
        $this->assertEquals('Fulano de Tal', $card->getHolderName());
        $this->assertEquals('123', $card->getCvv());
    }

    public function testGetFirstAndLastDigitsOfCard()
    {
        $firstDigits = '123456';
        $lastDigits = '987654321';

        $cardNumber = $firstDigits . $lastDigits;

        $card = new Card($cardNumber, null, null);

        $this->assertEquals($firstDigits, $card->getFirstDigits());
        $this->assertEquals($lastDigits, $card->getLastDigits());
    }
}