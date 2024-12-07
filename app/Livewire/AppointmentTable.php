<?php

namespace App\Livewire;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'id'; // Default sort field
    public $sortDirection = 'asc'; // Default sort direction
    public $selectedAppointment = null;

    protected $queryString = ['search', 'perPage', 'sortField', 'sortDirection'];

    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination when searching
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function selectAppointment($appointment)
    {
        $this->selectedAppointment = $appointment;
       
    }

    public function render()
    {
        $appointments = Appointment::with(['user', 'property']) // Eager load relationships
            ->whereHas('user', function($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('property', function($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)asdasedasdasdas
            ->paginate($this->perPage);
            //comemts

        return view('livewire.appointment-table', [
            'appointments' => $appointments,
        ])->layout('layouts.app');
    }
}