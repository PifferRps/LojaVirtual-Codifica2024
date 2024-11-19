<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Fornecedor;
use App\Models\Fornecedor as ModelsFornecedor;

class FornecedoresController extends Controller
{
    public function index(){
        $fornecedores = Fornecedor::all();

        return view('admin.pages.formaluario-fornecedor', compact('fornecedores'));
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
