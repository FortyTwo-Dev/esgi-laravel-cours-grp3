@props([
    'active' => false,
])
<li {{ $attributes }}>
    <a
        {{ $attributes->class([
            'btn',
            'btn-primary' => $active,
        ]) }}
    >
        {{ $slot }}
    </a>
</li>
