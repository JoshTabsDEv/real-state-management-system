<?php

namespace App\Livewire;


use App\Models\Appointment;
use App\Models\Property;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ScheduleAppointment extends Component
{
    public $id;
    public Property $property;
    public Appointment $appointment;
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

    public $preferred_date;
    public $agent_id;

    public function mount()
{
    $this->appointment = new Appointment();
}

    
    public function setAppointment()
    {
        // Validate the inputs
        $this->validate([
            'preferred_date' => 'required|date',
            'agent_id' => 'required|exists:users,id', // Adjust as necessary
        ]);

        // Logic to save the appointment, e.g., create a new Appointment model
        $this->appointment::create([
            'client_id' => Auth::id(),
            'property_id' => $this->id,
            'date' => $this->preferred_date,
            'agent_id' => $this->agent_id,
        ]);

        // Optionally reset the form or emit an event
        session()->flash('message', 'Appointment subject for approval by the Agent!');
    }

    public function render()
    {
        // dd(Auth::user());
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
            $this->agent_id = $property->agent_id;
        }
        return view('livewire.schedule-appointment')->layout('layouts.app');
    }
}
