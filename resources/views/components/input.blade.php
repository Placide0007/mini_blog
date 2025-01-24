<div class="{{ $wrapClass }}" >
    <label class="{{ $lClass }}" for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" class="{{ $class }} @error($name) is-invalid @enderror" value="{{ old($name,$value) }}">
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>