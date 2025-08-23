<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8"> {{-- Lebih kecil agar tidak terlalu melebar --}}
                <div class="card border-0 shadow rounded-3">
                    <div class="card-header bg-primary text-white text-center fs-5 fw-bold">
                        Tambah Produk
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- IMAGES --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Foto Produk</label>
                                <input type="file"
                                    class="form-control form-control-sm @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror"
                                    name="images[]" id="imagesInput" multiple accept="image/*">

                                {{-- Preview Grid --}}
                                <div id="previewContainer" class="d-flex flex-wrap gap-2 mt-2"></div>

                                {{-- Error Message --}}
                                @error('images')
                                    <small class="text-danger d-block">{{ $message }}</small>
                                @enderror
                                @error('images.*')
                                    <small class="text-danger d-block">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- TITLE --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Judul</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Produk">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- DESCRIPTION --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4"
                                    placeholder="Masukkan Deskripsi Produk">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row">
                                {{-- Modal price --}}
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Harga Modal</label>
                                        <input type="number"
                                            class="form-control @error('modal_price') is-invalid @enderror"
                                            name="modal_price" value="{{ old('modal_price') }}"
                                            placeholder="Masukkan Harga Modal" min="0">
                                        @error('modal_price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- PRICE --}}
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Harga Jual</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                                            name="price" value="{{ old('price') }}" placeholder="Masukkan Harga Jual"
                                            min="0">
                                        @error('price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- STOCK --}}
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Stok</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                            name="stock" value="{{ old('stock') }}" placeholder="Masukkan Stok"
                                            min="0">
                                        @error('stock')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- WEIGHT --}}
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Berat Produk (gr)</label>
                                        <input type="number" class="form-control @error('weight') is-invalid @enderror"
                                            name="weight" value="{{ old('weight') }}"
                                            placeholder="Masukkan Berat (gr)" min="0">
                                        @error('weight')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- DISCOUNT --}}
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Diskon (%)</label>
                                        <input type="number"
                                            class="form-control @error('discount') is-invalid @enderror" name="discount"
                                            value="{{ old('discount') }}" placeholder="0 - 100" min="0"
                                            max="100">
                                        @error('discount')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-warning me-2">Reset</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');

        const input = document.getElementById('imagesInput');
        const previewContainer = document.getElementById('previewContainer');

        input.addEventListener('change', function(e) {
            // Ambil semua file lama + baru
            let files = Array.from(previewContainer.querySelectorAll('img')).length + e.target.files.length;

            // if (files > 5) {
            //     alert("Maksimal 5 foto yang boleh dipilih!");
            //     input.value = ""; // reset input
            //     return;
            // }

            // Array.from(e.target.files).forEach(file => {
            //     if (file.type.startsWith('image/')) {
            //         const reader = new FileReader();
            //         reader.onload = function(event) {
            //             const img = document.createElement('img');
            //             img.src = event.target.result;
            //             img.classList.add('rounded', 'border');
            //             img.style.width = "80px";
            //             img.style.height = "80px";
            //             img.style.objectFit = "cover";
            //             previewContainer.appendChild(img);
            //         }
            //         reader.readAsDataURL(file);
            //     }
            // });
        });
    </script>

</body>

</html>
