@extends('layouts.app')

@section('title', 'Home')

@section('content')
    {{-- Slide Photo --}}
    <div id="carouselExampleControls" class="carousel slide mb-0" data-bs-ride="carousel">
        <div class="carousel-inner" style="max-height: 600px;">

            <!-- Slide 1 -->
            <div class="carousel-item active position-relative">
                <img src="{{ asset('images/slide1.png') }}" class="d-block w-100" style="height: 600px; object-fit: cover;"
                    alt="...">

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
                <img src="{{ asset('images/slide2.jpg') }}" class="d-block w-100" style="height: 600px; object-fit: cover;"
                    alt="...">
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
                <img src="{{ asset('images/slide3.jpg') }}" class="d-block w-100" style="height: 600px; object-fit: cover;"
                    alt="...">
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
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- Slide Photo End --}}

    <div class="container my-0" id="product">
        <div class="row mb-5 shadow-sm">
            <div class="col-md-12 text-center">
                <h1 class="fw-bold text-uppercase d-inline-flex align-items-center gap-3"
                    style="font-size: 2.5rem; letter-spacing: 1px;">

                    <i class="bi bi-dropbox" style="font-size: 50px; color:#8a0e23;"></i>

                    <span class="text-dark">Produk</span>
                    <span class="text-primary">Terbaru</span>
                </h1>
                <p class="mt-2 text-muted">Temukan produk terbaik yang anda butuhkan!!</p>
            </div>
        </div>

        <div class="row shadow-sm">
            {{-- Product list --}}
            <div class="col-md-12">
                <div class="row">
                    @foreach ($latestProduct as $product)
                        <div class="col-md-3 mb-4">
                            <div class="card h-100 product-card">
                                <a href="{{ route('products.show', $product->id) }}">
                                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top fixed-img"
                                        alt="{{ $product->title }}">
                                </a>

                                <div class="card-body d-flex flex-column">
                                    <a href="{{ route('products.show', $product->id) }}"
                                        class="text-decoration-none text-dark">
                                        <small class="card-title">{{ Str::limit($product->title, 30, '..') }}</small>
                                    </a>

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
                                        Deskripsi: {!! Str::limit(strip_tags($product->description), 50, '...') !!}
                                    </p>

                                    {{-- alert --}}
                                    @include('alert')
                                    <div class="mt-auto d-flex justify-content-center align-items-center">
                                        <form action="{{ route('cart.store') }}" method="POST"
                                            class="d-flex align-items-center gap-2">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                                            <div class="input-group input-group-sm" style="width: 100px;">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    onclick="this.parentNode.querySelector('input').stepDown()">-</button>
                                                <input type="number" name="quantity" value="1" min="1"
                                                    class="form-control text-center border-secondary" />
                                                <button type="button" class="btn btn-outline-secondary"
                                                    onclick="this.parentNode.querySelector('input').stepUp()">+</button>
                                            </div>

                                            <button type="submit" class="btn btn-cart ms-2">
                                                <i class="bi bi-cart-plus"></i> Tambah
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <div class="container my-0" id="product">
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
                            <div class="card h-100 product-card">
                                <a href="{{ route('products.show', $product->id) }}">
                                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top fixed-img"
                                        alt="{{ $product->title }}">
                                </a>

                                <div class="card-body d-flex flex-column">
                                    <a href="{{ route('products.show', $product->id) }}"
                                        class="text-decoration-none text-dark">
                                        <small class="card-title">{{ Str::limit($product->title, 30, '..') }}</small>
                                    </a>

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
                                        Deskripsi: {!! Str::limit(strip_tags($product->description), 50, '...') !!}
                                    </p>

                                    {{-- alert --}}
                                    @include('alert')
                                    <div class="mt-auto d-flex justify-content-center align-items-center">
                                        <form action="{{ route('cart.store') }}" method="POST"
                                            class="d-flex align-items-center gap-2">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                                            <div class="input-group input-group-sm" style="width: 100px;">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    onclick="this.parentNode.querySelector('input').stepDown()">-</button>
                                                <input type="number" name="quantity" value="1" min="1"
                                                    class="form-control text-center border-secondary" />
                                                <button type="button" class="btn btn-outline-secondary"
                                                    onclick="this.parentNode.querySelector('input').stepUp()">+</button>
                                            </div>

                                            <button type="submit" class="btn btn-cart ms-2">
                                                <i class="bi bi-cart-plus"></i> Tambah
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <section class="py-5 bg-light my-4">
        <div class="container" id="about">
            <div class="row text-center">
                <h2 class="fw-bold">Tentang <span class="text-primary">Kami</span></h2>

                <!-- Produk Lengkap -->
                <div class="col-md-4 mb-4">
                    <i class="bi bi-phone fs-1 text-primary"></i>
                    <h5 class="fw-bold mt-3">Aksesoris Lengkap</h5>
                    <p>Tersedia berbagai aksesoris smartphone & elektronik dengan pilihan terbaru dan kualitas terbaik.</p>
                </div>

                <!-- Service Cepat -->
                <div class="col-md-4 mb-4">
                    <i class="bi bi-tools fs-1 text-success"></i>
                    <h5 class="fw-bold mt-3">Service Android Cepat</h5>
                    <p>Layanan perbaikan smartphone bisa ditunggu di tempat, praktis dan terpercaya.</p>
                </div>

                <!-- Harga Terjangkau -->
                <div class="col-md-4 mb-4">
                    <i class="bi bi-cash-coin fs-1 text-warning"></i>
                    <h5 class="fw-bold mt-3">Harga Terjangkau</h5>
                    <p>Dapatkan produk & layanan dengan harga bersahabat langsung dari sumber terpercaya.</p>
                </div>

            </div>
            <hr class="my-0">

            <div class="row text-center mt-4">

                <!-- Garansi -->
                <div class="col-md-6 mb-4">
                    <i class="bi bi-shield-check fs-1 text-info"></i>
                    <h5 class="fw-bold mt-3">Garansi & Kualitas</h5>
                    <p>Kami menjamin produk dan layanan berkualitas agar Anda merasa aman dan nyaman.</p>
                </div>

                <!-- Pelayanan Ramah -->
                <div class="col-md-6 mb-4">
                    <i class="bi bi-emoji-smile fs-1 text-danger"></i>
                    <h5 class="fw-bold mt-3">Pelayanan Ramah</h5>
                    <p>Staff siap membantu Anda dengan konsultasi & service terbaik untuk kebutuhan gadget Anda.</p>
                </div>

            </div>
        </div>
    </section>

@endsection
