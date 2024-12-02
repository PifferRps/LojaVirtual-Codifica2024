<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RelatoriosController extends Controller
{

    public function index()
    {
        return view('admin.pages.relatorios.index');
    }

    public function gerarPdf()
    {
        //
    }
}
