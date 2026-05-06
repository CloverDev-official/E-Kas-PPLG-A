<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;

class Login extends Component
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


        $siswa = Siswa::where('nipd', $this->username)->first();
        if ($siswa && \Illuminate\Support\Facades\Hash::check($this->password, $siswa->password)) {
            Auth::guard('siswa')->login($siswa);
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

    public function render()
    {
        return view('livewire.login')->layout('layouts.guest');
    }
}