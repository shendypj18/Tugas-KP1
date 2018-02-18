<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabulasi extends Model
{
  protected $table = 'perusahaan';
  protected $primarykey = 'id';
  protected $fillable = ['kip','nama_perusahaan','alamat','produk_utama','tenaga_kerja','contact_person','telepon','nama_petugas'];
  public $timestamps = false;
}
