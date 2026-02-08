<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController; // <-- PENTING: Ini sumber fitur middleware

class Controller extends BaseController // <-- PENTING: Harus extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}