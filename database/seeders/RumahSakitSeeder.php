<?php

namespace Database\Seeders;

use App\Models\RumahSakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RumahSakit::create([
            'nama_rumah_sakit' => 'RS Harapan',
            'alamat' => 'Jl. Melati No.1',
            'email' => 'rs@harapan.com',
            'telepon' => '021999888'
        ]);
    
        RumahSakit::create([
            'nama_rumah_sakit' => 'RS Sejahtera',
            'alamat' => 'Jl. Kenanga No.5',
            'email' => 'rs@sejahtera.com',
            'telepon' => '021888777'
        ]);
    
        RumahSakit::create([
            'nama_rumah_sakit' => 'RS Citra Medika',
            'alamat' => 'Jl. Mawar No.10',
            'email' => 'rs@citramedika.com',
            'telepon' => '021777666'
        ]);
    
        RumahSakit::create([
            'nama_rumah_sakit' => 'RS Permata',
            'alamat' => 'Jl. Anggrek No.12',
            'email' => 'rs@permata.com',
            'telepon' => '021666555'
        ]);
    
        RumahSakit::create([
            'nama_rumah_sakit' => 'RS Nusantara',
            'alamat' => 'Jl. Dahlia No.3',
            'email' => 'rs@nusantara.com',
            'telepon' => '021555444'
        ]);
    }
}
