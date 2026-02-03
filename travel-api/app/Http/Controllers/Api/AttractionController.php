<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attraction;

class AttractionController extends Controller
{
    public function index()
    {
        return response()->json(Attraction::all());
    }
}
