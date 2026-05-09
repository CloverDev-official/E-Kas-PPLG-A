<?php

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Murid;
use Livewire\Attributes\Layout;

new #[Layout('layouts::guest')]  class extends Component
{
    public $username;
    public $password;
    public $errorMessage;

    protected $rules = [
        'username' => 'required|string',
        'password' => 'required|string',
    ];

    public function login()
    {
        $this->validate();


        $murid = Murid::where('nipd', $this->username)->first();
        if ($murid && \Illuminate\Support\Facades\Hash::check($this->password, $murid->password)) {
            Auth::guard('murid')->login($murid);
            session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        if (Auth::guard('guru')->attempt(['usn' => $this->username, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        if (Auth::guard('admin')->attempt(['usn' => $this->username, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->intended('/dashboard');
        }


        if (Auth::guard('bendahara')->attempt(['usn' => $this->username, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        $this->errorMessage = 'Username/NIPD atau password salah.';
    }

};