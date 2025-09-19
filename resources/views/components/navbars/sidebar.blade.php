<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white">{{ env('APP_NAME') }}</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto max-height-vh-100" id="sidenav-collapse-main" style="min-height: 100%">
        <ul class="navbar-nav">
            <li class="nav-item mb-2 mt-0">
                <a data-bs-toggle="collapse" href="#ProfileNav"
                    class="nav-link text-white @if (request()->is('iam/profile') or request()->is('iam/profile*')) active @endif"
                    aria-controls="ProfileNav" role="button" aria-expanded="false">
                    <img src="{{auth()->user()->getFirstMediaUrl('avatars')?auth()->user()->getFirstMediaUrl('avatars'):url('assets/img/no-photo.jpg')}}" alt="avatar" class="avatar">
                    <span class="nav-link-text ms-2 ps-1">{{ auth()->user()->name ?? 'User' }}</span>
                </a>
                <div class="collapse @if (request()->is('iam/profile') or request()->is('iam/profile*')) show @endif" id="ProfileNav" style>
                    <ul class="nav">
                        <li class="nav-item @if (request()->is('iam/profile') or request()->is('iam/profile*')) active @endif">
                            <a class="nav-link text-white @if (request()->is('iam/profile') or request()->is('iam/profile*')) active @endif"
                                href="#">
                                <i class="fa fa-user-alt"></i>
                                <span class="sidenav-normal  ms-3  ps-1"> My Profile </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <hr class="horizontal light mt-0">
            @if($user_menu)
                @foreach ($user_menu->items->whereNull('parent_id')->sortBy('order') as $index => $item)
                    @php
                        // Add prefix dynamically
                        $prefixed = 'admin/' . $item->prefix;
                    @endphp

                    @if (\Module::find($item->prefix) && \Module::find($item->prefix)->isEnabled())
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{ $prefixed }}</h6>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#menuItem{{ $index }}"
                            class="nav-link text-white @if (request()->is($prefixed) or request()->is($prefixed . '*')) active @endif"
                            aria-controls="menuItem{{ $index }}" role="button" aria-expanded="false">
                            <i class="material-icons-round opacity-10">dashboard</i>
                            <span class="nav-link-text ms-2 ps-1">{{ $item->title }}</span>
                        </a>
                        @if($item->children)
                            <div class="collapse @if (request()->is($prefixed) or request()->is($prefixed . '*')) show @endif"
                                id="menuItem{{ $index }}">
                                <ul class="nav ">
                                    @foreach ($user_menu->items->where('parent_id', $item->id)->sortBy('order') as $child)
                                        @php
                                            // Optionally prefix child URLs too
                                            $child_url = 'admin/' . $child->url;
                                        @endphp
                                        <li class="nav-item @if (request()->is($child_url) or request()->is($child_url . '*')) active @endif">
                                            <a class="nav-link text-white @if (request()->is($child_url) or request()->is($child_url . '*')) active @endif"
                                                href="{{ url($child_url) }}">
                                                <i class="fa fa-window-maximize text-sm"></i>
                                                <span class="sidenav-normal ms-2 ps-1"> {{ $child->title }} <b class="caret"></b></span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>
                    @endif
                @endforeach
            @endif

            @if (auth()->user()->hasRole('Admin'))
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">System Settings</h6>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#menuItemSystemSetting" class="nav-link text-white  @if (request()->is('admin/system') or request()->is('admin/system*')) active @endif"
                        aria-controls="menuItemSystemSetting" role="button" aria-expanded="false">
                        <i class="material-icons-round opacity-10">dashboard</i>
                        <span class="nav-link-text ms-2 ps-1">System Settings</span>
                    </a>
                    <div class="collapse @if (request()->is('admin/system') or request()->is('admin/system*')) show @endif" id="menuItemSystemSetting">
                        <ul class="nav ">
                            <li class="nav-item @if (request()->is('admin/system/menus') or request()->is('admin/system/menus*')) active @endif">
                                <a class="nav-link text-white @if (request()->is('admin/system/menus') or request()->is('admin/system/menus*')) active @endif" href="{{url('admin/system/menus')}}">
                                    <i class="fa fa-window-maximize text-sm"></i>
                                    <span class="sidenav-normal  ms-2  ps-1"> Menu <b class="caret"></b></span>
                                </a>
                            </li>
                            <li class="nav-item @if (request()->is('admin/system/menu-items') or request()->is('admin/system/menu-items*')) active @endif">
                                <a class="nav-link text-white @if (request()->is('admin/system/menu-items') or request()->is('admin/system/menu-items*')) active @endif" href="{{url('admin/system/menu-items')}}">
                                    <i class="fa fa-window-maximize text-sm"></i>
                                    <span class="sidenav-normal  ms-2  ps-1"> Menu Items <b class="caret"></b></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            @endif
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Logout</h6>
            </li>
            @if (auth()->check())
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link text-white bg-transparent border-0 align-items-center">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">logout</i>
                        </div>
                        <span class="nav-link-text ms-1">Logout</span>
                    </button>
                </form>
            </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">login</i>
                        </div>
                        <span class="nav-link-text ms-1">Sign In</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">assignment</i>
                        </div>
                        <span class="nav-link-text ms-1">Sign Up</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
