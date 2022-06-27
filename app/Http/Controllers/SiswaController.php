<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelSiswa;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->ModelSiswa = new ModelSiswa();
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [
            'siswa' => $this->ModelSiswa->AllData(),
        ];
        return view('v_siswa', $data);
    }
}
