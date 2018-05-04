<?php

namespace CreditCard\Validation;

use CreditCard\Card\CardInterface;

class EloValidation implements BrandValidationInterface
{
    private $brand = 'elo';
    private $cardNumberRegex = '/^[(636368|636369|438935|504175|451416|636297|5067|4576|4011|506699)]{13,16}$/';
    private $cvvRegex = '/\d{3}/';

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