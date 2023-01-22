<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class RestPasswordController extends Controller
{
    use ResetsPasswords;

  
    protected $redirectTo = RouteServiceProvider::HOME;
}
