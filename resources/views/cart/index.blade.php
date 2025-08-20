@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
    <div class="container py-4">
        <div class="row">
            <!-- Daftar Produk -->
            <div class="col-lg-8 mb-4">
                <h4 class="mb-3">Keranjang Belanja <span class="text-muted">({{ count($carts) }})</span></h4>

                <!-- Pilih Semua -->
                <div class="d-flex justify-content-between align-items-center p-3 bg-white rounded shadow-sm mb-3">
                    <div>
                        <input class="form-check-input me-2" type="checkbox" checked>
                        <strong>Pilih Semua</strong> <small class="text-muted">(1 produk terpilih)</small>
                    </div>
                    <div>
                        <a href="#" class="text-decoration-none me-3">Simpan Keranjang</a>
                        <a href="#" class="text-decoration-none text-danger">Hapus Semua</a>
                    </div>
                </div>

                <!-- Produk -->
                @foreach ($carts as $cart)
                    <div class="d-flex align-items-center p-3 bg-white rounded shadow-sm my-2">
                        <input class="form-check-input me-3" type="checkbox" checked>

                        <!-- Gambar -->
                        <img src="{{ asset('images/' . $cart->product->image) }}" class="rounded me-3"
                            alt="{{ $cart->product->title }}" style="width: 80px">

                        <!-- Detail Produk -->
                        <div class="flex-grow-1">
                            <h6 class="mb-1">{{ $cart->product->title }}</h6>
                            <small class="text-muted">OMTHF5BR • 0.5 kg</small>
                            <div class="mt-1">
                                @if (!empty($cart->product->discount) && $cart->product->discount > 0)
                                    @php
                                        $finalPrice = $cart->product->price - ($cart->product->price * $cart->product->discount) / 100;
                                    @endphp
                                    <span class="fw-bold">Rp {{ number_format($finalPrice, 0, ',', '.') }}</span>
                                    <span class="text-muted text-decoration-line-through">Rp
                                        {{ number_format($cart->product->price, 0, ',', '.') }}</span>
                                    <span class="badge bg-danger">-{{ $cart->product->discount }}%</span>
                                @else
                                    <span class="fw-bold">Rp {{ number_format($cart->product->price, 0, ',', '.') }}</span>
                                @endif
                            </div>
                            <a href="#" class="d-block mt-1 small text-decoration-none">stok: {{ $cart->product->stock }}</a>
                        </div>

                        <!-- Qty & Harga -->
                        <div class="d-flex flex-column align-items-end">
                            <div class="input-group input-group-sm mb-2" style="width: 100px;">
                                <button class="btn btn-outline-secondary">-</button>
                                <input type="text" class="form-control text-center" value="2">
                                <button class="btn btn-outline-secondary">+</button>
                            </div>
                            <strong>Rp76.800</strong>
                            <div class="mt-2">
                                <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Ringkasan Belanja -->
            <div class="col-lg-4">
                <div class="bg-white p-4 rounded shadow-sm">
                    <h5 class="mb-3">Ringkasan Belanja</h5>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Total (2 pcs)</span>
                        <strong>Rp76.800</strong>
                    </div>
                    <button class="btn btn-primary w-100">Metode Belanja</button>
                </div>
            </div>
        </div>
    </div>
@endsection
