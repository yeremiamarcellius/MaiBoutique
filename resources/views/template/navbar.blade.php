<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">MaiBoutique</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('searchPage') || Route::is('search')  ? 'active' : '' }}" aria-current="page" href="{{route('searchPage')}}">Search</a>
                    </li>
                    @can('admin')

                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('showCart') ? 'active' : '' }}" aria-current="page" href="{{ route('showCart') }}">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('showTransaction') ? 'active' : '' }}" aria-current="page" href="{{ route('showTransaction') }}">History</a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('showProfile') ? 'active' : '' }}" aria-current="page" href="{{ route('showProfile') }}">Profile</a>
                    </li>

                @endauth
            </ul>
            <div class="d-flex justify-content-between">
                @can('admin')
                    <a class="btn btn-outline-primary" href="{{ route('addItem') }}">Add Item</a>
                @endcan
                @auth
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger ms-2">Log Out</button>
                    </form>
                @else
                    <a class="btn btn-outline-primary" href="{{ route('signinPage') }}">Sign In</a>
                @endauth

            </div>
        </div>
    </div>
</nav>
