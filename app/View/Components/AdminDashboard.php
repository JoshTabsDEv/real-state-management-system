<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminDashboard extends Component
{
    /**
     * Create a new component instance.
     */

     public $userCount;
     public $propertyCount;
     public $totalAppointments;
    public function __construct($userCount,$propertyCount, $totalAppointments)
    {
        //
        $this->userCount = $userCount;
        $this->propertyCount = $propertyCount;
        $this->totalAppointments = $totalAppointments;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-dashboard');
    }
}
