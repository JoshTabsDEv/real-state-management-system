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

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            // 'description' => 'required|string',
            // 'price' => 'required|numeric|min:0',
            // 'address' => 'required|string',
            'type' => 'required|in:house,apartment,land,commercial',
            'status' => 'required|in:available,sold,rented',
            // 'bedrooms' => 'required|integer|min:0',
            // 'bathrooms' => 'required|integer|min:0',
            // 'size' => 'required|numeric|min:0',
            // 'owner_id' => 'required|exists:users,id',
            // 'agent_id' => 'required|exists:users,id',
            'images.*' => 'image|mimes:jpeg,png,jpg|'
        ];
    }
}