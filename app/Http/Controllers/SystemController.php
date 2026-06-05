<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $systems = System::latest()->paginate(15);
        return view('systems.index', compact('systems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('systems.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255|min:3|unique:systems',
            'description' => 'required|string|min:10',
            'url' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ], [
            'name.required' => 'Service name is required',
            'name.unique' => 'This service name already exists',
            'description.required' => 'Description is required',
            'url.required' => 'URL is required',
            'url.url' => 'Please enter a valid URL',
            'image.image' => 'File must be an image',
            'image.max' => 'Image size should not exceed 5MB',
        ]);

        $system = new System();
        $system->name = $request->input('name');
        $system->description = $request->input('description');
        $system->url = $request->input('url');

        if ($request->hasFile('image')) {
            try {
                $file = $request->file('image');
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('images', $filename, 'public');
                $system->image = $path;
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to upload image: ' . $e->getMessage());
            }
        }

        $system->save();
        
        // Get admin prefix from the request URL
        $pathParts = explode('/', url()->previous());
        $adminPrefix = $pathParts[3] ?? env('ADMIN_SECRET', 'admin-panel');
        
        return redirect('/' . $adminPrefix . '/systems')->with('success', 'Service added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(System $system)
    {
        return view('systems.show', compact('system'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sys = System::findOrFail($id);
        return view('systems.edit', ['sys' => $sys]);
    }

    /**
     * Update the specified resource in storage.
     * Changed from System $system to $id for better compatibility
     */
    public function update(Request $request, $id)
    {
        // Find the system by ID
        $system = System::findOrFail($id);
        
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255|min:3|unique:systems,name,' . $id,
            'description' => 'required|string|min:10',
            'url' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $system->name = $request->input('name');
        $system->description = $request->input('description');
        $system->url = $request->input('url');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($system->image && Storage::disk('public')->exists($system->image)) {
                Storage::disk('public')->delete($system->image);
            }

            try {
                $file = $request->file('image');
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('images', $filename, 'public');
                $system->image = $path;
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to upload image: ' . $e->getMessage());
            }
        }

        $system->save();
        
        // Get admin prefix from the request URL
        $pathParts = explode('/', url()->previous());
        $adminPrefix = $pathParts[3] ?? env('ADMIN_SECRET', 'admin-panel');
        
        return redirect('/' . $adminPrefix . '/systems')->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $system = System::findOrFail($id);
        
        // Delete image if exists
        if ($system->image && Storage::disk('public')->exists($system->image)) {
            Storage::disk('public')->delete($system->image);
        }

        $system->delete();
        
        // Get admin prefix from the request URL
        $pathParts = explode('/', url()->previous());
        $adminPrefix = $pathParts[3] ?? env('ADMIN_SECRET', 'admin-panel');
        
        return redirect('/' . $adminPrefix . '/systems')->with('success', 'Service deleted successfully!');
    }
}