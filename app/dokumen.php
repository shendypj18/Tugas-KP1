<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dokumen extends Model
{
  protected $table = 'dokumenmsk';
  protected $primarykey = 'id_msk';
  protected $fillable = ['tglmskkab','tglkrmprov','tglmskprov','nonrespon','respon','keterangannr'];
  public $timestamps = false;
}
