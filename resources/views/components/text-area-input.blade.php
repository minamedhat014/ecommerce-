<div class="form-group">
    @if ($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif

    <textarea 
        id="{{ $id ?? $name }}" 
        name="{{ $name }}" 
        class="form-control {{ $class ?? '' }}" 
        placeholder="{{ $placeholder ?? '' }}"
        rows="{{ $rows ?? 3 }}"
        {{ $attributes }}
    >{{ $value ?? '' }}</textarea>

    @if ($helpText)
        <small class="form-text text-muted">{{ $helpText }}</small>
    @endif

    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        ClassicEditor
            .create(document.querySelector('#{{ $id ?? $name }}'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
