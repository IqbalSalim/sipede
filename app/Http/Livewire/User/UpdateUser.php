<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UpdateUser extends Component
{
    public $user_id, $user_role, $user_name, $user_email, $roles;
    protected $listeners = ['getUser'];

    public function mount()
    {
        $this->roles = Role::whereNotIn('name', ['admin'])->get();
    }

    public function render()
    {
        return view('livewire.user.update-user');
    }

    public function resetInput()
    {
        $this->user_id = null;
        $this->user_role = null;
        $this->user_name = null;
        $this->user_email = null;
    }


    public function getUser($id)
    {
        $user = User::where('id', $id)->with('roles')->get();
        $this->user_id = $id;
        $this->user_role = $user[0]->roles[0]->name;
        $this->user_name = $user[0]->name;
        $this->user_email = $user[0]->email;
    }

    public function update()
    {

        $this->validate(
            [
                'user_role' => 'required',
                'user_name' => 'required|string|max:255',
                'user_email' => 'required|string|email|max:255|unique:users,email,' . $this->user_id,
            ]
        );

        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->user_name,
                'email' => $this->user_email,
            ]);
            $role = $user->getRoleNames();
            $user->removeRole($role[0]);
            $user->assignRole($this->user_role);
            $this->emit('render');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal-edit');
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'message' => 'User Berhasil Diubah!',
                'text' => 'perubahan ini telah disimpan di tabel User.'
            ]);
        }
    }
}
