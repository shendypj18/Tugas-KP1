<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
  protected $table = 'Kegiatan';
  protected $primarykey = 'id_kegiatan';
  protected $fillable = ['id_kegiatan','nama_kegiatan','deskripsi_kegiatan','periode'];
  public $timestamps = false;
}
