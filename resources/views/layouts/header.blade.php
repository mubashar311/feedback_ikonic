{{-- <div class="border_bottom nav-scroll">
    <div class="container-fluid pt-2">
        <header class="top-wrapper ">

            <h1 class="page-title">
                <i class="fa fa-bars min_display"></i>
                @yield('header')
            </h1>

            <div class="select-drop">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle for_bg_color px-0" type="button" id="triggerId"
                        data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="account-user-avatar">
                            <img src="{{ asset('images/user.svg') }}" alt="user-image">
                        </span>
                        <span class="account-user-name">
                            {{ Auth::user()->name }}
                        </span>
                    </button>
                    <ul class="dropdown-menu py-2 menuBorder" aria-labelledby="triggerId">
                        <!-- <li><a class="dropdown-item"
                                href="#">
                                <img class="imgFilter px-2" src="{{ asset('images/profIcon.svg')}}" alt="">
                                {{ __('messages.header.my_profile') }}</a>
                        </li> -->
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item px-4"
                                    type="submit">
                                    <img class="imgFilter px-1" src="{{ asset('images/logIcon.svg')}}" alt="">
                                    {{ __('Logout') }}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    </div>
</div> --}}
<nav class="navbar navbar-expand-custom navbar-mainbg">
    <div class="custom-logo">
        <img class="logo-img" src="{{ asset('images/logo-color.png') }}" alt="img">
    </div>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars text-white" style="margin-right: 10px"></i>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <div class="hori-selector">
                <div class="left"></div>
                <div class="right"></div>
            </div>
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}"><i
                        class="fas fa-tachometer-alt"></i>{{ __('Dashboard') }}</a>
            </li>
            <li class="nav-item {{ Request::is('admin/users') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.users') }}"><i
                        class="far fa-address-book"></i>{{ __('Users') }}</a>
            </li>
            <li class="nav-item {{ Request::is('feedbacks/all') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('feedbacks.all') }}"><i
                        class="far fa-clone"></i>{{ __('All Feedbacks') }}</a>
            </li>
        </ul>
    </div>
    <div class="select-drop">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle for_bg_color px-0" type="button" id="triggerId"
                data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="{{ asset('images/user10.svg') }}" alt="user-image">
                </span>
                <span class="account-user-name">
                    {{ Auth::user()->name }}
                </span>
            </button>
            <ul class="dropdown-menu py-2 menuBorder" aria-labelledby="triggerId">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item px-4"
                            type="submit">
                            <img class="imgFilter px-1" src="{{ asset('images/logIcon.svg')}}" alt="">
                            {{ __('Logout') }}</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
