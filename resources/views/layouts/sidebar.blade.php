{{-- <div class="custom-sidebar">
    <i class="fa fa-close close-sidebar"></i>
    <div class="custom-logo">
        <img class="logo-img" src="{{ asset('images/logo-color.png') }}" alt="img">
    </div>
    <div class="nav-bar" id="sidebarMenu">
        <ul class="navbar-nav">
            <li class="nav-item navParent navParentActive {{ Request::is('dashboard') ? 'nav_Link_Active' : '' }} ">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="px-2">{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @if(Auth::user()->role == 'Admin')
                    <div class="nav-item qr_mang">
                        <a class="nav-link {{ Request::is('admin/users') ? 'nav_Link_Active' : '' }}" href="{{ route('admin.users') }}">
                            <i class="fa-solid fa-users"></i>
                            <span class="px-2">{{ __('Users') }}</span>
                        </a>
                    </div>
                    @endif
                    <div class="nav-item qr_mang">
                        <a class="nav-link {{ Request::is('feedbacks/all') ? 'nav_Link_Active' : '' }}" href="{{ route('feedbacks.all') }}">
                            <i class="fa-solid fa-border-all"></i>
                            <span class="px-2">{{ __('All Feedbacks') }}</span>
                        </a>
                    </div>
                    @if(Auth::user()->role == 'User')
                    <div class="nav-item qr_mang">
                        <a class="nav-link {{ Request::is('feedbacks') ? 'nav_Link_Active' : '' }}" href="{{ route('feedbacks.index') }}">
                            <i class="fa-solid fa-circle-plus"></i>
                            <span class="px-2">{{ __('My Feedback') }}</span>
                        </a>
                    </div>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</div> --}}