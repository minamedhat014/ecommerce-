@props(['previews', 'removeAction'])

@if (is_array($previews) && count($previews) > 0)
    @foreach ($previews as $index => $preview)
        <div class="preview">
            <img src="{{ $preview }}" width="100px" height="100px">
            <button wire:click="{{ $removeAction }}({{ $index }})" class="btn btn-outline-light">
                <i class="fa-solid fa-circle-xmark" style="color: #a80505;"></i>
            </button>
        </div>
    @endforeach
@elseif ($previews)
    <div class="preview">
        <img src="{{ $previews }}" width="100px" height="100px">
        <button wire:click="{{ $removeAction }}" class="btn btn-outline-light">
            <i class="fa-solid fa-circle-xmark" style="color: #a80505;"></i>
        </button>
    </div>
@endif
