<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdministrativeController extends Controller
{
    public function administrative()
    {
        return view('administrative');
    }
}