@props([
    'href',
    'icon'
])

@php
    $active = request()->url() === $href;

    $icons = [
        'dashboard' => [
            'active' => 'mdi:view-dashboard',
            'inactive' => 'mdi:view-dashboard-outline'
        ],

        'pemasukan' => [
            'active' => 'mdi:wallet-plus',
            'inactive' => 'mdi:wallet-plus-outline'
        ],

        'pengeluaran' => [
            'active' => 'majesticons:money-minus',
            'inactive' => 'majesticons:money-minus-line'
        ],

        'riwayat' => [
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
        'class' => 'flex items-center justify-start gap-2 px-4 py-2 rounded-full transition text-md font-bold ' .
                    ($active 
                        ? 'bg-primaryActive text-white'
                        : 'text-white hover:bg-primaryHover'
                    )
    ]) }}
>
    
        @if($iconName)
            <iconify-icon 
                icon="{{ $active ? $iconName['active'] : $iconName['inactive'] }}"
                width="24"
                height="24">
            </iconify-icon>
        @endif
    
        <span>{{ $slot }}</span>
    </a>
</li>