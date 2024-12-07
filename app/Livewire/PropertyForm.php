<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class PropertyForm extends Component
{
    use WithFileUploads;

    public $title, $description, $street, $city, $state, $postal_code, $country;
    public $price, $bedroom, $bathrooms, $size, $type, $status;
    public $images = [];
    public $owner_id;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'street' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'nullable|string|max:255',
        'postal_code' => 'nullable|string|max:20',
        'country' => 'required|string|max:255',
        'price' => 'required|numeric|min:1',
        'bedroom' => 'required|numeric|min:1',
        'bathrooms' => 'required|numeric|min:1',
        'size' => 'required|numeric|min:1',
        'type' => 'required|string',
        'status' => 'required|string',
        'images.*' => 'nullable|image|max:10240', // max 10MB per image
    ];

    public function mount()
    {
        $this->owner_id = Auth::user()->id; // Automatically set the logged-in user's ID
    }

    public function submit()
    {
        $this->validate();

        // Store images
        $imagePaths = [];
        if (count($this->images)) {
            foreach ($this->images as $image) {
                $imagePaths[] = $image->store('properties', 'public');
            }
        }

        // Store the property
        Property::create([
            'title' => $this->title,
            'description' => $this->description,
            'street' => $this->street,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'country' => $this->country,
            'price' => $this->price,
            'bedroom' => $this->bedroom,
            'bathrooms' => $this->bathrooms,
            'size' => $this->size,
            'type' => $this->type,
            'status' => $this->status,
            'owner_id' => $this->owner_id,
            'images' => json_encode($imagePaths), // Store image paths in a JSON format
        ]);

        // Reset the form after submission
        $this->reset();

        session()->flash('message', 'Property created successfully.');
    }

    public function render()
    {
        return view('livewire.property-form');
    }
}
