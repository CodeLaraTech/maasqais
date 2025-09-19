<?php

namespace Modules\IAM\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Modules\IAM\Livewire\WithModalTrait;
use Modules\IAM\Livewire\WithSorting;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
class Index extends Component
{
    use WithPagination, WithModalTrait, WithSorting, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public int $perPage;
    public array $orderable = [];

    public $search = '';
    public $name;
    public $email;
    public $password;
    public $role;
    public $avatar;
    public $userId;
    public $updateMode = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortDirection' => [],
        'perPage' => [],
    ];

    public $mediaComponentNames = ['avatar'];

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'password'=>'nullable|min:6',
            'role'=>'required',
            'avatar' => 'nullable|image|max:1024', // 1MB Max
        ];
    }

    public function mount()
    {
        $this->role = auth()->user()->getRoleNames()->first()??'';

        $this->sortBy = 'id'; // Default sort by ID
        $this->sortDirection = 'desc'; // Default sort direction
        $this->perPage = 10; // Default pagination limit
        $this->orderable = ['id', 'name', 'email'];
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->userId = '';
        $this->updateMode = false;
        $this->avatar = null;
    }

    public function store()
    {
        $this->validate();
        if($this->password){
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password'=>Hash::make($this->password),
            ]);

            if($this->role){
                $user->syncRoles($this->role);
            }


            if ($this->avatar) {
                $user->clearMediaCollection('avatars'); // Clear existing media
                $user->addMedia($this->avatar->getRealPath())->toMediaCollection('avatars');
            }

        }
        session()->flash('message', 'User created successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->updateMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();
        $user = User::find($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        if($this->password){
            $user->update([
                'password'=>Hash::make($this->password),
            ]);
        }

        if($this->role){
            $user->syncRoles($this->role);
        }

        if ($this->avatar) {
            $user->clearMediaCollection('avatars'); // Clear existing media
            $media = $user->addMedia($this->avatar->getRealPath())->toMediaCollection('avatars');
        }


        session()->flash('message', 'User updated successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete()
    {
        User::find($this->deleteId)->delete();
        session()->flash('message', 'User deleted successfully.');
    }

    public function render()
    {
        $roles = Role::all();
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
        return view('iam::livewire.users.index', compact('users','roles'));
    }
}
