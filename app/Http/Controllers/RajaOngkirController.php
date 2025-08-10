<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class RajaOngkirController extends Controller
{
    public function index()
    {
        $provinces = [];
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'key' => config('rajaongkir.api_key'),
        ])->get('https://rajaongkir.komerce.id/api/v1/destination/province');

        if ($response->successful()) {
            $provinces = $response->json()['data'] ?? [];
        }

        return view('rajaongkir.index', compact('provinces'));
    }

    public function getCities($provinceId)
    {
        // Mengambil data kota berdasarkan ID provinsi dari API Raja Ongkir
        $response = Http::withHeaders([

            //headers yang diperlukan untuk API Raja Ongkir
            'Accept' => 'application/json',
            'key' => config('rajaongkir.api_key'),

        ])->get("https://rajaongkir.komerce.id/api/v1/destination/city/{$provinceId}");
        // dd($response->json());

        if ($response->successful()) {

            // Mengambil data kota dari respons JSON
            // Jika 'data' tidak ada, inisialisasi dengan array kosong
            return response()->json($response->json()['data'] ?? []);
        }
    }

    public function getDistrict($cityId)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'key' => config('rajaongkir.api_key'),
        ])->get("https://rajaongkir.komerce.id/api/v1/destination/district/{$cityId}");

        if ($response->successful()) {
            return response()->json($response->json()['data'] ?? []);
        }
    }

    public function checkOngkir(Request $request)
    {
        $response = Http::asForm()->withHeaders([

            'Accept' => 'application/json',
            'key'    => config('rajaongkir.api_key'),

        ])->post('https://rajaongkir.komerce.id/api/v1/calculate/domestic-cost', [
            'origin'      => 3855,
            'destination' => $request->input('district_id'),
            'weight'      => $request->input('weight'),
            'courier'     => $request->input('courier'),
        ]);

        if ($response->successful()) {
            return $response->json()['data'] ?? [];
        }
    }
}
