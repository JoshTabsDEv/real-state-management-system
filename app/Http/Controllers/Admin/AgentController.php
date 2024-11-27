<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AgentApplication;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index(){
        $agents = AgentApplication::all();

        return view('agent.index', compact('agents'));
    }

    public function showForm(){
        return view("agent.create");
    }
    public function applyToBecomeAgent(Request $request)
    {
        $request->validate([
            'agency_name' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|max:255',
            'experience' => 'nullable|string',
        ]);
    
        // Assuming the user is already authenticated
        $user = auth()->user();
    
        // Create a new agent application record
        $agentApplication = AgentApplication::create([
            'user_id' => $user->id,
            'agency_name' => $request->input('agency_name'),
            'license_number' => $request->input('license_number'),
            'experience' => $request->input('experience'),
            'is_approved' => false, // Default to not approved
        ]);
    
        return redirect()->back()->with('success','Approval Pending');
    }

    public function showAllApplications()
    {
        // Ensure the current user is an admin
        // $this->authorize('viewAny', AgentApplication::class);

        // Retrieve all pending agent applications for review
        $applications = AgentApplication::where('is_approved', false)->get();

        return view('admin.agent-applications.index', compact('applications'));
    }

    public function approveApplication($applicationId)
    {
        // Ensure the current user is an admin
        // $this->authorize('approve', AgentApplication::class);

        $application = AgentApplication::findOrFail($applicationId);
        $application->is_approved = true;
        $application->save();

        // Assign the 'agent' role to the user
        $user = $application->user;
        $user->role = 'agent';
        $user->save();
        $user->assignRole('agent');

        // Optional: Send a notification or email to the user

        return redirect()->route('admin.agent.applications')->with('message', 'Agent application approved successfully.');
    }

    public function rejectApplication($applicationId)
    {
        // Ensure the current user is an admin
        // $this->authorize('approve', AgentApplication::class);

        $application = AgentApplication::findOrFail($applicationId);
        $application->is_approved = false;
        $application->save();

        // Optional: Send a rejection notification or email to the user

        return redirect()->route('admin.agent.applications')->with('message', 'Agent application rejected.');
    }

}
