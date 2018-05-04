<?php

namespace CreditCard\Validation;

class BrandValidatorFactory
{
    static private $validations = [];

    public function __construct()
    {
        $validations = [
            new EloValidation(),
        ];

        self::$validations = $validations;
    }

    static public function create()
    {
        $validator = new BrandValidator();

        foreach (self::$validations as $validation) {
            $validator->addValidation($validation);
        }

        return $validator;
    }
}