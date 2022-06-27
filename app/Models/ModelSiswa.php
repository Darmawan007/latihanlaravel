<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelSiswa extends Model
{
    public function AllData()
    {
        return DB::table('tbl_siswa')
            ->leftJoin('tbl_kelas', 'tbl_kelas.id_kelas', '=', 'tbl_siswa.id_kelas')
            ->leftJoin('tbl_mapel', 'tbl_mapel.id_mapel', '=', 'tbl_siswa.id_mapel')
            ->get();
    }
}
