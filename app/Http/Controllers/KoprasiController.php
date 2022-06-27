<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelKoprasi;
use Dompdf\Dompdf;

class KoprasiController extends Controller
{
    public function __construct()
    {
        $this->ModelKoprasi = new ModelKoprasi();
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [
            'koprasi' => $this->ModelKoprasi->AllData(),
        ];
        return view('v_koprasi', $data);
    }
    public function print()
    {
        $data = [
            'koprasi' => $this->ModelKoprasi->AllData(),
        ];
        return view('v_print', $data);
    }
    public function printpdf()
    {
        $data = [
            'koprasi' => $this->ModelKoprasi->AllData(),
        ];
        $html = view('v_printpdf', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
