<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function list()
    {
        $data = Countries::all();

        return $data;
    }
}
