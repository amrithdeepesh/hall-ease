@php
$width = $width ?? '32';
$rounded = $rounded ?? true;
@endphp

<span class="d-inline-flex align-items-center justify-content-center">
    <img src="{{ asset('hall-ease.png') }}" alt="Hall Ease Logo" width="{{ $width }}" height="{{ $width }}" class="{{ $rounded ? 'rounded' : '' }}" />
</span>
