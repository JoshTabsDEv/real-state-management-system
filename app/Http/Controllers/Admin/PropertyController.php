<?php
// app/Http/Controllers/Admin/PropertyController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use App\Http\Requests\PropertyRequest;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with(['agent', 'owner'])
            ->latest()
            ->paginate(10);

        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        $agents = User::where('role', 'agent')->pluck('name', 'id');
        $owners = User::where('role', 'owner')->pluck('name', 'id');
        
        return view('admin.properties.create', compact('agents', 'owners'));
    }

    public function store(PropertyRequest $request)
    {
        $property = Property::create($request->validated());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('properties', 'public');
                $property->images()->create([
                    'image_path' => $path
                ]);
            }
        }

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Property created successfully.');
    }

    public function edit(Property $property)
    {
        $agents = User::where('role', 'agent')->pluck('name', 'id');
        $owners = User::where('role', 'owner')->pluck('name', 'id');
        
        return view('admin.properties.edit', compact('property', 'agents', 'owners'));
    }

    public function update(PropertyRequest $request, Property $property)
    {
        $property->update($request->validated());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('properties', 'public');
                $property->images()->create([
                    'image_path' => $path
                ]);
            }
        }

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        // Delete associated images from storage
        foreach ($property->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $property->delete();

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Property deleted successfully.');
    }
}