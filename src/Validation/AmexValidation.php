<?php

namespace CreditCard\Validation;

use CreditCard\Card\CardInterface;

class AmexValidation implements BrandValidationInterface
{
    private $brand = 'amex';
    private $cardNumberRegex = '/^(34|37)[0-9]{13}$/';
    private $cvvRegex = '/\d{4}/';

    public function getBrand()
    {
        return $this->brand;
    }

    public function validate(CardInterface $card)
    {
        $cardNumberValidation = $this->validateCardNumber($card->getCardNumber());
        $cardCvvValidation = $this->validateCardCvv($card->getCvv());

        return $cardNumberValidation && $cardCvvValidation;
    }

    private function validateCardNumber($number)
    {
        return preg_match($this->cardNumberRegex, $number);
    }

    private function validateCardCvv($number)
    {
        return preg_match($this->cvvRegex, $number);
    }
}