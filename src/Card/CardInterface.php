<?php

namespace CreditCard\Card;

interface CardInterface
{
    public function getCvv();

    public function getCardNumber();

    public function getHolderName();
}