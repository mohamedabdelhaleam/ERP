<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\Organization\Department\StoreDepartmentRequest;
use App\Http\Requests\Organization\Department\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::with('jobTitles')->latest()->paginate(20);
        return view('pages.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        Department::create($request->validated());

        return redirect()->route('departments.index')
            ->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('pages.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('pages.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());

        return redirect()->route('departments.index')
            ->with('success', 'Department updated successfully.');
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(Department $department)
    {
        $department->update([
            'is_active' => !$department->is_active
        ]);

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Department status updated successfully.',
                'is_active' => $department->is_active,
            ]);
        }

        return redirect()->back()
            ->with('success', 'Department status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Department deleted successfully.',
            ]);
        }

        return redirect()->route('departments.index')
            ->with('success', 'Department deleted successfully.');
    }
}
