<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
    $request->validate([
        'full_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'destination' => 'required',
        'number_of_travelers' => 'required|integer',
        'terms_agreed' => 'required|boolean'
    ]);

    $enquiry = Enquiry::create($request->all());

    return response()->json([
        'success' => true,
        'message' => 'Enquiry submitted successfully',
        'data' => [
            'enquiry_id' => $enquiry->id,
            'redirect_url' => '/thank-you'
        ]
    ]);
    }
}
