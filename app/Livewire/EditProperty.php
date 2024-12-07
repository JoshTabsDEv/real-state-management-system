<?php

namespace App\Livewire;

use App\Models\Property;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class EditProperty extends Component
{
    use WithFileUploads;
    public Property $property;
    public $id;
    public $title;
    public $type;
    public $price;
    public $bedroom;
    public $bathrooms;
    public $size;
    public $city;
    public $street;
    public $state;
    public $country;
    public $postal_code;
    public $status;
    public $images = [];

    protected $rules = [
        'title' => 'required|string|max:255',
        'type' => 'required|in:house,apartment,land,commercial',
        'price' => 'required|numeric',
        'bedroom' => 'required|integer',
        'bathrooms' => 'required|integer',
        'size' => 'required|numeric',
        'city' => 'required|string',
        'state' => 'required|string',
        'street' => 'required|string',
        'postal_code' => 'required|integer',
        'country' => 'required|string',
        'status' => 'required|in:available,pending,sold',
        'images.*' => 'image|max:10240'
    ];





    public function mount()
    {
   
    }

    public function updateProperty()
    {
        $validatedData = $this->validate();

        

        $this->property->update($validatedData);
        $this->property = $this->property->fresh();
        

        if ($this->images) {
            foreach ($this->images as $image) {
                $path = $image->store('property-images', 'public');
                $this->property->images()->create(['path' => $path]);
            }
        }

        
     
        return redirect()->route('admin.property.index')->with('success','Data saved successfully');
    }

    public function render()
    {

     
        $property = Property::findorFail($this->id);
        // dd($property);

    if ($property) {
        $this->property = $property;
        $this->title = $property->title;
        $this->type = $property->type;
        $this->price = $property->price;
        $this->bedroom = $property->bedroom;
        $this->bathrooms = $property->bathrooms;
        $this->size = $property->size;
        $this->city = $property->city;
        $this->state = $property->state;
        $this->street = $property->street;
        $this->country = $property->country;
        $this->status = $property->status;
        $this->postal_code = $property->postal_code;
    }
        return view('livewire.edit-property', [
            'property' => $property])->layout('layouts.app');
    
    }
}