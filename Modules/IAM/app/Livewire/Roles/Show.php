<?php

namespace Modules\IAM\Livewire\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Modules\IAM\Livewire\WithModalTrait;

class Show extends Component
{
    use WithPagination, WithModalTrait;

    protected $paginationTheme = 'bootstrap';

    public $roleId;
    public $role;
    public $permissions;
    public $role_permissions = [];
    public $selectedPermissions = [];
    public $search = '';
    public $showModal = false;
    public $selectAllPermissions = false;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function filter(){}

    public function mount($roleId)
    {
        $this->roleId = $roleId;
        $this->role = Role::findOrFail($roleId);
    }

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }

    public function updatedSelectAllPermissions($value)
    {
        if ($value) {
            $this->selectedPermissions = $this->permissions->pluck('name')->toArray();
        } else {
            $this->selectedPermissions = [];
        }
    }

    public function savePermissions()
    {
        $this->role->syncPermissions($this->selectedPermissions);
        session()->flash('message', 'Permissions assigned successfully.');
        $this->toggleModal();
    }

    public function render()
    {
        $this->role_permissions = $this->role->permissions()
        ->select('permissions.*', 'permission_groups.name as group_name')
        ->leftJoin('permission_groups', 'permissions.permission_group_id', '=', 'permission_groups.id')
        ->get();
        $this->permissions = Permission::where('name', 'like', '%' . $this->search . '%')->get();
        return view('iam::livewire.roles.show');
    }
}

