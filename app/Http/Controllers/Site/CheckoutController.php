<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ClienteEndereco;
use App\Models\Produto;
use App\Models\Usuario;
use App\Models\UsuarioCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function getValores()
    {
        $produtos = session('produtos');
        $valorTotal = 0;
        if (!empty($produtos)) {
            foreach ($produtos as $produto) {
                $valor = $produto['produto']->valor;
                $quantidade = $produto['quantidade'];
                $valorTotal = $valor * $quantidade + $valorTotal;
            }
        }

        $valorDescontoPix = $valorTotal - $valorTotal * (10 / 100);
        $valorParcelado = $valorTotal / 10;

        $valores[] = [
            'valorTotal' => $valorTotal,
            'valorParcelado' => $valorParcelado,
            'valorDescontoPix' => $valorDescontoPix,
        ];

        return $valores;
    }

    public function index()
    {
        $produtos = session('produtos');
        $valores = $this->getValores();

        return view('site.pages.checkout.list', compact('produtos', 'valores'));
    }

    public function removerDoCarrinho($id)
    {
        session()->forget('produtos.' . $id);
        if (!session('produtos')) {
            return redirect('/');
        }
        return redirect()->back();
    }

    public function removerTudoDoCarrinho()
    {
        session()->forget('produtos');
        return redirect('/');
    }

    public function etapaEnderecos()
    {
        $usuario = Auth::user();

        $enderecos = $usuario->cliente->enderecos->toArray();

        $valores = $this->getValores();

        return view('site.pages.checkout.form', compact('enderecos', 'valores'));
    }

    public function salvarEndereco(Request $request)
    {
        $idEndereco = $request->id;
        $frete = $request->frete;
        session(['endereco' => $idEndereco]);
        session(['frete' => $frete]);
        $valores = $this->getValores();

        return to_route('site.checkout.pagamento');
    }

    public function etapaPagamento()
    {
        $valores = $this->getValores();
        $valorComFrete = session('frete') + $valores[0]['valorTotal'];
        $frete = session('frete');

        return view('site.pages.checkout.pagamento', compact('valores', 'frete', 'valorComFrete'));
    }

    public function salvarPagamento(Request $request)
    {
        $pagamento = $request['payment_method'];
        if ($request['payment_method'] == '3') {
            $vezes = $request['vezes'];
            session(['vezes' => $vezes]);
        }

        session(['pagamento' => $pagamento]);

        return to_route('site.checkout.confirmacao');
    }

    public function etapaConfirmacao()
    {
        $idEndereco = session('endereco');

        $pagamento = session('pagamento');
        $vezes = session('vezes');
        $produtos = session('produtos');
        $valores = $this->getValores();
        $id = Auth::id();
        $cliente = UsuarioCliente::where('usuario_id', $id)->first();
        $enderecos = $cliente->enderecos->toArray();

        return view('site.pages.checkout.confirmacao', compact('valores','frete', 'cliente', 'enderecos', 'produtos', 'vezes', 'pagamento', 'idEndereco'));
    }

    public function etapaConcluido()
    {
        return view('site.pages.checkout.concluido');
    }
}
