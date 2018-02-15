<?php

use Illuminate\Database\Seeder;

class PerusahaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perusahaan')->insert([
          'kip' => '00000',
          'nama_perusahaan' => 'Pt. ABC',
          'alamat' => 'Jl. ABC',
          'produk_utama' => 'saos',
          'tenaga_kerja' => '100',
          'contact_person' => 'Mr.a',
          'telepon' => '6280202',
          'nama_petugas' => 'Mr.B'
        ]);
    }
}
