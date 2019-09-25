<?php


namespace Example\Validators;


class IndexValidator
{
    public static function validateStuff($data)
    {
        if (isset($data['name']) && !empty($data['name'])) {  //if it exists with empty string, it is empty but isset.
            return true;
        } else {
            return false;
        }
    }
}