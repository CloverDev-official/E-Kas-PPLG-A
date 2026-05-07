@props([
    'href',
    'icon'
])

@php
    $active = request()->url() === $href;

    $icons = [
        'dashboard' => [
            'active' => 'mage:dashboard-plus-fill',
            'inactive' => 'mage:dashboard-plus'
        ],

        'listKas' => [
            'active' => 'iconoir:list',
            'inactive' => 'iconoir:list'
        ],

        'history' => [
            'active' => 'mdi:clock-time-three',
            'inactive' => 'mdi:clock-time-three-outline'
        ],
    ];

    $iconName = $icons[$icon] ?? null;
@endphp

<li>
<a 
    href="{{ $href }}"
    wire:navigate
    {{ $attributes->merge([
        'class' => 'flex items-center justify-start gap-2 px-4 py-3 rounded-full transition text-sm font-bold ' .
                    ($active 
                        ? 'bg-primaryActive text-white'
                        : 'text-white hover:bg-primaryHover'
                    )
    ]) }}
>
    
        @if($iconName)
            <iconify-icon 
                icon="{{ $active ? $iconName['active'] : $iconName['inactive'] }}"
                width="20"
                height="20">
            </iconify-icon>
        @endif
    
        <span>{{ $slot }}</span>
    </a>
</li>