<?php

use Livewire\Component;
use App\Models\Murid;

new class extends Component
{
    public $murids = [];

    public function mount()
    {
        $this->murids = Murid::all();
    }
};