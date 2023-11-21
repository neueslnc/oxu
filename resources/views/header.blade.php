<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Izlash ..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                </div>
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown dropdown-large __web-inspector-hide-shortcut__">
                        <a class="nav-link" href="{{ route('getTrashUserr',1) }}">	<i class="bx bx-box"></i></a>
                    </li>
                </ul>
            </div>

            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('avatar-2.jpg') }}" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{ auth()->user()->full_name }}</p>
                        <p class="designattion mb-0">{{ __(auth()->user()->user_level->name) }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="{{ route('load_script') }}"><i class="bx bx-download"></i>Обновления</a>--}}
{{--                    </li> --}}
                    <li>
                        <a class="dropdown-item" href="{{ route('destroy') }}"><i class='bx bx-log-out-circle'></i><span>Chiqish</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
