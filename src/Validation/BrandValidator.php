<?php

namespace CreditCard\Validation;

use CreditCard\Card\CardInterface;

class BrandValidator implements BrandValidationInterface
{
    /**
     * @var array
     */
    private $validations = [];

    /**
     * @var BrandValidationInterface
     */
    private $validValidation;

    public function addValidation(BrandValidationInterface $validation)
    {
        array_push($this->validations, $validation);
    }

    public function validate(CardInterface $card)
    {
        $validation = array_filter($this->validations, function (BrandValidationInterface $brand) use ($card) {
            return $brand->validate($card);
        });

        $this->validValidation = array_shift($validation);

        return $this->validValidation instanceof BrandValidationInterface;
    }

    public function getBrand()
    {
        if ($this->validValidation instanceof BrandValidationInterface) {
            return $this->validValidation->getBrand();
        }
    }
}