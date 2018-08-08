<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 07/08/2018
 * Time: 11.42
 */

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    public function report()
    {

    }

    public function render($request)
    {
        return response()->json([
            'status' => false,
            'message' => $this->getMessage(),
            'data' => []
        ], $this->getCode());
    }
}