@forelse($departments as $department)
    <tr>
        <td>DPT-{{ $department->id }}</td>
        <td>{{ $department->name }}</td>
        <td>{{ Str::limit($department->description, 50) }}</td>
        <td>
            <x-status-switcher :route="route('departments.toggle-status', $department)" :isActive="$department->is_active" :itemId="$department->id" itemType="department" />
        </td>
        <td>{{ $department->created_at->format('Y-m-d') }}</td>
        <td>
            <x-action-buttons :viewRoute="route('departments.show', $department)" :editRoute="route('departments.edit', $department)" :deleteRoute="route('departments.destroy', $department)" :itemName="'Department: ' . $department->name"
                itemType="department" />
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center">{{ __('departments.no_departments_found') }}</td>
    </tr>
@endforelse
