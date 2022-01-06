<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class IndexUser extends Component
{
    use WithPagination;

    public $deleteId;

    public $paginate = 5, $search;
    protected $queryString = ['search'];
    protected $listeners = ['delete', 'render'];

    public function render()
    {
        return view('livewire.user.index-user', [
            'users' => $this->search === null ?
                User::with('roles')->whereRelation('roles', 'name', 'not like', 'admin')->paginate($this->paginate) :
                User::where('name', 'like', '%' . $this->search . '%')->with('roles')->whereRelation('roles', 'name', 'not like', ' admin')->paginate($this->paginate)

        ]);
    }

    public function alertConfirm($id)
    {
        $this->deleteId = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Apakah Anda Yakin?',
            'text' => 'Jika dihapus, Anda tidak akan dapat mengembalikan data user ini!'
        ]);
    }

    public function delete()
    {
        if ($this->deleteId) {
            $user = User::find($this->deleteId);
            $role = $user->getRoleNames();
            $user->removeRole($role[0]);
            $user->delete();
        }
    }
}
