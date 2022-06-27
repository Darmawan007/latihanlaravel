<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelGuru extends Model
{
    public function AllData()
    {
        return DB::table('tbl_guru')->get();
    }
    public function DetailData($id_guru)
    {
        return DB::table('tbl_guru')->where('id_guru', $id_guru)->first();
    }
    public function AddData($data)
    {
        DB::table('tbl_guru')->insert($data);
    }
    public function EditData($id_guru, $data)
    {
        DB::table('tbl_guru')->where('id_guru', $id_guru)->update($data);
    }
    public function DeleteData($id_guru)
    {
        DB::table('tbl_guru')->where('id_guru', $id_guru)->delete();
    }
}
