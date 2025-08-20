    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top navbar-custom"
        style="background: linear-gradient(90deg, #f8f9fa, #e3f2fd); border-radius: 0 0 20px 20px;">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <img src="{{ asset('images/aurahuntlogo.png') }}" alt="Aurahunt Logo" style="width: 140px">
            </a>

            <!-- Toggle button (mobile) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar items -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold position-relative" href="{{ route('home') }}#product" style="transition: 0.3s;">
                            Produk
                            <span class="d-block"
                                style="height:2px; background:#0d6efd; width:0; transition:width 0.3s;"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold position-relative" href="{{ route('home') }}#about"
                            style="transition: 0.3s;">
                            Tentang Kami
                            <span class="d-block"
                                style="height:2px; background:#0d6efd; width:0; transition:width 0.3s;"></span>
                        </a>
                    </li>
                </ul>

                <!-- Search -->
                <form class="d-flex me-3">
                    <input class="form-control me-2 rounded-pill" type="search" placeholder="Search..."
                        aria-label="Search">
                    <button class="btn btn-primary rounded-pill px-3" type="submit"><i class="bi bi-search"></i></button>
                </form>

                <!-- Cart & User -->
                <ul class="navbar-nav mb-2 mb-lg-0 d-flex align-items-center"
                    style="list-style: none; margin: 0; padding: 0;">
                    <!-- Cart -->
                    <li class="nav-item dropdown me-3 cart-dropdown">
                        <a class="nav-link position-relative d-flex align-items-center" href="#" id="cartDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-cart-fill fs-5"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ count($carts) }}
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow cart-dropdown-menu"
                            aria-labelledby="cartDropdown" id="cartDropdownMenu">

                            <li class="dropdown-header mb-0">
                                {{ count($carts) ? 'Baru Ditambahkan' : 'Keranjang Belanja Kosong' }}</li>

                            <li class="px-3 py-2">
                                @foreach ($carts->take(3) as $cart)
                                    <div class="d-flex align-items-center justify-content-between w-100 mt-2">
                                        <img src="{{ asset('images/' . $cart->product->image) }}" class="me-2 rounded"
                                            style="width: 50px" alt="Product">
                                        <div class="d-flex justify-content-between align-items-center w-100">
                                            <span
                                                class="me-2">{{ Str::limit($cart->product->title, 20) ?? 'Produk' }}</span>
                                            <small
                                                class="text-danger">Rp{{ number_format($cart->product->price ?? 0, 0, ',', '.') }}</small>
                                        </div>
                                    </div>
                                @endforeach
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                @if (count($carts) > 0)
                                    <a class="dropdown-item text-center text-primary fw-bold"
                                        href="{{ route('cart.index') }}">
                                        Lihat Keranjang Belanja
                                    </a>
                                @else
                                    <a class="dropdown-item text-center text-primary fw-bold" href="#product">
                                        Mulai Belanja
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </li>

                    <!-- User -->
                    @auth
                        <li class="nav-item dropdown d-flex align-items-center position-relative" style="list-style: none;">
                            <a class="nav-link d-flex align-items-center" href="#" id="userDropdown">
                                <img src="{{ asset('images/user.jpg') }}" alt="user photo" class="rounded-circle me-2"
                                    style="width: 32px; height: 32px; object-fit: cover;">
                                <span class="fw-semibold">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu shadow" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item d-flex gap-2" style="list-style: none;">
                            <a href="#" class="btn btn-outline-primary rounded-pill px-3" data-bs-toggle="modal"
                                data-bs-target="#authModal">Masuk</a>
                            <a href="#" class="btn btn-primary rounded-pill px-3" data-bs-toggle="modal"
                                data-bs-target="#authModal">Daftar</a>
                        </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>
    {{-- Navbar End --}}
