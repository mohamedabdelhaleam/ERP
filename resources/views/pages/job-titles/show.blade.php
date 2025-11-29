@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Job Title Details</h4>
                    <div class="d-flex gap-2">
                        <a href="{{ route('job-titles.edit', $jobTitle) }}" class="btn btn-warning">
                            <i class="uil uil-edit"></i> Edit
                        </a>
                        <a href="{{ route('job-titles.index') }}" class="btn btn-secondary">
                            <i class="uil uil-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">ID</th>
                                    <td>{{ $jobTitle->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $jobTitle->name }}</td>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td>
                                        @if ($jobTitle->department)
                                            <a href="{{ route('departments.show', $jobTitle->department) }}"
                                                class="badge bg-info text-decoration-none">
                                                {{ $jobTitle->department->name }}
                                            </a>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $jobTitle->description ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($jobTitle->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $jobTitle->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $jobTitle->updated_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
