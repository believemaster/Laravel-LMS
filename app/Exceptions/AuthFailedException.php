<?php

namespace App\Exceptions;

use Exception;

class AuthFailedExceptions extends Exception
{
    public function render()
    {
        return response()->json([
            'message' => 'These credentials do not match our record.'
        ], 422);
    }
}
