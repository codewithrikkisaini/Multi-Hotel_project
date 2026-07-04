<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'hotel_name' => 'required|string|max:255',
            'business_registration_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'number_of_rooms' => 'required|integer|min:1',
            'property_type' => 'required|string|max:255',
            'hotel_category' => 'required|string|max:255',
            'preferred_currency' => 'required|string|max:10',
        ];
    }
}
