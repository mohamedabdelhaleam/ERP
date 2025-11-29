@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Employee Details</h4>
                    <div class="d-flex gap-2">
                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">
                            <i class="uil uil-edit"></i> Edit
                        </a>
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary">
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
                                    <td>EMP-{{ $employee->id }}</td>
                                </tr>
                                <tr>
                                    <th>First Name</th>
                                    <td>{{ $employee->first_name }}</td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td>{{ $employee->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $employee->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $employee->phone ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>National ID</th>
                                    <td>{{ $employee->national_id ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Birth Date</th>
                                    <td>{{ $employee->birth_date ? $employee->birth_date->format('Y-m-d') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Hire Date</th>
                                    <td>{{ $employee->hire_date ? $employee->hire_date->format('Y-m-d') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $employee->address ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td>{{ $employee->department->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Job Title</th>
                                    <td>{{ $employee->jobTitle->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($employee->status == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @elseif($employee->status == 'inactive')
                                            <span class="badge bg-warning">Inactive</span>
                                        @else
                                            <span class="badge bg-danger">Terminated</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $employee->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $employee->updated_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
