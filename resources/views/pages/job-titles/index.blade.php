@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Job Titles</h4>
                    <a href="{{ route('job-titles.create') }}" class="btn btn-primary">
                        <i class="uil uil-plus"></i> Add New Job Title
                    </a>
                </div>
                <div class="card-body">
                    <x-alert type="success" />

                    <x-table :headers="['ID', 'Name', 'Department', 'Description', 'Status', 'Created At', 'Actions']" :colspan="7">
                        @include('pages.job-titles.partials.table')
                    </x-table>

                    <div class="mt-3">
                        {{ $jobTitles->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
