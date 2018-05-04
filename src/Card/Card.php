<?php

namespace CreditCard\Card;

class Card implements CardInterface
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $holderName;

    /**
     * @var string
     */
    private $cvv;

    private $brand;

    private $expirationDate;

    private $validation;

    public function __construct($number, $holderName, $cvv)
    {
        $this->cvv = $cvv;
        $this->number = $number;
        $this->holderName = $holderName;
    }

    public function getCvv()
    {
        return $this->cvv;
    }

    public function getCardNumber()
    {
        return $this->number;
    }

    public function getHolderName()
    {
        return $this->holderName;
    }

    public function getFirstDigits()
    {
        return substr($this->number, 0, 6);
    }

    public function getLastDigits()
    {
        return substr($this->number, 6);
    }

    public function isValid()
    {
        $this->validation->validate($this);
    }
}