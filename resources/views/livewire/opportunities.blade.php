<div class="container my-4">
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" wire:model.live="search" class="form-control" placeholder="Search items...">
        </div>
        <div class="col-md-3">
            <select wire:model.live="sortField" class="form-select">
                <option value="name">Sort by Name</option>
                <option value="created_at">Sort by Date</option>
            </select>
        </div>
        <div class="col-md-3">
            <select wire:model.live="sortDirection" class="form-select">
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-auto d-flex align-items-center">
            <label class="form-label me-2 mb-0">Items per page:</label>
            <select wire:model.live="perPage" class="form-select">
                @foreach ($options as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div wire:loading class="mb-3">
        <div class="spinner-border spinner-border-sm text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="list-group mb-3">
        @forelse ($items as $item)
            <div class="list-group-item">
                {{ $item->name }}
            </div>
        @empty
            <div class="list-group-item text-center">
                No items found {{ $search ? "matching '{$search}'" : '' }}
            </div>
        @endforelse
    </div>
    @if ($items->hasPages())
        <div>
            {{ $items->links() }}
        </div>
    @endif
</div>
