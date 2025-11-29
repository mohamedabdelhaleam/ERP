@forelse($jobTitles as $jobTitle)
    <tr>
        <td>{{ $jobTitle->id }}</td>
        <td>{{ $jobTitle->name }}</td>
        <td>
            @if ($jobTitle->department)
                {{ $jobTitle->department->name }}
            @else
                <span class="text-muted">N/A</span>
            @endif
        </td>
        <td>{{ Str::limit($jobTitle->description, 50) }}</td>
        <td>
            <x-status-switcher :route="route('job-titles.toggle-status', $jobTitle)" :isActive="$jobTitle->is_active" :itemId="$jobTitle->id" itemType="job title" />
        </td>
        <td>{{ $jobTitle->created_at->format('Y-m-d') }}</td>
        <td>
            <x-action-buttons :viewRoute="route('job-titles.show', $jobTitle)" :editRoute="route('job-titles.edit', $jobTitle)" :deleteRoute="route('job-titles.destroy', $jobTitle)" :itemName="'Job Title: ' . $jobTitle->name"
                itemType="job title" />
        </td>
    </tr>
@empty
    <tr>
        <td colspan="7" class="text-center">{{ __('job-titles.no_job_titles_found') }}</td>
    </tr>
@endforelse
