<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PakanTernak extends Model
{
    protected $fillable = [
        'luas_tanaman_pakan_ternak_rumput_gajah_dll','produksi_hijauan_makanan_ternak','dipasok_dari_luar_kelurahan','disubsidi_dinas','user_id'
    ];
}
