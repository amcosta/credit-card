<?php

namespace CreditCard\Test\Validation;

use CreditCard\Validation\BrandValidator;
use CreditCard\Validation\BrandValidatorFactory;
use PHPUnit\Framework\TestCase;

class BrandValidatorFactoryTest extends TestCase
{
    public function testCreationOfValidator()
    {
        $validator = BrandValidatorFactory::create();

        $this->assertInstanceOf(BrandValidator::class, $validator);
    }
}