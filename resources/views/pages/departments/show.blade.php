@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Department Details</h4>
                    <div class="d-flex gap-2">
                        <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning">
                            <i class="uil uil-edit"></i> Edit
                        </a>
                        <a href="{{ route('departments.index') }}" class="btn btn-secondary">
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
                                    <td>{{ $department->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $department->name }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $department->description ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($department->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $department->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $department->updated_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
