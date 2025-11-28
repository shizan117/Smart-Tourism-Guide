<header id="header" class="dropdown-menu-end">
    <div class="d-flex align-items-center">
        <button class="toggle-btn" id="sidebarToggle" aria-label="Toggle Menu">
            <i class="fas fa-bars"></i>
        </button>

        <ol class="breadcrumb mb-0">
            @foreach ($breadcrumbs ?? [] as $breadcrumb)
                @if (!empty($breadcrumb['url']))
                    <li class="breadcrumb-item">
                        <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                    </li>
                @else
                    <li class="breadcrumb-item active">{{ $breadcrumb['name'] }}</li>
                @endif
            @endforeach
        </ol>

    @if(auth()->user()->role == 'admin')
        <!-- Globe Icon -->
            <a href="{{ route('index') }}" target="_blank"
               class="globe-link ms-5"
               data-bs-toggle="tooltip" data-bs-placement="bottom"
               title="Your Website">
                <i class="fas fa-globe fa-2x"></i>
            </a>

        @endif

    </div>

    <div class="user-menu d-flex align-items-center">

        <!-- Notification Bell -->
        <div class="dropdown me-5">
            <a href="#" class="notification-link position-relative"
               id="notificationDropdown"
               data-bs-toggle="dropdown"
               aria-expanded="false"
               title="Notifications">
                <i class="fas fa-bell fa-2x"></i>
                <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">3</span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end p-2"
                aria-labelledby="notificationDropdown"
                style="width: 300px; max-height: 300px; overflow-y: auto;">
                <li class="dropdown-header fw-bold">Notifications</li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">🔔 New user registered</a></li>
                <li><a class="dropdown-item" href="#">📩 You have 2 new messages</a></li>
                <li><a class="dropdown-item" href="#">⚠️ Server load is high</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-center text-primary" href="#">View all</a></li>
            </ul>
        </div>

        <!-- User Info -->
        <div class="user-info me-3 text-end">
            <p class="user-name mb-0">{{ auth()->user()->name }}</p>
            <p class="user-role mb-0 text-muted">
                @if(auth()->user()->role == 'admin')
                    Administrator
                @else
                    User
                @endif
            </p>
        </div>

        <!-- User Dropdown -->
        <div class="dropdown">
            <button class="btn p-0" type="button" id="userDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                <div class="user-avatar">
                    @php
                        $avatar = auth()->user()->avatar ?? 'backend/img/default-avatar.png';
                    @endphp
                    <img src="{{ asset($avatar) }}" alt="avatar"
                         class="rounded-circle" width="40" height="40">
                </div>
            </button>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                @if(auth()->user()->role == 'admin')
                    <li><a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="fas fa-user me-2"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form-admin').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                        <form id="logout-form-admin" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @else
                    <li><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fas fa-user me-2"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.activities') }}"><i class="fas fa-clock me-2"></i> Activities</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.saved') }}"><i class="fas fa-heart me-2"></i> Saved Spots</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form-user').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                        <form id="logout-form-user" action="{{ route('user.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function (el) {
                return new bootstrap.Tooltip(el)
            })
        });
    </script>
</header>
