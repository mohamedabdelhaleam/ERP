<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\JobTitle;
use App\Http\Requests\Hrm\Employee\StoreEmployeeRequest;
use App\Http\Requests\Hrm\Employee\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with(['department', 'jobTitle'])->latest()->paginate(20);
        return view('pages.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::select('id', 'name')->active()->get();
        $jobTitles = JobTitle::select('id', 'name')->active()->get();
        return view('pages.employees.create', compact('departments', 'jobTitles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee->load(['department', 'jobTitle']);
        return view('pages.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $departments = Department::select('id', 'name')->active()->get();
        $jobTitles = JobTitle::select('id', 'name')->active()->get();
        return view('pages.employees.edit', compact('employee', 'departments', 'jobTitles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(Employee $employee)
    {
        // Toggle between active and inactive (not terminated)
        $newStatus = $employee->status === 'active' ? 'inactive' : 'active';
        $employee->update([
            'status' => $newStatus
        ]);

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Employee status updated successfully.',
                'status' => $employee->status,
            ]);
        }

        return redirect()->back()
            ->with('success', 'Employee status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Employee deleted successfully.',
            ]);
        }

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
