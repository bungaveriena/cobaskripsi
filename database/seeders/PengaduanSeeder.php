<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_pengaduans')->insert([
            'nama_korban'       => 'Fulanah',
            'alamat_korban'     => 'Bogor',
            'email_korban'      => 'fulanah1@gmail.com',
            'notlp_korban'      => '000000009',
            'pembuat_pengaduan' => 'Salma',
            'relasi_korban'     => 'Sahabat Korban',
            'nama_pelaku'       => 'Budi',
            'alamat_pelaku'     => 'Bogor',
            'email_pelaku'      => 'budi@gmail.com',
            'notlp_pelaku'      => '0000000099',
            'bukti'             => 'terlampir link drive',
            'bantuan'           => 'pendampingan psikolog'
        ]);

        DB::table('data_pengaduans')->insert([
            'nama_korban'       => 'Juliani',
            'alamat_korban'     => 'Tangerang',
            'email_korban'      => 'juljul@gmail.com',
            'notlp_korban'      => '000000008',
            'pembuat_pengaduan' => 'Agni',
            'relasi_korban'     => 'Ibu Korban',
            'nama_pelaku'       => 'Budiman',
            'alamat_pelaku'     => 'Jakarta Selatan',
            'email_pelaku'      => 'budiman@gmail.com',
            'notlp_pelaku'      => '0000000088',
            'bukti'             => 'terlampir link drive',
            'bantuan'           => 'bantuan hukum'
        ]);

        DB::table('data_pengaduans')->insert([
            'nama_korban'       => 'Lia',
            'alamat_korban'     => 'Jakarta Barat',
            'email_korban'      => 'lia@gmail.com',
            'notlp_korban'      => '000000007',
            'pembuat_pengaduan' => 'Dina',
            'relasi_korban'     => 'Atasan Korban',
            'nama_pelaku'       => 'Joe',
            'alamat_pelaku'     => 'Jakarta Barat',
            'email_pelaku'      => 'joe@gmail.com',
            'notlp_pelaku'      => '0000000077',
            'bukti'             => 'terlampir link drive',
            'bantuan'           => 'akses kesehatan'
        ]);
    }
}
