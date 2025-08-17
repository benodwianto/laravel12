<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aurahunt</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofav.png') }}">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: poppins;
            background-color: #eee5e5;
            padding-top: 80px;
        }

        .navbar {
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            color: #101820;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1) grayscale(100);
        }

        .fixed-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            object-position: center;
            border-radius: 5px;
        }

        .product-price .final-price {
            font-size: 18px;
            font-weight: bold;
            color: #111;
            display: block;
        }

        .product-price .old-price {
            text-decoration: line-through;
            color: #888;
            font-size: 14px;
        }

        .product-price .discount {
            background: #dc3545;
            /* merah bootstrap */
            color: #fff;
            font-size: 12px;
            font-weight: bold;
            padding: 2px 6px;
            border-radius: 3px;
        }

        .product-card {
            transition: all 0.3s ease-in-out;
            border-radius: 12px;
            overflow: hidden;
        }

        .product-card:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        /* Tombol keranjang custom */
        .btn-cart {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 8px 18px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-cart:hover {
            background: linear-gradient(135deg, #0072ff, #00c6ff);
            transform: scale(1.05);
        }

        .nav-link:hover span {
            width: 100% !important;
        }

        .navbar-custom {
            background: linear-gradient(90deg, #f8f9fa, #e3f2fd);
            transition: background 0.3s ease, box-shadow 0.3s ease;
            border-radius: 0 0 20px 20px;
        }

        /* Saat discroll */
        .navbar-custom.scrolled {
            background: rgba(255, 255, 255, 0.7) !important;
            /* transparan */
            backdrop-filter: blur(10px);
            /* efek kaca */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* biar tetap elegan */
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top navbar-custom"
        style="background: linear-gradient(90deg, #f8f9fa, #e3f2fd); border-radius: 0 0 20px 20px;">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand fw-bold" href="/">
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
                        <a class="nav-link fw-semibold position-relative" href="#product" style="transition: 0.3s;">
                            Product
                            <span class="d-block"
                                style="height:2px; background:#0d6efd; width:0; transition:width 0.3s;"></span>
                        </a>
                    </li>
                </ul>

                <!-- Search -->
                <form class="d-flex me-3">
                    <input class="form-control me-2 rounded-pill" type="search" placeholder="Search..."
                        aria-label="Search">
                    <button class="btn btn-primary rounded-pill px-3" type="submit">Search</button>
                </form>

                <!-- Cart & User -->
                <ul class="navbar-nav mb-2 mb-lg-0 d-flex align-items-center">
                    <!-- Cart -->
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link position-relative" href="#" id="cartDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-cart-fill fs-5"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="cartDropdown">
                            <li><a class="dropdown-item" href="#">Your Cart</a></li>
                            <li><a class="dropdown-item" href="#">Checkout</a></li>
                        </ul>
                    </li>

                    <!-- User -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                            role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('images/user.jpg') }}" alt="user photo" class="rounded-circle me-2"
                                style="width: 32px; height: 32px; object-fit: cover;">
                            <span class="fw-semibold">Beno</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    {{-- Navbar End --}}

    {{-- Slide Photo --}}
    <div id="carouselExampleControls" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner" style="max-height: 600px;">

            <!-- Slide 1 -->
            <div class="carousel-item active position-relative">
                <img src="{{ asset('images/slide1.png') }}" class="d-block w-100"
                    style="height: 600px; object-fit: cover;" alt="...">

                <!-- Overlay teks & tombol -->
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100">
                    <h1 class="fw-bold display-3 text-shadow">Aura
                        <span class="text-warning">Hunt</span>
                    </h1>
                    <h4 class="mb-4 text-light text-shadow">Solusi kebutuhan aksesoris Smartphone Anda!</h4>
                    <a href="#product" class="btn btn-success btn-lg px-5 py-3 rounded-pill shadow-lg hover-scale">
                        <i class="bi bi-shop me-2"></i> Lihat Produk
                    </a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item position-relative">
                <img src="{{ asset('images/slide2.jpg') }}" class="d-block w-100"
                    style="height: 600px; object-fit: cover;" alt="...">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100">
                    <h1 class="fw-bold display-4 text-shadow">Servis <span class="text-warning">Handphone</span></h1>
                    <h4 class="mb-4 text-light text-shadow">Solusi terbaik untuk perbaikan handphone Anda</h4>
                    <a href="#" class="btn btn-warning btn-lg px-5 py-3 rounded-pill shadow-lg hover-scale">
                        <i class="bi bi-tools me-2"></i> Servis Sekarang
                    </a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item position-relative">
                <img src="{{ asset('images/slide3.jpg') }}" class="d-block w-100"
                    style="height: 600px; object-fit: cover;" alt="...">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100">
                    <h1 class="fw-bold display-4 text-shadow"><span class="text-warning">Produk</span> Terbaru</h1>
                    <h4 class="mb-4 text-light text-shadow">Temukan koleksi eksklusif hanya di Aura Hunt</h4>
                    <a href="#" class="btn btn-success btn-lg px-5 py-3 rounded-pill shadow-lg hover-scale">
                        <i class="bi bi-arrow-right-circle me-2"></i> Jelajahi
                    </a>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- Slide Photo End --}}

    <div class="container my-4" id="product">
        <div class="row mb-5 shadow-sm">
            <div class="col-md-12 text-center">
                <h1 class="fw-bold text-uppercase d-inline-flex align-items-center gap-3"
                    style="font-size: 2.5rem; letter-spacing: 1px;">

                    <img src="{{ asset('images/in-stock.png') }}" class="img-fluid"
                        style="max-width: 70px; border-radius: 10px; padding: 4px; 
                background: #ffffff; box-shadow: 0 2px 8px rgba(0,0,0,0.1);"
                        alt="Logo Product">

                    <span class="text-dark">Produk</span>
                    <span class="text-primary">Kami</span>
                </h1>
                <p class="mt-2 text-muted">Temukan produk terbaik pilihan kami</p>
            </div>
        </div>


        <div class="row shadow-sm">
            {{-- Filter --}}
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Filter Produk</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>

            {{-- Product list --}}
            <div class="col-md-9">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4 mb-4">
                            <a href="{{ route('products.show', $product->id) }}"
                                class="text-decoration-none text-dark">
                                <div class="card h-100 product-card">
                                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top fixed-img"
                                        alt="{{ $product->title }}">

                                    <div class="card-body d-flex flex-column">
                                        <small class="card-title">{{ Str::limit($product->title, 30, '..') }}</small>

                                        {{-- Harga & Diskon --}}
                                        <div class="product-price mt-2">
                                            @if (!empty($product->discount) && $product->discount > 0)
                                                @php
                                                    $finalPrice =
                                                        $product->price - ($product->price * $product->discount) / 100;
                                                @endphp
                                                <span class="final-price fw-bold text-danger">
                                                    Rp {{ number_format($finalPrice, 0, ',', '.') }}
                                                </span>
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="old-price text-decoration-line-through text-muted">
                                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                                    </span>
                                                    <span class="discount badge bg-danger">
                                                        -{{ $product->discount }}%
                                                    </span>
                                                </div>
                                            @else
                                                <span class="final-price">
                                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                                </span>
                                            @endif
                                        </div>

                                        <p class="card-text mt-2">
                                            {!! Str::limit(strip_tags($product->description), 50, '...') !!}
                                        </p>

                                        {{-- Tombol keranjang di tengah --}}
                                        <div class="mt-auto d-flex justify-content-center">
                                            <button class="btn btn-cart">
                                                <i class="bi bi-cart-plus"></i> Tambah ke Keranjang
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        window.addEventListener("scroll", function() {
            const navbar = document.querySelector(".navbar-custom");
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    </script>
</body>

</html>
