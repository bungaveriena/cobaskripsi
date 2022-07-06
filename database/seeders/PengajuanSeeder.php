<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_pengajuan_ceks')->insert([
            'nama_pengaju'   => 'Bunga',
            'alamat'         => 'Tangerang',
            'no_tlp'         => '100000000',
            'email_pengaju'  => 'bungaveriena13@gmail.com',
            'asal_instansi'  => 'PNJ',
            'nama_diajukan'  => 'Cola',
            'relasi'         => 'Bagian kemahasiswaan ybs kuliah',
            'keperluan'      => 'memastikan terindikasinya ybs atas beberapa kasus kekerasan untuk memutuskan drop out'
        ]);

        DB::table('data_pengajuan_ceks')->insert([
            'nama_pengaju'   => 'Bae',
            'alamat'         => 'Depok',
            'no_tlp'         => '110000000',
            'email_pengaju'  => 'baennable00@gmail.com',
            'asal_instansi'  => 'PT Sinar Mulia',
            'nama_diajukan'  => 'Fikri',
            'relasi'         => 'Recruiter ybs',
            'keperluan'      => 'memastikan riwayat ybs sebagai bahan pertimbangan penerimaan kerja'
        ]);
    }
}
