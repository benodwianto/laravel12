<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aurahunt</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: poppins;
            background-color: #E5E5E5;
        }

        .navbar {
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            color: #101820;
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ asset('images/aurahuntlogo.png') }}" alt="Aurahunt Logo"
                    style="width: 150px"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#product">Product</a>
                    </li>
                </ul>

                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-cart-fill"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>

                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('images/user.jpg') }}" alt="user photo" class="rounded-circle"
                                style="width: 30px">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
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
            <div class="carousel-item active position-relative">
                <img src="{{ asset('images/slide1.png') }}" class="d-block w-100"
                    style="height: 600px; object-fit: cover;" alt="...">

                <!-- Overlay teks & tombol -->
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100">
                    <h1 class="text-light fw-bold">Aura <span class="text-warning">Hunt</span>
                    </h1>
                    <h4 class="text-light mb-3">Solusi kebutuhan aksesoris Smarthphone anda!!</h4>
                    <a href="#product" class="btn btn-success btn-lg">Lihat Produk</a>
                </div>
            </div>

            <div class="carousel-item position-relative">
                <img src="{{ asset('images/slide2.jpg') }}" class="d-block w-100"
                    style="height: 600px; object-fit: cover;" alt="...">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100">
                    <h1 class="text-light fw-bold">Servis <span class="text-secondary">Handphone</span></h1>
                    <h3 class="text-light mb-3">Solusi kebutuhan servis handphone anda</h3>
                    <a href="#" class="btn btn-warning btn-lg">Servis Sekarang</a>
                </div>
            </div>

            <div class="carousel-item position-relative">
                <img src="{{ asset('images/slide3.jpg') }}" class="d-block w-100"
                    style="height: 600px; object-fit: cover;" alt="...">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100">
                    <h1 class="text-light fw-bold"><span class="text-warning">Produk</span> Terbaru</h1>
                    <h3 class="text-light mb-3">Lihat koleksi terbaru kami
                        <h3 />
                        <a href="#" class="btn btn-success btn-lg">Jelajahi</a>
                </div>
            </div>
        </div>

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

    {{-- Product --}}
    <div class="container" id="product">
        <div class="row">
            <div class="col-md-12 mt-6 text-center">
                <h1 class="text-center">Produk Kami</h1>
                <img src="{{ asset('images/in-stock.png') }}" class="img-fluid mx-auto d-block"
                    style="max-width: 100px;" alt="Logo Product">
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
