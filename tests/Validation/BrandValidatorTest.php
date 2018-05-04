<?php

namespace CreditCard\Test\Validation;

use CreditCard\Card\CardInterface;
use CreditCard\Validation\BrandValidator;
use CreditCard\Validation\EloValidation;
use PHPUnit\Framework\TestCase;

class BrandValidatorTest extends TestCase
{
    public function testTrueAsserts()
    {
        $card = $this->createMock(CardInterface::class);

        $eloValidation = $this->createMock(EloValidation::class);
        $eloValidation->method('validate')->withAnyParameters()->willReturn(true);
        $eloValidation->method('getBrand')->willReturn('elo');

        $validator = new BrandValidator();
        $validator->addValidation($eloValidation);

        $this->assertTrue($validator->validate($card));
        $this->assertEquals('elo', $validator->getBrand());
    }

    public function testFalseAsserts()
    {
        $card = $this->createMock(CardInterface::class);

        $eloValidation = $this->createMock(EloValidation::class);
        $eloValidation->method('validate')->withAnyParameters()->willReturn(false);
        $eloValidation->method('getBrand')->willReturn('elo');

        $validator = new BrandValidator();
        $validator->addValidation($eloValidation);

        $this->assertFalse($validator->validate($card));
        $this->assertEquals('', $validator->getBrand());
    }
}