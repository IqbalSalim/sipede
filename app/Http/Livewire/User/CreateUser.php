<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    public $roles;
    public $role = 'operator', $name, $email, $password, $password_confirmation;

    public function render()
    {
        $this->roles = Role::whereNotIn('name', ['admin'])->get();
        return view('livewire.user.create-user');
    }

    public function resetInput()
    {
        $this->role = null;
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->password_confirmation = null;
    }

    public function store()
    {

        $this->validate(
            [
                'role' => 'required',
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,',
                'password' => 'required|confirmed|min:8',
            ]
        );

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user = User::where('email', $this->email)->first();
        $user->assignRole($this->role);
        $this->emit('render');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'User Berhasil Ditambahkan!',
            'text' => 'ini telah disimpan di tabel User.'
        ]);
    }
}
