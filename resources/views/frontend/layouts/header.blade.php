<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">
            <i class="fas fa-map-marked-alt me-2"></i>Smart Tourism Guide
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('spots.index')}}">Tourist Spots</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('plans')}}">Trip Plans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cost_calculator')}}">Cost Calculator</a>
                </li>
            </ul>
            <div class="d-flex">

                @guest
                    <a href="{{ route('user.login') }}" class="btn btn-outline-primary me-2">Login</a>
                    <a href="{{ route('user.register') }}" class="btn btn-primary">Register</a>
                @endguest

                @auth
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-2"></i>
                            {{ Auth::user()->name }}
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li><a class="dropdown-item" href="{{ route('user.profile') }}">
                                    <i class="fas fa-user me-2"></i> My Profile
                                </a></li>

                            <li><a class="dropdown-item" href="{{ route('user.activities') }}">
                                    <i class="fas fa-clock me-2"></i> My Activities
                                </a></li>

                            <li><a class="dropdown-item" href="{{ route('user.saved') }}">
                                    <i class="fas fa-heart me-2"></i> Saved Spots
                                </a></li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form method="POST" action="{{ route('user.logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth

            </div>

        </div>
    </div>
</nav>
