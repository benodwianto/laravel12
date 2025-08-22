<footer class="bg-dark text-light pt-5 pb-4">
    <div class="container" id="footer">
        <div class="row">

            <!-- Kolom 1: Logo / Deskripsi -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold text-uppercase">AuraHunt</h5>
                <p>
                    Website ini dibuat untuk memberikan layanan terbaik bagi pengguna.
                    Terima kasih telah mengunjungi kami!
                </p>
                <img src="{{ asset('images/aurahuntlogo.png') }}" alt="Aurahunt Logo" class="img-fluid"
                    style="max-width: 400px; filter: brightness(0) invert(1);">
            </div>

            <!-- Kolom 2: Navigasi -->
            <div class="col-md-2 mb-4">
                <h6 class="fw-bold text-uppercase">Menu</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}" class="text-decoration-none text-light">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="text-decoration-none text-light">About</a></li>
                    <li><a href="{{ url('/services') }}" class="text-decoration-none text-light">Services</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-decoration-none text-light">Contact</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Kontak -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold text-uppercase">Kontak</h6>
                <p><i class="bi bi-geo-alt-fill"></i> Sungai bangek,Koto Tangah, Kota Padang, Sumatra Barat</p>
                <p><i class="bi bi-telephone-fill"></i> +62 812 3456 7890</p>
                <p><i class="bi bi-envelope-fill"></i> info@mywebsite.com</p>

                <!-- Sosial Media -->
                <div class="mt-3">
                    <a href="#" class="text-light me-3"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-instagram fs-5"></i></a>
                    <a href="#" class="text-light"><i class="bi bi-twitter fs-5"></i></a>
                </div>
            </div>

            <!-- Kolom 4: Google Maps -->
            <!-- Kolom 4: Google Maps -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold text-uppercase">Lokasi Kami</h6>
                <div style="width:100%; height:300px; position:relative;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.403266195584!2d100.35617887480272!3d-0.826451199165519!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4c70077b599e3%3A0xc57160aa4c0ec203!2sBowo%20Cell!5e0!3m2!1sen!2sid!4v1755615907304!5m2!1sen!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>

        <!-- Copyright -->
        <div class="text-center mt-4 border-top pt-3">
            <small>&copy; {{ date('Y') }} AuraHunt. All rights reserved.</small>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script src="{{ asset('js/script.js') }}"></script>
