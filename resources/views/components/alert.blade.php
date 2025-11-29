@props([
    'type' => 'success',
    'message' => null,
    'sessionKey' => null,
    'dismissible' => true,
    'fade' => true,
])

@php
    // Determine the message to display
    $alertMessage = $message;

    // If sessionKey is provided, check session for that key
    if ($sessionKey && session()->has($sessionKey)) {
        $alertMessage = session($sessionKey);
    }

    // If no message or sessionKey provided, check common session keys based on type
    if (!$alertMessage && !$sessionKey) {
        if ($type === 'success' && session()->has('success')) {
            $alertMessage = session('success');
        } elseif ($type === 'error' && session()->has('error')) {
            $alertMessage = session('error');
        } elseif ($type === 'warning' && session()->has('warning')) {
            $alertMessage = session('warning');
        } elseif ($type === 'info' && session()->has('info')) {
            $alertMessage = session('info');
        }
    }

    // Build alert classes
    $alertClasses = 'alert alert-' . $type;
    if ($dismissible) {
        $alertClasses .= ' alert-dismissible';
    }
    if ($fade) {
        $alertClasses .= ' fade show';
    }
@endphp

@if ($alertMessage)
    <div class="{{ $alertClasses }}" role="alert">
        {!! $alertMessage !!}
        @if ($dismissible)
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @endif
    </div>
@endif
