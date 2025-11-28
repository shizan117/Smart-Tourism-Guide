@if(auth()->check() && auth()->user()->role == 'admin')
    <!-- Admin Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>
                <i class="fas fa-map-marked-alt"></i>
                <span>Tourism Admin</span>
            </h3>
            <button class="toggle-btn" id="sidebarClose" aria-label="Close Menu">
                <i class="fas fa-arrow-left"></i>
            </button>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>

            <li class="menu-divider"></li>

            <!-- Admin Menus -->
            <li>
                <a href="#touristSpotsSubmenu" data-bs-toggle="collapse"
                   aria-expanded="{{ request()->routeIs('admin.spots.*') ? 'true' : 'false' }}"
                   class="dropdown-toggle {{ request()->routeIs('admin.spots.*') ? 'active' : '' }}">
                    <i class="fas fa-map-marker-alt"></i>
                    <span class="menu-text">Tourist Spots</span>
                    <span class="badge bg-primary">{{ \App\Models\Spot::count() }}</span>
                    <i class="fas fa-angle-down submenu-icon"></i>
                </a>
                <ul class="collapse list-unstyled sidebar-submenu {{ request()->routeIs('admin.spots.*') ? 'show' : '' }}"
                    id="touristSpotsSubmenu">
                    <li><a href="{{ route('admin.spots.index') }}" class="{{ request()->routeIs('admin.spots.index') ? 'active' : '' }}">View All Spots</a></li>
                    <li><a href="{{ route('admin.spots.create') }}" class="{{ request()->routeIs('admin.spots.create') ? 'active' : '' }}">Add New Spot</a></li>
                    <li><a href="{{ route('admin.spotCategories.index') }}" class="{{ request()->routeIs('admin.spotCategories.*') ? 'active' : '' }}">Categories & Tags</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="fas fa-route"></i> <span class="menu-text">Trip Plans</span></a></li>
            <li><a href="{{route('admin.users')}}"><i class="fas fa-users"></i> <span class="menu-text">Users</span></a></li>
            <li><a href="#"><i class="fas fa-star"></i> <span class="menu-text">Reviews</span></a></li>

            <li class="menu-divider"></li>

            <li>
                <a href="#settingsSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-cog"></i>
                    <span class="menu-text">Settings</span>
                    <i class="fas fa-angle-down submenu-icon"></i>
                </a>
                <ul class="collapse list-unstyled sidebar-submenu" id="settingsSubmenu">
                    <li><a href="{{ route('admin.profile') }}" class="{{ request()->routeIs('admin.profile*') ? 'active' : '' }}">Profile Settings</a></li>
                    <li><a href="#">General Settings</a></li>
                    <li><a href="#">API Keys & Integrations</a></li>
                    <li><a href="#">Manage Permissions</a></li>
                </ul>
            </li>

            <li class="menu-divider"></li>

            <li><a href="#"><i class="fas fa-chart-bar"></i> <span class="menu-text">Analytics</span></a></li>
            <li><a href="#"><i class="fas fa-file-alt"></i> <span class="menu-text">Reports</span></a></li>
        </ul>
    </nav>

@elseif(auth()->check() && auth()->user()->role == 'user')
    <!-- User Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>
                <i class="fas fa-user-circle"></i>
                <span>{{ auth()->user()->name }}</span>
            </h3>
            <button class="toggle-btn" id="sidebarClose" aria-label="Close Menu">
                <i class="fas fa-arrow-left"></i>
            </button>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li><a href="{{ route('spots.index') }}" class="{{ request()->routeIs('spots.index') ? 'active' : '' }}"><i class="fas fa-map-marker-alt"></i> Tourist Spots</a></li>
            <li><a href="{{ route('plans') }}" class="{{ request()->routeIs('plans') ? 'active' : '' }}"><i class="fas fa-route"></i> Trip Plans</a></li>
            <li><a href="{{ route('cost_calculator') }}" class="{{ request()->routeIs('cost_calculator') ? 'active' : '' }}"><i class="fas fa-calculator"></i> Cost Calculator</a></li>
            <li><a href="{{ route('user.saved') }}" class="{{ request()->routeIs('user.saved') ? 'active' : '' }}"><i class="fas fa-heart"></i> Saved Spots</a></li>
            <li><a href="{{ route('user.activities') }}" class="{{ request()->routeIs('user.activities') ? 'active' : '' }}"><i class="fas fa-clock"></i> My Activities</a></li>
            <li><a href="{{ route('user.profile') }}" class="{{ request()->routeIs('user.profile') ? 'active' : '' }}"><i class="fas fa-user"></i> Profile</a></li>
        </ul>
    </nav>
@endif
