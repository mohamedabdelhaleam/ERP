@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Employees</h4>
                    <a href="{{ route('employees.create') }}" class="btn btn-primary">
                        <i class="uil uil-plus"></i> Add New Employee
                    </a>
                </div>
                <div class="card-body">
                    <x-alert type="success" />

                    <x-table :headers="['No', 'ID', 'Name', 'Email', 'Phone', 'Department', 'Job Title', 'Status', 'Actions']" :colspan="9">
                        @include('pages.employees.partials.table')
                    </x-table>

                    <div class="mt-3">
                        {{ $employees->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
