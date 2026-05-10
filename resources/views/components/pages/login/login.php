<?php

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;

use App\Models\Murid;

new #[Layout('layouts::guest')] class extends Component
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

        // login murid
        $murid = Murid::where('nipd', $this->username)->first();

        if (
            $murid &&
            Hash::check($this->password, $murid->password)
        ) {

            Auth::guard('murid')->login($murid);

            session()->regenerate();

            return redirect('/dashboard');
        }

        // login role lain
        $guards = [
            'guru',
            'admin',
            'bendahara'
        ];

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->attempt([
                'usn' => $this->username,
                'password' => $this->password
            ])) {

                session()->regenerate();

                return redirect('/dashboard');
            }
        }

        $this->errorMessage =
            'Username/NIPD atau password salah.';
    }
};