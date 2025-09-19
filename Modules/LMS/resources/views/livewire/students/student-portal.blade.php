<div class="container py-5" style="max-width: 600px;">
    @guest
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <button class="btn btn-sm {{ $tab == 'login' ? 'btn-primary' : 'btn-light' }}" wire:click="$set('tab', 'login')">Login</button>
                <button class="btn btn-sm {{ $tab == 'register' ? 'btn-primary' : 'btn-light' }}" wire:click="$set('tab', 'register')">Register</button>
            </div>

            <div class="card-body">
                @if ($tab == 'login')
                    <h5>Student Login</h5>

                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form wire:submit.prevent="login">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" wire:model="email" class="form-control">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" wire:model="password" class="form-control">
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <button class="btn btn-primary w-100">Login</button>
                    </form>
                @else
                    <h5>Student Registration</h5>

                    <form wire:submit.prevent="register">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" wire:model="register.name" class="form-control">
                            @error('register.name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" wire:model="register.email" class="form-control">
                            @error('register.email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" wire:model="register.phone" class="form-control">
                            @error('register.phone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" wire:model="register.password" class="form-control">
                            @error('register.password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" wire:model="register.password_confirmation" class="form-control">
                        </div>

                        <button class="btn btn-success w-100">Register</button>
                    </form>
                @endif
            </div>
        </div>
    @else
        <div class="text-center">
            <h4>Welcome, {{ Auth::user()->name }}</h4>
            <a href="{{ route('student.dashboard') }}" class="btn btn-success mt-3">Go to Dashboard</a>
        </div>
    @endguest
</div>
