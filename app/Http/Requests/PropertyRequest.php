<?php
// app/Http/Requests/PropertyRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    // dionar
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'required|string|max:255',
            'type' => 'required|in:house,apartment,land,commercial',
            'status' => 'required|in:available,sold,rented',
            'bedroom' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'size' => 'required|numeric|min:0',
            // 'is_published' => 'string',
            'owner_id' => 'required|exists:users,id',
            'agent_id' => 'string',
            'images.*' => 'image|mimes:jpeg,png,jpg|'
        ];
    }
}