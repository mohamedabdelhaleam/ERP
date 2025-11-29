@props([
    'route',
    'isActive' => false,
    'status' => null, // For Employee model which uses status field
    'itemId' => null,
    'itemType' => 'item',
    'size' => 'sm', // sm, md, lg, xl
])

@php
    // Determine if active based on isActive prop or status field
    $active = $isActive || $status === 'active';
@endphp

<div class="status-switcher-wrapper" data-toggle-url="{{ $route }}" data-item-id="{{ $itemId }}"
    data-item-type="{{ $itemType }}" data-csrf-token="{{ csrf_token() }}">
    <div class="form-check form-switch form-switch-{{ $size }}">
        <input class="form-check-input status-switcher-toggle pointer-cursor" type="checkbox" id="status-switcher-{{ $itemId }}"
            {{ $active ? 'checked' : '' }}>
        <label class="form-check-label pointer-cursor" for="status-switcher-{{ $itemId }}">
        </label>
    </div>
</div>
