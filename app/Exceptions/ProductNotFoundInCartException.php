<?php

namespace App\Exceptions;

use Exception;

class ProductNotFoundInCartException extends Exception
{
    protected $message = 'Product not found in cart';
}
