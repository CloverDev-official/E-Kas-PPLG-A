<?php

use Livewire\Component;
use Carbon\Carbon;

new class extends Component
{   
    public function boot():void
    {
        Carbon::setLocale('id');
    }
    public $tanggal;
    
    public function mount()
    {
        $this->tanggal = now()->translatedFormat('d F Y');
    }
};