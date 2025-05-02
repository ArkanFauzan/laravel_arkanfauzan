<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pasien::create([
            'nama_pasien' => 'Ali Akbar',
            'alamat' => 'Jl. Mawar No.2',
            'no_telpon' => '0812345678',
            'rumah_sakit_id' => 1
        ]);

        Pasien::create([
            'nama_pasien' => 'Siti Nurhaliza',
            'alamat' => 'Jl. Melati No.3',
            'no_telpon' => '0812345679',
            'rumah_sakit_id' => 2
        ]);

        Pasien::create([
            'nama_pasien' => 'Budi Santoso',
            'alamat' => 'Jl. Anggrek No.4',
            'no_telpon' => '0812345680',
            'rumah_sakit_id' => 3
        ]);

        Pasien::create([
            'nama_pasien' => 'Dewi Lestari',
            'alamat' => 'Jl. Dahlia No.5',
            'no_telpon' => '0812345681',
            'rumah_sakit_id' => 4
        ]);

        Pasien::create([
            'nama_pasien' => 'Agus Wijaya',
            'alamat' => 'Jl. Kenanga No.6',
            'no_telpon' => '0812345682',
            'rumah_sakit_id' => 5
        ]);

        Pasien::create([
            'nama_pasien' => 'Rina Marlina',
            'alamat' => 'Jl. Teratai No.7',
            'no_telpon' => '0812345683',
            'rumah_sakit_id' => 1
        ]);

        Pasien::create([
            'nama_pasien' => 'Yusuf Maulana',
            'alamat' => 'Jl. Flamboyan No.8',
            'no_telpon' => '0812345684',
            'rumah_sakit_id' => 2
        ]);

        Pasien::create([
            'nama_pasien' => 'Lia Novita',
            'alamat' => 'Jl. Kamboja No.9',
            'no_telpon' => '0812345685',
            'rumah_sakit_id' => 3
        ]);

        Pasien::create([
            'nama_pasien' => 'Fajar Pratama',
            'alamat' => 'Jl. Cempaka No.10',
            'no_telpon' => '0812345686',
            'rumah_sakit_id' => 4
        ]);

        Pasien::create([
            'nama_pasien' => 'Nina Rosdiana',
            'alamat' => 'Jl. Bougenville No.11',
            'no_telpon' => '0812345687',
            'rumah_sakit_id' => 5
        ]);
    }

}
