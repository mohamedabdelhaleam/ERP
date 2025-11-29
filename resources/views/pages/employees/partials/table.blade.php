@forelse($employees as $employee)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>EMP-{{ $employee->id }}</td>
        <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
        <td>{{ $employee->email }}</td>
        <td>{{ $employee->phone ?? 'N/A' }}</td>
        <td>{{ $employee->department->name ?? 'N/A' }}</td>
        <td>{{ $employee->jobTitle->name ?? 'N/A' }}</td>
        <td>
            @if ($employee->status == 'terminated')
                <span class="badge bg-danger">Terminated</span>
            @else
                <x-status-switcher :route="route('employees.toggle-status', $employee)" :status="$employee->status" :itemId="$employee->id" itemType="employee" />
            @endif
        </td>
        <td>
            <x-action-buttons :viewRoute="route('employees.show', $employee)" :editRoute="route('employees.edit', $employee)" :deleteRoute="route('employees.destroy', $employee)" :itemName="'Employee: ' . $employee->first_name . ' ' . $employee->last_name"
                itemType="employee" />
        </td>
    </tr>
@empty
    <tr>
        <td colspan="9" class="text-center">{{ __('employees.no_employees_found') }}</td>
    </tr>
@endforelse
