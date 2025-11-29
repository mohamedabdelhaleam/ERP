@props([
    'viewRoute' => null,
    'editRoute' => null,
    'deleteRoute' => null,
    'itemName' => 'this item',
    'itemType' => 'item',
    'viewButtonClass' => 'btn btn-sm btn-info',
    'editButtonClass' => 'btn btn-sm btn-warning',
    'showView' => true,
    'showEdit' => true,
    'showDelete' => true,
])

<div class="d-flex gap-2">
    @if ($showView && $viewRoute)
        <a href="{{ $viewRoute }}" class="{{ $viewButtonClass }}" title="View">
            <i class="uil uil-eye"></i>
        </a>
    @endif

    @if ($showEdit && $editRoute)
        <a href="{{ $editRoute }}" class="{{ $editButtonClass }}" title="Edit">
            <i class="uil uil-edit"></i>
        </a>
    @endif

    @if ($showDelete && $deleteRoute)
        <x-delete-button :route="$deleteRoute" :itemName="$itemName" :itemType="$itemType" />
    @endif
</div>
