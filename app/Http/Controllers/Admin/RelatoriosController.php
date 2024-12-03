<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class RelatoriosController extends Controller
{

    public function index()
    {
        return view('admin.pages.relatorios.index');
    }

    public function gerarPdf()
    {
        $teste = 'teste';
        $teste2 = 'teste2';

        $dompdf = new Dompdf();

        $html = view('admin.pages.relatorios.modelo-pdf', compact('teste', 'teste2'));

        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream();
    }
}
