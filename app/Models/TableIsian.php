<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableIsian extends Model
{
    protected $fillable = [
        'kelurahan','kecamatan','kabupaten_kota','provinsi','bulan','tahun','nama_pengisi','pekerjaan','jabatan','user_id'
    ];

    public function users(){
        return $this->hasMany('App\User');
    }
}
