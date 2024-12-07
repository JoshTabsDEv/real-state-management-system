<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            return redirect()->intended('admin.main-dashboard');
        }

        $this->addError('email', __('The provided credentials do not match our records.'));
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
