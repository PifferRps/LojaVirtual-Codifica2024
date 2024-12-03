<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdutoFornecedor;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index(){
        $fornecedores = ProdutoFornecedor::all();

        return view('admin.pages.fornecedores.list', compact('fornecedores'));
    }

    public function create()
    {
        return view('admin.pages.fornecedores.form');
    }

    public function edit(ProdutoFornecedor $fornecedor)
    {
        return view('admin.pages.fornecedores.form');
    }

    public function destroy(ProdutoFornecedor $fornecedor)
    {
        $fornecedor->delete();

        return redirect()->route('/admin/fornecedores');
    }

    public function store(Request $request, ProdutoFornecedor $fornecedor)
    {
        ProdutoFornecedor::create($request->all());

        return redirect()->route('/admin/fornecedores');
    }

    public function update(Request $request, ProdutoFornecedor $fornecedor)
    {
        $fornecedor->update($request->all());

        return redirect()->route('/admin/fornecedores');
    }
}
