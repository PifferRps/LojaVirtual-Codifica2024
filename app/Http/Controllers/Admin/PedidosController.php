<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index()
    {
        return view('admin.pages.pedidos.list');
    }

    public function show(string $id)
    {
        return view('admin.pages.pedidos.show');
    }
    public function edit(string $id)
    {
        return view('admin.pages.pedidos.form');
    }

    public function update(Request $request, string $id)
    {
        //
    }
}
