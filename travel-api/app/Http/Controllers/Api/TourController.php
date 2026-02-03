<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $query = Tour::query();

        if ($request->has('destination_id')) {
            $query->where('destination_id', $request->destination_id);
        }

        return response()->json($query->get());
    }
}
