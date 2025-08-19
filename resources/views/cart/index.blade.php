@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
    <div class="container py-4">
        <div class="row">
            <!-- Daftar Produk -->
            <div class="col-lg-8 mb-4">
                <h4 class="mb-3">Keranjang Belanja <span class="text-muted">(1)</span></h4>

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
                <div class="d-flex align-items-center p-3 bg-white rounded shadow-sm">
                    <input class="form-check-input me-3" type="checkbox" checked>

                    <!-- Gambar -->
                    <img src="https://via.placeholder.com/100" class="rounded me-3" alt="Produk">

                    <!-- Detail Produk -->
                    <div class="flex-grow-1">
                        <h6 class="mb-1">Pajangan Meja Balance Ball Pendulum Newton Model Arched M - ZY02</h6>
                        <small class="text-muted">OMTHF5BR • 0.5 kg</small>
                        <div class="mt-1">
                            <span class="fw-bold">Rp38.400</span>
                            <span class="text-muted text-decoration-line-through">Rp66.000</span>
                            <span class="badge bg-danger">42%</span>
                        </div>
                        <a href="#" class="d-block mt-1 small">Lihat ketersediaan stok</a>
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
