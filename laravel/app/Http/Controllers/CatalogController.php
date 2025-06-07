<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function get(Request $request): View
    {
        return view('catalog.get');
    }
}
