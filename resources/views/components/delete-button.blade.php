@props([
    'route',
    'itemName' => 'this item',
    'itemType' => 'item',
    'buttonClass' => 'btn btn-sm btn-danger',
    'iconClass' => 'uil uil-trash',
])

<form action="{{ $route }}" method="POST" class="d-inline delete-form" data-item-name="{{ $itemName }}"
    data-item-type="{{ $itemType }}">
    @csrf
    @method('DELETE')
    <button type="button" class="{{ $buttonClass }} delete-btn">
        <i class="{{ $iconClass }}"></i>
    </button>
</form>
