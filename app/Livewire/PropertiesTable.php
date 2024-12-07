<?php

namespace App\Livewire;

use App\Models\AgentApplication;
use App\Models\Property;
use Livewire\Component;
use Livewire\WithPagination;

class PropertiesTable extends Component
{
    use WithPagination;
    public Property $property;
    public $title;
    public $type;
    public $price;
    public $bedroom;
    public $bathrooms;
    public $size;
    public $city;
    public $state;
    public $country;
    public $status;
    public $images = [];
    public $isModalOpen = true;

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

    public $selectedType = '';

    protected $queryString = [
        'selectedType' => ['except' => '']
    ];
    public function mount(Property $property)
    {
        
    }
    
    public function setEdit(Property $property){
        
        $this->property = $property;
        $this->title = $property->title;
        $this->type = $property->type;
        $this->price = $property->price;
        $this->bedroom = $property->bedrooms;
        $this->bathrooms = $property->bathrooms;
        $this->size = $property->size;
        $this->city = $property->city;
        $this->state = $property->state;
        $this->country = $property->country;
        $this->status = $property->status;

        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }
    
    public function updateProperty()
    {
        $validatedData = $this->validate();

        $this->property->update([
            'title' => $this->title,
            'type' => $this->type,
            'price' => $this->price,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'size' => $this->size,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'status' => $this->status,
        ]);

        if ($this->images) {
            foreach ($this->images as $image) {
                $path = $image->store('property-images', 'public');
                $this->property->images()->create(['path' => $path]);
            }
        }

        // session()->flash('success', 'Property updated successfully.');
        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');;
    }
    public function updatedSelectedType()
    {
        $this->resetPage();
    }

    public function deleteProperty($propertyId)
    {
        $property = Property::find($propertyId);
        if ($property) {
            $property->delete();
        }
    }

    public function render()
    {
        $query = Property::query();
        $agent = AgentApplication::all();

        if ($this->selectedType) {
            $query->where('type', $this->selectedType);
        }

        $properties = $query->latest()->paginate(10);
        
        return view('livewire.properties-table', [
            'properties' => $properties,
            'agents'=> $agent
        ]);
    }
}