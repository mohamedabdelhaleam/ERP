<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use App\Models\Department;
use App\Http\Requests\Organization\JobTitle\StoreJobTitleRequest;
use App\Http\Requests\Organization\JobTitle\UpdateJobTitleRequest;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobTitles = JobTitle::with('department')->latest()->paginate(20);
        return view('pages.job-titles.index', compact('jobTitles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::select('id', 'name')->active()->get();
        return view('pages.job-titles.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobTitleRequest $request)
    {
        JobTitle::create($request->validated());

        return redirect()->route('job-titles.index')
            ->with('success', 'Job Title created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobTitle $jobTitle)
    {
        $jobTitle->load('department');
        return view('pages.job-titles.show', compact('jobTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobTitle $jobTitle)
    {
        $departments = Department::select('id', 'name')->active()->get();
        return view('pages.job-titles.edit', compact('jobTitle', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobTitleRequest $request, JobTitle $jobTitle)
    {
        $jobTitle->update($request->validated());

        return redirect()->route('job-titles.index')
            ->with('success', 'Job Title updated successfully.');
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(JobTitle $jobTitle)
    {
        $jobTitle->update([
            'is_active' => !$jobTitle->is_active
        ]);

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Job Title status updated successfully.',
                'is_active' => $jobTitle->is_active,
            ]);
        }

        return redirect()->back()
            ->with('success', 'Job Title status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobTitle $jobTitle)
    {
        $jobTitle->delete();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Job Title deleted successfully.',
            ]);
        }

        return redirect()->route('job-titles.index')
            ->with('success', 'Job Title deleted successfully.');
    }
}
