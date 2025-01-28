<textarea name="{{ $name }}" placeholder="{{ $placeholder }}"  class="{{ $class  }} @error($name) is-invalid @enderror " rows="{{ $rows }}" cols="{{ $cols }}" ></textarea>
@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
