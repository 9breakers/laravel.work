<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">Post</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{route('popular')}}">Popular Items</a></li>
                        <li><a class="dropdown-item" href="">New Arrivals</a></li>
                    </ul>
                </li>

                @auth
                    @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('admin')}}">Admin</a></li>

                    @endif
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('logout')}}">Logout</a></li>
                @endauth


            </ul>

            @guest
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Вхід</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('registration')}}">Реєстрація</a>
                    </li>
                </ul>
            @else
                <div class="btn-group">
                        <a href="{{ route('cart') }}" class="btn btn-primary btn-block">Cart
                            <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                        </a>

                </div>

            @endguest
        </div>
    </div>
</nav>
