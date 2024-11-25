<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdutoFornecedor;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index(){
        $fornecedores = ProdutoFornecedor::all();

        return view('admin.pages.fornecedores.form', compact('fornecedores'));
    }

    public function create()
    {
        return view('admin.pages.formaluario-fornecedor');
    }

    public function edit(Fornecedor $fornecedor){
        return view('admin.pages.formaluario-fornecedor');
    }

    public function destroy(Fornecedor $fornecedor){

        $fornecedor->delete();

        return redirect()->route('admin.pages.formaluario-fornecedor');
    }
    public function store(Request $request, Fornecedor $fornecedor)
    {
        Fornecedor::create($request->all());

        return redirect()->route('admin.pages.formaluario-fornecedor');
    }

    public function update(Request $request, Fornecedor $fornecedor){

        $fornecedor->update($request->all());

        return redirect()->route('admin.pages.formaluario-fornecedor');
    }
}