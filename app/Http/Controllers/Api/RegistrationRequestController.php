<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RegistrationRequest;
use App\Http\Requests\HotelRegistrationRequest;
use Illuminate\Http\Request;

class RegistrationRequestController extends Controller
{
    public function store(HotelRegistrationRequest $request)
    {
        $registration = RegistrationRequest::create($request->validated());

        // Logic to send email to merahkie@merahkie.com
        // Mail::to('merahkie@merahkie.com')->send(new RegistrationRequestMail($registration));

        return response()->json([
            'success' => true,
            'message' => 'Registration request submitted successfully. We will contact you soon.',
            'data' => $registration
        ], 201);
    }
}
