<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index1(){
        
        return view("admin.dashboard");
    }
    public function index(){
        $appointment = Appointment::where('id',auth()->user()->id)
                                    ->with('owner')
                                    ->first();
        $stats = [
            'total_users' => User::count(),
            'total_properties' => Property::count(),
            // 'total_agents' => User::where('role', User::ROLE_AGENT)->count(),
            'total_appointments' => Appointment::count(),
            'recent_properties' => Property::latest()->take(5)->get(),
            'recent_users' => User::latest()->take(5)->get(),
            'pending_appointments' => Appointment::where('status', 'pending')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
