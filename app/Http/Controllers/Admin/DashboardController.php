<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard.index');
    }

    public function calcularVendasSemana()
    {
        //
    }

    public function calcularVendasMes()
    {
        //
    }

    public function calcularVendasAno()
    {
        //
    }

    public function ultimasVendas()
    {
        //
    }

    public function maisVendidos()
    {
        //
    }
}
