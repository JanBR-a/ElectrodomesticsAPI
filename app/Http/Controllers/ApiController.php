<?php

namespace App\Http\Controllers;

use App\Models\Electrodomestic;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $electrodomestic = Electrodomestic::all();
        return response()->json($electrodomestic);
    }
}
