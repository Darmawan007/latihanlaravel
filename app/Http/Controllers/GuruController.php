<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ModelGuru;
use PhpParser\Node\Expr\New_;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->ModelGuru = new ModelGuru();
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [
            'guru' => $this->ModelGuru->AllData(),
        ];
        return view('v_guru', $data);
    }
    public function detail($id_guru)
    {
        if (!$this->ModelGuru->DetailData($id_guru)) {
            abort(404);
        }
        $data = [
            'guru' => $this->ModelGuru->DetailData($id_guru),
        ];
        return view('v_detailguru', $data);
    }
    public function add()
    {
        return view('v_addguru');
    }
    public function insert()
    {
        request()->validate([
            'nip' => 'required|unique:tbl_guru,nip|min:4|max:6',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'required|mimes:png,jpg,jpeg,bmp,gif|max:2048',
        ], [
            'nip.required' => 'NIP WAJIB DIISI !!!',
            'nip.unique' => 'NIP SUDAH TERDAFTAR !!!',
            'nip.min' => 'NIP MIN. 4 KARAKTER (ANGKA)',
            'nip.max' => 'NIP MAX. 6 KARAKTER (ANGKA)',
            'nama_guru.required' => 'NAMA WAJIB DIISI !!!',
            'mapel.required' => 'MATA PELAJARAN WAJIB DIISI !!!',
            'foto_guru.required' => 'FOTO WAJIB DIISI !!!',
        ]);
        $file = request()->foto_guru;
        $fileName = request()->nip . '.' . $file->extension();
        $file->move(public_path('gambar'), $fileName);
        $data = [
            'nip' => request()->nip,
            'nama_guru' => request()->nama_guru,
            'mapel' => request()->mapel,
            'foto_guru' => $fileName,
        ];
        $this->ModelGuru->AddData($data);
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Ditambahkan !!!');
    }
    public function edit($id_guru)
    {
        if (!$this->ModelGuru->DetailData($id_guru)) {
            abort(404);
        }
        $data = [
            'guru' => $this->ModelGuru->DetailData($id_guru),
        ];
        return view('v_editguru', $data);
    }
    public function update($id_guru)
    {
        request()->validate([
            'nip' => 'required|min:4|max:6',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'mimes:png,jpg,jpeg,bmp,gif|max:2048',
        ], [
            'nip.required' => 'NIP WAJIB DIISI !!!',
            'nip.min' => 'NIP MIN. 4 KARAKTER (ANGKA)',
            'nip.max' => 'NIP MAX. 6 KARAKTER (ANGKA)',
            'nama_guru.required' => 'NAMA WAJIB DIISI !!!',
            'mapel.required' => 'MATA PELAJARAN WAJIB DIISI !!!',
        ]);
        if (Request()->foto_guru <> "") {
            // Ganti Gambar
            $file = request()->foto_guru;
            $fileName = request()->nip . '.' . $file->extension();
            $file->move(public_path('gambar'), $fileName);
            $data = [
                'nip' => request()->nip,
                'nama_guru' => request()->nama_guru,
                'mapel' => request()->mapel,
                'foto_guru' => $fileName,
            ];
            $this->ModelGuru->EditData($id_guru, $data);
        } else {
            $data = [
                'nip' => request()->nip,
                'nama_guru' => request()->nama_guru,
                'mapel' => request()->mapel,
            ];
            $this->ModelGuru->EditData($id_guru, $data);
        }
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Diupdate !!!');
    }
    public function delete($id_guru)
    {
        //hapus foto
        $guru = $this->ModelGuru->DetailData($id_guru);
        if ($guru->foto_guru <> "") {
            unlink(public_path('gambar') . '/' . $guru->foto_guru);
        }
        $this->ModelGuru->DeleteData($id_guru);
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Dihapus !!!');
    }
}
