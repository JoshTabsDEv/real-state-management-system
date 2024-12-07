<?php

namespace App\Livewire;

use App\Models\Property;
use Livewire\Component;
use Livewire\WithPagination;

class PropertyList extends Component
{
    use WithPagination;

    // // Filter Properties
    // public $properties; // List of properties
    public $selectedProperty; // To store the selected property details
    public $loading = false; // Loading state
    public $search = '';
    public $priceRange = '';
    public $propertyType = '';
    public $bedrooms = '';
    public $sortBy = 'newest';
    
    // Additional properties for price range values
    public $minPrice = null;
    public $maxPrice = null;

    

    // Query String Parameters
    protected $queryString = [
        'search' => ['except' => ''],
        'priceRange' => ['except' => ''],
        'propertyType' => ['except' => ''],
        'bedrooms' => ['except' => ''],
        'sortBy' => ['except' => 'newest'],
    ];

    // public function mount()
    // {
    //     // Load properties initially
    //     $this->properties = Property::all();
    // }



    public function fetchPropertyDetails($propertyId)
    {
        // $this->loading = true; // Set loading state to true

        // Simulate a delay for loading (optional)
        // sleep(1); // Remove or adjust this in production

        // Fetch the property details
        $this->selectedProperty = Property::find($propertyId);

        // $this->loading = false; // Set loading state to false
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPriceRange()
    {
        $this->handlePriceRange();
        $this->resetPage();
    }

    public function updatedPropertyType()
    {
        $this->resetPage();
    }

    public function updatedBedrooms()
    {
        $this->resetPage();
    }

    protected function handlePriceRange()
    {
        if ($this->priceRange) {
            [$min, $max] = explode('-', $this->priceRange . '+');
            $this->minPrice = (int) str_replace('+', '', $min);
            $this->maxPrice = $max !== '+' ? (int) $max : null;
        } else {
            $this->minPrice = null;
            $this->maxPrice = null;
        }
    }

    public function render()
    {
        $query = Property::query();

        // Apply search filter
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('country', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Apply price range filter
        if ($this->minPrice !== null) {
            $query->where('price', '>=', $this->minPrice);
            if ($this->maxPrice !== null) {
                $query->where('price', '<=', $this->maxPrice);
            }
        }

        // Apply property type filter
        if ($this->propertyType) {
            $query->where('type', $this->propertyType);
        }

        // Apply bedrooms filter
        if ($this->bedrooms) {
            $query->where('bedroom', '>=', $this->bedrooms);
        }

        // Apply sorting
        switch ($this->sortBy) {
            case 'price_low_high':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $query->orderBy('price', 'desc');
                break;
            case 'most_popular':
                $query->orderBy('views', 'desc');
                break;
            case 'newest':
            default:
                $query->latest();
                break;
        }

        $properties = $query->paginate(8);

        return view('livewire.property-list', [
            'properties' => $properties,
            'totalProperties' => Property::count(),
            'filterCount' => $properties->total(),
        ]);
    }

    public function resetFilters()
    {
        $this->reset([
            'search',
            'priceRange',
            'propertyType',
            'bedrooms',
            'sortBy',
            'minPrice',
            'maxPrice'
        ]);
    }
}