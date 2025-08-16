<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card border-0 shadow rounded-3">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Produk</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- IMAGE --}}
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">IMAGE</label>
                                <div class="d-flex align-items-center">
                                    <!-- Input File -->
                                    <input type="file"
                                        class="form-control form-control-sm @error('image') is-invalid @enderror"
                                        name="image" id="imageInput" style="max-width: 250px;">

                                    <!-- Preview -->
                                    <img id="preview"
                                        src="{{ $product->image ? asset('images/' . $product->image) : asset('images/default.png') }}"
                                        alt="Preview" class="ms-3 rounded border"
                                        style="width: 80px; height: 80px; object-fit: cover;">
                                </div>

                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- TITLE --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Produk</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title', $product->title) }}"
                                    placeholder="Masukkan Judul Produk">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- DESCRIPTION --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4"
                                    placeholder="Masukkan Deskripsi Produk">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                {{-- PRICE --}}
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-semibold">Harga (Rp)</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price', $product->price) }}"
                                        placeholder="Masukkan Harga">
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- DISCOUNT --}}
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-semibold">Diskon (%)</label>
                                    <input type="number" class="form-control @error('discount') is-invalid @enderror"
                                        id="discount" name="discount"
                                        value="{{ old('discount', $product->discount ?? 0) }}" placeholder="0 - 100">
                                    @error('discount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- STOCK --}}
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-semibold">Stok</label>
                                    <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                        name="stock" value="{{ old('stock', $product->stock) }}"
                                        placeholder="Jumlah stok">
                                    @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- BUTTONS --}}
                            <div class="d-flex justify-content-end gap-2">
                                <button type="reset" class="btn btn-warning">
                                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Update
                                </button>
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

        document.getElementById("imageInput").addEventListener("change", function(event) {
            let preview = document.getElementById("preview");
            let file = event.target.files[0];

            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>
