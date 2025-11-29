@props([
    'headers' => [],
    'data' => null,
    'emptyMessage' => 'No records found.',
    'colspan' => null,
])

@php
    $colspan = $colspan ?? count($headers);
@endphp

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @if ($slot->isNotEmpty())
                {{ $slot }}
            @elseif($data && count($data) > 0)
                @foreach ($data as $row)
                    <tr>
                        @if (is_array($row))
                            @foreach ($row as $cell)
                                <td>{!! $cell !!}</td>
                            @endforeach
                        @else
                            <td>{!! $row !!}</td>
                        @endif
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="{{ $colspan }}" class="text-center">{{ $emptyMessage }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
