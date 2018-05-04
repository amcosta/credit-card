<?php

namespace CreditCard\Validation;

use CreditCard\Card\CardInterface;

interface BrandValidationInterface
{
    /**
     * Return the brand name if validation is true
     *
     * @return string
     */
    public function getBrand();

    /**
     * @param CardInterface $card
     * @return bool
     */
    public function validate(CardInterface $card);
}